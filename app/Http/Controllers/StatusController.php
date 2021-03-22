<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->Status = new Status();
        $this->middleware('auth');
    }

    public function index()
    {
        $statuses = Status::latest()->paginate(5);
 
        return view('v_status',compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('status.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'sts_id' => 'required',
            'sts_name' => 'required',
            'sts_desc' => 'required',
        ]);
        Status::create($request->all());
 
        return redirect()->back()->with('success', 'Add Succesfully!');
    }
    public function show($id)
    {
        //
    }

    public function edit(Status $status)
    {
        // $machine= DB::table('machines')->where('mch_id',$id)->get();
        return view('v_status',compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $request->validate([
            'sts_id' => 'required',
            'sts_name' => 'required',
            'sts_desc' => 'required',
        ]);
 
        $status->update($request->all());
        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->back()->with('success', 'Deleted Succesfully!');

    }
}
