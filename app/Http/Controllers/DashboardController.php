<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    public function loadDashboard()
    {
        $category = Auth::user()->category;

        if ($category == 'Admin') {

            $countStaff = DB::table('users')
            ->where('category', 'Technician')
            ->orWhere('category', 'Internship Student')
            ->orWhere('category', 'Admin')
            ->count();

            
            $products = Product::all();


            $countRepairForm = DB::table('form')->count();

            $countCustomer = DB::table('customer')->count();

            $countPending = DB::table('form')
            ->where('status', 'pending')
            ->count();

            $countReviewed = DB::table('form')
            ->where('status', 'reviewed')
            ->count();

            $countRejected = DB::table('form')
            ->where('status', 'rejected')
            ->count();

            $countProceed = DB::table('form')
            ->where('status', 'proceed')
            ->count();

            $countCompleted = DB::table('form')
            ->where('status', 'completed')
            ->count();

            $proAva = DB::table('product')
            ->where('status', 'available')
            ->count();

            $proUna = DB::table('product')
            ->where('status', 'unavailable')
            ->count();

            return view('dashboard.adminNew', compact('countStaff', 'countRepairForm', 'countCustomer', 'countPending', 
            'countReviewed', 'countRejected', 'countProceed', 'countCompleted','products','proAva','proUna'));
        }
        if ($category == 'Technician') {

            $countRepairForm = DB::table('form')->count();

            $countPending = DB::table('form')
            ->where('status', 'pending')
            ->count();

            $countReviewed = DB::table('form')
            ->where('status', 'reviewed')
            ->count();

            $countRejected = DB::table('form')
            ->where('status', 'rejected')
            ->count();

            $countProceed = DB::table('form')
            ->where('status', 'proceed')
            ->count();

            $countCompleted = DB::table('form')
            ->where('status', 'completed')
            ->count();

            $currentUser = auth()->user(); // Assuming you are using Laravel's authentication

            $techPending = DB::table('form')
                ->where('status', 'pending')
                ->where('managedBy', $currentUser->id)
                ->count();

                $techReviewed = DB::table('form')
                ->where('status', 'reviewed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $techRejected = DB::table('form')
                ->where('status', 'rejected')
                ->where('managedBy', $currentUser->id)
                ->count();

                $techProceed = DB::table('form')
                ->where('status', 'proceed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $techCompleted = DB::table('form')
                ->where('status', 'completed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $techEjob = DB::table('form')
                ->where('managedBy', $currentUser->id)
                ->count();

                $countTechnician = DB::table('form')
                ->where('managedBy', 'Technician')
                ->count();
    
                $countIntStd = DB::table('form')
                ->where('managedBy', 'Internship Student')
                ->count();

                $countPrbTyp = DB::table('solution')->count();

                $countService = DB::table('service')->count();

            return view('dashboard.technician', compact('countRepairForm', 'countPending', 'countReviewed', 'countRejected', 'countProceed', 'countCompleted'
            , 'currentUser', 'techPending', 'techReviewed', 'techRejected', 'techProceed', 'techCompleted','techEjob','countTechnician','countIntStd','countPrbTyp','countService'));
        }
        if ($category == 'Internship Student') {

            $currentUser = auth()->user(); // Assuming you are using Laravel's authentication

            $stdPending = DB::table('form')
                ->where('status', 'pending')
                ->where('managedBy', $currentUser->id)
                ->count();

                $stdReviewed = DB::table('form')
                ->where('status', 'reviewed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $stdRejected = DB::table('form')
                ->where('status', 'rejected')
                ->where('managedBy', $currentUser->id)
                ->count();

                $stdProceed = DB::table('form')
                ->where('status', 'proceed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $stdCompleted = DB::table('form')
                ->where('status', 'completed')
                ->where('managedBy', $currentUser->id)
                ->count();

                $stdEjob = DB::table('form')
                ->where('managedBy', $currentUser->id)
                ->count();
            
            return view('dashboard.internshipStudent', compact('stdPending','stdReviewed','stdRejected','stdProceed','stdCompleted','stdEjob'));
            
        }
    }

    
}
