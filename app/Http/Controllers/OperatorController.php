<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->User = new Operator();
        $this->middleware('auth');
    }

    public function index()
    {
        $operators = User::latest()->paginate(5);
 
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
        ]);
 
        User::create($request->all());
 
        return redirect()->back()->with('success', 'Add Succesfully!');
    }

    public function show($id)
    {

    }

    public function edit(User $id)
    {
        // $operator = DB::table('operators')->where('opt_id',$operator)->get();
        $operators = User::find($id);

        return view('v_operator',compact('operators'));
    //    return view('v_operator',['operators'=> $operator]);
        //return("teste//dit");
    }

    public function update(Request $request, User $operator)
    {
        $request->validate([
            'opt_name' => 'required',
            'division' => 'required',
        ]);
 
        $operator->update($request->all());

        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function destroy(User $operator)
    {
        $operator->delete();

        return redirect()->back()->with('success', 'Deleted Succesfully!');
    }

    public function get_lines_opt($id){
        $get_opt = Line::get()->where('opt_id', $id);

        return view('v_home',compact('get_opt'));
    }

    // //// LOGIN
    // public function authenticate(Request $request)
    // {
    //     $opt = $request->only('username', 'password');

    //     if (Auth::attempt($opt)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('');
    //     }

    //     return back()->withErrors([
    //         'username' => 'The provided credentials do not match our records.',
    //     ]);
    // }
}