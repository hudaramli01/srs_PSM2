<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\repairForm;
use App\Models\Solution;
use App\Models\Service;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use Carbon\Carbon;

    class ticketController extends Controller
    {
        public function newTicket(Request $request)
        {
            $category = Auth::user()->id;
            $repairForm = DB::table('form')
            ->join ('users', 'users.id', '=', 'form.managedBy')
            
            ->where('form.managedBy', '=', $category)
            ->select([
                'users.id AS usersID',
                'form.id AS formsID',
                'users.*', 'form.*'
            ])


            ->get();//looping


            $remainDate = [];

            foreach ($repairForm as $remain) {
                // Set the timezone to Kuala Lumpur
                $kl_timezone = 'Asia/Kuala_Lumpur';

                // Get today's date in Kuala Lumpur timezone
                $today_date = Carbon::now($kl_timezone);
                $expiredDate = Carbon::parse($remain->dueDate);
                $diffInDays = $today_date->diffInDays($expiredDate);
            
                $remainDate[] = [
                    'diffInDays' => $diffInDays 
                ];
            }


            return view('ticket.listOfTicket', compact('repairForm','remainDate','category'));

        }

    public function NewForm($id)
    {
            $customer = DB::table('customer')
            ->where('id', $id)
            ->first();
            $repairForm = DB::table('users')
            ->where('category', 'Technician')
            ->orWhere('category', 'Internship Student')
            ->get();

        return view('ticket.repairForm', compact('customer','repairForm'));
        
    }

   
    public function insertForm(Request $request, $id)
    {

        $receivedDate = $request->input('receivedDate');
        $brandName = $request->input('brandName');
        $modelName = $request->input('modelName');
        $password = $request->input('password');
        $probDesc = $request->input('probDesc');
        $managedBy = $request->input('managedBy');
  

        $data = array(
            'receivedDate' => $receivedDate,
            'customerID' => $id,
            'brandName' => $brandName,
            'modelName' => $modelName,
            'password' => $password,
            'probDesc' => $probDesc,
            'managedBy' => $managedBy,

            'status' => 'Pending',
        );

        // insert query
        DB::table('form')->insert($data);

        return redirect()->route('displayCustomer', $id );
    }

    public function updateStatus(Request $request, $id)
    {
        $repairForm = RepairForm::find($id);
       
        $repairForm->probType = $request->input('solution');
        $repairForm->solution = $request->input('service');
        $repairForm->product = $request->input('productName');
        $repairForm->dueDate = $request->input('dueDate');
        $repairForm->status = 'Reviewed';
       
    
        $repairForm->save();
    
        // Update related tables
        $solution = Solution::find($request->input('solution'));
        $service = Service::find($request->input('service'));
        $product = Product::find($request->input('productName'));

        
         // Retrieve the selected product ID from the request
        $selectedProductId = $request->input('productName');

        // Find the selected product in the database
        $product = Product::find($selectedProductId);


        if (!$product) {
            return redirect()->back()->with('error', 'Selected product not found');
        }
    
        // Check if the selected product quantity is greater than 0
        if ($product->quantity > 0) {
            // Decrease the quantity by 1
            $product->quantity -= 1;
            $product->save();
    
            // Update the repair form with the selected product ID
            $repairForm->product = $selectedProductId;
            $repairForm->status = 'Reviewed';
            $repairForm->save();
    
            // Update related tables (solution and service)
            $solution = Solution::find($request->input('solution'));
            $service = Service::find($request->input('service'));
    
            // Return a success message
            return redirect()->back()->with('message', 'Repair Form Updated Successfully');
        } else {
            // Return an error message if the product is out of stock
            return redirect()->back()->with('error', 'Selected product is out of stock');
        }

    }

    public function rejectForm($id)
    {
        $repairForm = RepairForm::find($id);
    
        if (!$repairForm) {
            // Handle the case where the repair form is not found
            return redirect()->back()->with('error', 'Repair Form not found');
        }
    
        $repairForm->status = 'Rejected';
        $repairForm->save();
    
        return redirect()->back()->with('message', 'Repair Form status changed to Rejected');
    }

    public function displayForm($id) {

        
        $solution = DB::table('solution')->get();
        $service = DB::table('service')->get();
        $product = DB::table('product')->get();
    
        $repairForm = DB::table('form')
            ->join('customer', 'customer.id', '=', 'form.customerID')
            ->where('form.id', '=', $id)
            ->select(
                'form.id as formID',
                'form.receivedDate',
                'form.dueDate',
                'form.brandName',
                'form.modelName',
                'form.password',
                'form.probDesc',
                'form.status as formStatus',
                'customer.id as custID',
                'customer.fullname',
            )
            ->first();

            

    
        return view('ticket.repairFormTechnician', compact('solution', 'service', 'product', 'repairForm'));
    }
    

public function formList()
{

    $repairForm = DB::table('form')
    ->orderBy('id', 'desc')
    ->get();

return view('customer.displayCustomer', compact('list'));
    
}
public function displayEdit(Request $request, $id)
{
    
    $repairForm = DB::table('form')
    ->join('customer', 'customer.id', '=', 'form.customerID')
    ->join('solution', 'solution.id', '=', 'form.probType')
    ->join('service', 'service.id', '=', 'form.solution')
    ->join('product', 'product.id', '=', 'form.product')
    ->where('form.id', '=', $id)
    ->select(
        'form.id as formID',
        'form.receivedDate',
        'form.dueDate',
        'form.brandName',
        'form.modelName',
        'form.password',
        'form.probDesc',
        'form.status as formStatus',
        'customer.id as custID',
        'customer.fullname',
        'solution.solutionName',
        'service.serviceName',
        'product.productName',
        
    )
    ->first();
  


    return view('ticket.displayEditForm', compact('repairForm'));
}

public function updateRejectProceed(Request $request, $id)
{
    $repairForm = RepairForm::find($id);

    $repairForm->status = $request->input('Status');

   

    $repairForm->update();



    return redirect()->back()->with('message', 'Repair Form Updated Successfully');
}



    public function deleteRepairForm(Request $request, $id)
    {
        if ($request->ajax()) {

            repairForm::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }
}