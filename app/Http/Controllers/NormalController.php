<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NormalController extends Controller
{
    //
    public function index(){

        $current_user = Auth::user()->id;
        $ded_payment = DB::select("select * from deduction_payment where user_id = '$current_user'");

        return view('dashboards.normal.index',[
            'ded_payment'=>$ded_payment
        ]);
    }

    public function my_account(){

        // $current_user = Auth::user()->id;
        // $ded_payment = DB::select("select * from deduction_payment where user_id = '$current_user'");
        return view('dashboards.normal.my-account');
    }
}
