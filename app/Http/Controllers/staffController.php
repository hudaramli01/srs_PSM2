<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\MyTestMail;

class staffController extends Controller
{
    public function listStaff()
    {
        $managedBy = DB::table('users')
        ->get();

        return view('staff.listOfStaff', compact('managedBy'));
    }

    public function listTechnician(Request $request)
{
    $profile = DB::table('users')->select(
        'id',
        'name',
        'userName',
        'category',
        'email',
        'phoneNumber',
        'image',
    )->where('category', 'Technician')->get();

    return view('staff.technician', compact('profile'));
}

public function listInternshipStudent(Request $request)
{
    $profile = DB::table('users')->select(
        'id',
        'name',
        'userName',
        'category',
        'email',
        'phoneNumber',
        'image',
    )->where('category', 'Internship Student')->get();

    return view('staff.internshipStudent', compact('profile'));
}    
    
    public function newStaff()
    {
        return view('staff.addStaff');
    }

    public function displayStaff(Request $request, $id)
    {

        $profile = DB::table('users')->select(

            'id',
            'name',
            'userName',
            'category',
            'email',
            'phoneNumber',
            'image',
        )->where('users.id', '=', $request->id)->first();

        return view('staff.displayStaff', compact('profile'));

    }

    public function getEmail(Request $request, $id)
        {

            $user = DB::table('users')
            ->select([
                'name', 'email'
            ])
            ->where('users.id', $id)
            ->first();

            $to = [

                [
                    'email' => $user->email,
                ]

            ];

            //send email
            $data = [
                
                'name' => $user->name,
            ];
           
            Mail::to($to)->send(new MyTestMail($data));
            
            return back()->with('success', 'Email Successfully Sent.');
           
        }





}