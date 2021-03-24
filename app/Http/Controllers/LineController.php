<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Line;


class LineController extends Controller
{
    use AuthenticatesUsers;
    

    public function __construct()
    {
        $this->Line = new Line();
        $this->middleware('auth');
    }

    public function index(){
        if (auth()->user()->level==1){
            $get_opt = Line::with(['opt_line','mch_line','sts_line','wop_line'])->latest()->get();
            $count_mch_off = Line::where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('sts_id', 1)->get()->count();
        }
        elseif (auth()->user()->level==2){
            $id =  Auth::user()->opt_id;
            $get_opt = Line::where('opt_id', $id)
            ->with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])->latest()
            ->get();

            $count_mch_off = Line::where('opt_id', $id)->where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('opt_id', $id)->where('sts_id', 1)->get()->count();
        }
        // var_dump($get_opt[0] -> mch_line);

        return view('v_home',compact('get_opt','count_mch_off','count_mch_on'));
    } 

    public function view_card(){
        if (auth()->user()->level==1){
            $get_opt = Line::with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])->latest()->get();
            $count_mch_off = Line::where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('sts_id', 1)->get()->count();            
        }
        elseif (auth()->user()->level==2){
            $id =  Auth::user()->opt_id;
            $get_opt = Line::where('opt_id', $id)
            ->with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])->latest()
            ->get();

            $count_mch_off = Line::where('opt_id', $id)->where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('opt_id', $id)->where('sts_id', 1)->get()->count();
        }
        // var_dump($get_opt[0] -> mch_line);

        return view('template.v_card',compact('get_opt','count_mch_off','count_mch_on'));
    }    


    public function store(Request $request, Line $line){

        $cur_date = new \DateTime('NOW');

        if(Line::where('sts_id', 0)->get()){
            $line->dwn_line()->create([
                // 'sts_id' => '0',
                'date_start' => $cur_date->$request->date_start,
              ]);
        }
        return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function update(Request $request, Line $line){
        $cur_date = new \DateTime('NOW');

        if($line->where('sts',1)->get()){
            if($line->dwn_line()->date_end == null){
                $line->dwn_line()->update([
                    'date_end' => $cur_date->$request->date_end,
                ]);
            }
        }
    }

        // public function add_reason(){
    //     $id = '1';
    //     $sts = Line::where('opt_id', $id)->where('sts_id', 0)->get();
    //     return view('');
    // }

    
}