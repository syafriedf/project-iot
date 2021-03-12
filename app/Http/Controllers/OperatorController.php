<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{

    public function index()
    {
        $operators = Operator::latest()->paginate(5);
 
        return view('v_operator',compact('operators'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'opt_name' => 'required',
            'division' => 'required',
            'username' => 'required',
            'password' => 'required',
            'roles' => 'required',  
        ]);
 
        Operator::create($request->all());
 
        return redirect()->back()->with('success', 'Add Succesfully!');
    }

    public function show($id)
    {

    }

    public function edit(Operator $id)
    {
        // $operator = DB::table('operators')->where('opt_id',$operator)->get();
        $operators = Operator::find($id);

        return view('v_operator',compact('operators'));
    //    return view('v_operator',['operators'=> $operator]);
        //return("teste//dit");
    }

    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'opt_name' => 'required',
            'division' => 'required',
        ]);
 
        $operator->update($request->all());

        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function destroy(Operator $operator)
    {
        $operator->delete();

        return redirect()->back()->with('success', 'Deleted Succesfully!');

    }
}