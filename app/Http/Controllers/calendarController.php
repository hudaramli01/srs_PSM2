<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\repairForm;


class CalendarController extends Controller
{
    //
   

    public function stdCalendar(Request $request)
    {
        $currentUser = Auth::user()->id;

        if ($request->ajax()) {

            

            $klTime = Carbon::now('Asia/Kuala_Lumpur'); // Get current KL time
            $start = $klTime->toDateString(); // Get the date part in YYYY-MM-DD format

            $data = repairForm::select('id', 'managedBy as title', 'receivedDate as start')
            ->where ('form.managedBy', '=', $currentUser)

                ->get();
                

            return response()->json($data);
        }
    

        return view('calendar.addCalendar', compact('currentUser'));

        
    }


      
}