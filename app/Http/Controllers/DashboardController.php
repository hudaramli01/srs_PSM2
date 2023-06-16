<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            


            return view('dashboard.admin', compact('countStaff', 'countRepairForm', 'countCustomer', 'countPending', 'countReviewed', 'countRejected', 'countProceed', 'countCompleted'));
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

            return view('dashboard.technician', compact('countRepairForm', 'countPending', 'countReviewed', 'countRejected', 'countProceed', 'countCompleted'));
        }
        if ($category == 'Internship Student') {
            return view('dashboard.internshipStudent');
        }
    }

    
}
