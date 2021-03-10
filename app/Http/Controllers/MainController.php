<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class MainController extends Controller
{
    public function index()
    {	
    	Return view('v_home');
    }
}
