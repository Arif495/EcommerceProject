<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.add-brand');
    }

    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|regex:/^[a-z ,.\-]+$/i|max:10|min:4',
            'brand_description' => 'required',
            'publication_status' => 'required',
        ]);


        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;

        $brand->save();

        return redirect('/brand/add')->with('message','Brand Saved Successfully');
    }
}