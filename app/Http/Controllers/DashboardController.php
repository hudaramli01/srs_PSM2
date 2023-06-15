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
            ->count();

            $countRepairForm = DB::table('form')->count();

            $countCustomer = DB::table('customer')->count();


            return view('dashboard.admin', compact('countStaff', 'countRepairForm', 'countCustomer'));
        }
        if ($category == 'Technician') {
            return view('dashboard.technician');
        }
        if ($category == 'Internship Student') {
            return view('dashboard.internshipStudent');
        }
    }
}
