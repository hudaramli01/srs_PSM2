<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class customerController extends Controller
{
    public function listCustomer()
    {
        $customerList = DB::table('customer')
            ->orderBy('id', 'asc')
            ->get();

        return view('customer.listOfCustomer', compact('customerList'));
    }
    
   

    public function newCustomer()
    {
        return view('customer.addCustomer');
    }
    public function insertCustomer(Request $request)
    {
        $fullname = $request->input('fullname');
        $phoneNumber = $request->input('phoneNumber');
        $Email = $request->input('Email');
        $address = $request->input('address');

        $data = array(
            'fullname' => $fullname,
            'phoneNumber' => $phoneNumber,
            'Email' => $Email,
            'address' => $address,
        );

        // insert query
        DB::table('customer')->insert($data);

        return redirect()->route('listOfCustomer');
    }

    public function displayCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $repairForm = DB::table('form')
        ->join ('users', 'users.id', '=', 'form.managedBy')
        ->select([
            'users.id AS usersID',
            'form.id AS formsID',
            'users.*', 'form.*'
        ])
        ->where('customerID',$id)
        ->get();//looping

        
        $remainDate = [];

            foreach ($repairForm as $remain) {
                // Set the timezone to Kuala Lumpur
                $kl_timezone = 'Asia/Kuala_Lumpur';
            
                // Get today's date in Kuala Lumpur timezone
                $today_date = Carbon::now($kl_timezone)->startOfDay(); // Consider only the date, not the time
                $expiredDate = Carbon::parse($remain->dueDate)->startOfDay(); // Consider only the date, not the time
                $diffInDays = $today_date->diffInDays($expiredDate, false); // Set the "float" parameter to false
            
                $remainDate[] = [
                    'diffInDays' => $diffInDays
                ];
            }
        return view('customer.displayCustomer', compact('customer','repairForm','remainDate'));
    }

    public function editCustomer(Request $request, $id)
    {
        $customer = DB::table('customer')
        ->where('id',$id)
        ->first();

        return view('customer.editCustomer', compact('customer'));
    }
    public function UpdateCustomer(Request $request, $id)
    {
        // find the id from proposal
        $customer = Customer::find($id);

        $customer->fullname = $request->input('fullname');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->Email = $request->input('Email');
        $customer->address = $request->input('address');

        // upadate query in the database
        $customer->update();

        // display message box in the same page
        return redirect()->back()->with('message', 'Customer Updated Successfully');
    }

    public function deleteCustomer(Request $request, $id)
    {
        if ($request->ajax()) {

            Customer::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }
}