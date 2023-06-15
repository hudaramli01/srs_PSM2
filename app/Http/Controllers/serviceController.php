<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;

class serviceController extends Controller
{
    public function Service()
    {
        $serviceList = DB::table('service')
            ->orderBy('id', 'desc')
            ->get();

        return view('service.listOfService', compact('serviceList'));
    }

    public function newService()
    {
        return view('service.addService');
    }

    public function insertService(Request $request)
    {
        $serviceName = $request->input('serviceName');
        $desc = $request->input('desc');
        $status = $request->input('status');
        $price = $request->input('price');

        $data = array(
            'serviceName' => $serviceName,
            'desc' => $desc,
            'status' => $status,
            'price' => $price,
        );

        // insert query
        DB::table('service')->insert($data);

        return redirect()->route('listOfService');
    }
    public function displayService(Request $request, $id)
    {
        $service = Service::find($id);

        return view('service.displayService', compact('service'));
    }
    public function editService(Request $request, $id)
    {
        $service = DB::table('service')
        ->where('id',$id)
        ->first();


        return view('service.editService', compact('service'));
    }

    public function UpdateService(Request $request, $id)
    {
        // find the id from proposal
        $service = Service::find($id);

        $service->serviceName = $request->input('serviceName');
        $service->desc = $request->input('desc');
        $service->status = $request->input('status');
        $service->price = $request->input('price');

        // upadate query in the database
        $service->update();

        // display message box in the same page
        return redirect()->back()->with('message', 'Service Updated Successfully');
    }
    public function deleteService(Request $request, $id)
    {
        // find proposal id
        $service = Service::find($id);

        // delete the record from the database
        DB::delete('DELETE FROM service WHERE id = ?', [$id]);

        echo "Record deleted successfully.<br/>";
        return redirect()->back()->with('message', 'Service Deleted Successfully');
    }
}