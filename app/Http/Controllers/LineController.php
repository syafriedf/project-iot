<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Line;

class LineController extends Controller
{
    public function __construct()
    {
        $this->Line = new Line();
        $this->middleware('auth');
    }

    public function index(){
        $id = '4';
        $get_opt = Line::where('opt_id', $id)
        ->with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])
        ->get();

        $count_mch_off = Line::where('opt_id', $id)->where('sts_id', 0)->get()->count();
        $count_mch_on = Line::where('opt_id', $id)->where('sts_id', 1)->get()->count();

        // var_dump($get_opt[0] -> mch_line);

        return view('v_home',compact('get_opt','count_mch_off','count_mch_on'));
    }    


    public function add_reason(){
        $id = '1';
        $sts = Line::where('opt_id', $id)->where('sts_id', 0)->get();
        return view('');
    }
}