<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class repairFormTechnicianController extends Controller
{
    public function listTechnicianForm($id)
    {
        $customer = Customer::find($id);
        $repairForm = DB::table('form')
        ->where('id',$id)
        ->get();//looping

        return view('ticket.listOfTicket', compact('repairForm'));
    }
  
}
