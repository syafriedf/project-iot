<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Line;
use App\Models\Downtime;


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
            $get_opt = Line::with(['opt_line','mch_line','sts_line','wop_line'])->get();
            $count_mch_off = Line::where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('sts_id', 1)->get()->count();
        }
        elseif (auth()->user()->level==2){
            $id =  Auth::user()->opt_id;
            $get_opt = Line::where('opt_id', $id)
            ->with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])
            ->get();

            $count_mch_off = Line::where('opt_id', $id)->where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('opt_id', $id)->where('sts_id', 1)->get()->count();
        }
        foreach($get_opt as $data){
            $this->store($data->id_line);
            $this->update($data->id_line);
        }


        return view('v_home',compact('get_opt','count_mch_off','count_mch_on'));
    } 

    public function view_card(){
        if (auth()->user()->level==1){
            $get_opt = Line::with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])->get();
            $count_mch_off = Line::where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('sts_id', 1)->get()->count();
                        
        }
        elseif (auth()->user()->level==2){
            $id =  Auth::user()->opt_id;
            $get_opt = Line::where('opt_id', $id)->with(['opt_line','mch_line','sts_line','wop_line','dwn_line'])
            ->get();

            $count_mch_off = Line::where('opt_id', $id)->where('sts_id', 0)->get()->count();
            $count_mch_on = Line::where('opt_id', $id)->where('sts_id', 1)->get()->count();
        }

            foreach($get_opt as $data){
                $this->store($data->id_line);
                $this->update($data->id_line);
            }


        return view('template.v_card',compact('get_opt','count_mch_off','count_mch_on'));
    }    


    public function store($id){

        $cur_date = new \DateTime('NOW');
        $zero = Line::where('sts_id', 0)->where('id_line', $id)->where('ins_status',0)->first();
        $zero1 = Line::where('sts_id', 0)->where('id_line', $id)->where('ins_status',0)->update(['ins_status' => 1]);

        if($zero){
            $zero->dwn_line()->create([
                'date_start' => $cur_date,
              ]);
        }
        // return redirect()->back()->with('success', 'Update Succesfully!');
    }

    public function update($id){
        $cur_date = new \DateTime('NOW');
        $zero = Line::where('sts_id', 1)->where('id_line', $id)->where('ins_status',1)->first();
        $zero1 = Line::where('sts_id', 1)->where('id_line', $id)->where('ins_status',1)->update(['ins_status' => 0]);

        if($zero){
            $dwnline = Downtime::where('id_line', $id)->orderBy('date_start', 'desc')->first();
            Downtime::find($dwnline->dwn_id)->update(['date_end' => $cur_date]);
        }
    }

    
}