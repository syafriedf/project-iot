<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

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
        return view('v_operator');
    }

    public function store(Request $request)
    {
        $request->validate([
            'opt_name' => 'required',
            'division' => 'required',
        ]);
 
        Operator::create($request->all());
 
        return redirect()->route('v_operator')
                        ->with('success','Operator created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $operator = Operator::findOrFail($id);
        $operator->delete();

        if($operator){
            //redirect dengan pesan sukses
            return redirect()->route('v_operator')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('v_operator')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
