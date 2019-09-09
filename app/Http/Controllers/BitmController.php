<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitmController extends Controller
{
    public function index(){
        return view('bitm');
    }

    public function newOne(){
        return view('home.home');
    }

    public function myForm(Request $request){
        return $request->all();
    }

    public function test(){
        $name = "Sakib";
        $city = "Dhaka";

        //return view('test.test',compact('name','city'));
//        return view('test.test')->with([
//            'name' => $name,
//            'city' => $city
//        ]);
        return view('test.test',[
           'name' => $name,
           'city' => $city
        ]);
    }
}
