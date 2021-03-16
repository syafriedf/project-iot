<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workorder;

class WoController extends Controller
{

    public function __construct()
    {
        $this->Workorder = new Workorder();
        $this->middleware('auth');
    }

    public function index()
    {
        $workorders = Workorder::latest()->paginate(5);
 
        return view('v_wo',compact('workorders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('workorder.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'wop_id' => 'required',
            'wop_target' => 'required',
        ]);
        Workorder::create($request->all());
 
        return redirect()->back()->with('success', 'Add Succesfully!');
    }
    public function show($id)
    {
        //
    }

    public function edit(Workorder $workorder)
    {
        // $machine= DB::table('machines')->where('mch_id',$id)->get();
        return view('v_wo',compact('workorder'));
    }

    public function update(Request $request, Workorder $workorder)
    {
        $request->validate([
            'wop_id' => 'required',
            'wop_target' => 'required',
        ]);
 
        $workorder->update($request->all());
        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function destroy(Workorder $workorder)
    {
        $workorder->delete();

        return redirect()->back()->with('success', 'Deleted Succesfully!');

    }
}
