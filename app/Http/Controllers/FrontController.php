<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $newProducts = Product::where('publication_status',1)
                                    ->orderBy('id','DESC')
                                    ->take(4)
                                    ->get();

        $featureProducts = Product::where('publication_status',1)
                                    ->orderBy('id','ASC')
                                    ->skip(5)
                                    ->take(3)
                                    ->get();

        return view('front-end.home.home',[
            'newProducts' => $newProducts,
            'featureProducts' => $featureProducts
        ]);
    }

    public function category($id){
        $categoryProducts = Product::where('category_id',$id)
                            ->where('publication_status',1)
                            ->get();
        return view('front-end.category.category-content',[
            'categoryProducts' => $categoryProducts
        ]);
    }

    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.product.product-details',['product'=>$product]);
    }
}
























