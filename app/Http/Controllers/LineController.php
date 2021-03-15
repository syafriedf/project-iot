<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Line;

class LineController extends Controller
{
    
    public function index(){
        $id = '4';
        $get_opt = Line::where('opt_id', $id)
        ->with(['opt_line','mch_line','sts_line','wop_line'])
        ->get();

        var_dump($get_opt[0] -> mch_line);

        return view('v_home',compact('get_opt'));
    }

    
}
