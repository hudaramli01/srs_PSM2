<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\repairForm;

class repairFormController extends Controller
{
    public function NewRepairForm()
    {
        return view('ticket.listOfTicket');
    }
    public function newForm()
    {
        return view('ticket.repairFormTechnician');
    }
    

}
