<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;

class MachineController extends Controller
{

    public function __construct()
    {
        $this->Machine = new Machine();
        $this->middleware('auth');
    }

    public function index()
    {
        $machines = Machine::latest()->paginate(5);
 
        return view('v_machine',compact('machines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('machine.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'mch_ip_address' => 'required',
            'mch_name' => 'required',
            'mch_desc' => 'required',
        ]);
        Machine::create($request->all());
 
        return redirect()->back()->with('success', 'Add Succesfully!');
    }
    public function show($id)
    {
        //
    }

    public function edit(Machine $machine)
    {
        // $machine= DB::table('machines')->where('mch_id',$id)->get();
        return view('v_machine',compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $request->validate([
            'mch_ip_address' => 'required',
            'mch_name' => 'required',
            'mch_desc' => 'required',
        ]);
 
        $machine->update($request->all());
        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->back()->with('success', 'Deleted Succesfully!');

    }
}
