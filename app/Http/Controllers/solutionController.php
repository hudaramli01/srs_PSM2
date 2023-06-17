<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solution;

class solutionController extends Controller
{
    public function listSolution()
    {
        $solutionList = DB::table('solution')
            ->orderBy('id', 'desc')
            ->get();

        return view('solution.listOfSolution', compact('solutionList'));
    }

    public function newSolution()
    {
        return view('solution.addSolution');
    }

    public function insertSolution(Request $request)
    {
        $solutionName = $request->input('solutionName');
        $solutionDesc = $request->input('solutionDesc');

        $data = array(
            'solutionName' => $solutionName,
            'solutionDesc' => $solutionDesc,
        );

        // insert query
        DB::table('solution')->insert($data);

        return redirect()->route('listOfSolution');
    }
    public function displaySolution(Request $request, $id)
    {
        $solution = Solution::find($id);

        return view('solution.displaySolution', compact('solution'));
    }
    public function editSolution(Request $request, $id)
    {
        $solution = DB::table('solution')
        ->where('id',$id)
        ->first();


        return view('solution.editSolution', compact('solution'));
    }
    public function UpdateSolution(Request $request, $id)
    {
        // find the id from proposal
        $solution = Solution::find($id);

        $solution->solutionName = $request->input('solutionName');
        $solution->solutionDesc = $request->input('solutionDesc');

        // upadate query in the database
        $solution->update();

        // display message box in the same page
        return redirect()->back()->with('message', 'Problem Updated Successfully');
    }
    public function deleteSolution(Request $request, $id)
    {
        if ($request->ajax()) {

            Solution::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }
}
