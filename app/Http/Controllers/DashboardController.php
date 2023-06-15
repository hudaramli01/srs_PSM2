<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function loadDashboard()
    {
        $category = Auth::user()->category;

        if ($category == 'Admin') {
            return view('dashboard.admin');
        }
        if ($category == 'Technician') {
            return view('dashboard.technician');
        }
        if ($category == 'Internship Student') {
            return view('dashboard.internshipStudent');
        }
    }
}
