<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class profileController extends Controller
{
    public function listProfile()
    {
        $profile = DB::table('users')
        ->select(
            'id',
            'name',
            'category',
        )
        ->orderBy('name', 'asc')
        ->get();
        
        return view('staff.recordStaff', compact('profile'));
    }
    public function Profile($id)
    {
        $profile = User::find($id);
        return view('account.profile', ['profile' => $profile]);
    }

    public function updateProfile(Request $request, $id)
    {
        // find the id from proposal
        $profile = User::find($id);

        // unlink the old proposal file from assets folder
        

        $profile->name = $request->input('name');
        $profile->userName = $request->input('userName');
        $profile->email = $request->input('email');
        $profile->phoneNumber = $request->input('phoneNumber');
        $profile->image = $request->file('image');

        // to rename the proposal file
        $filename = time() . '.' . $profile->image->getClientOriginalExtension();
        // to store the new file by moving to assets folder
        $request->image->move('assets', $filename);

        $profile->image = $filename;

        // upadate query in the database
        $profile->update();

        // display message box in the same page
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }
    
    public function updatePassword(Request $request)
{
    $user = Auth::user();

    User::where('id', $user->id)->update([
        'password' => Hash::make($request->password),
    ]);

    return back()->with('success', 'You have successfully changed your password.');
}

public function deleteUser(Request $request, $id)
{
    if ($request->ajax()) {

        User::where('id', '=', $id)->delete();
        return response()->json(array('success' => true));
    }
}
}
