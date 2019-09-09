<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use DB;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();

        return view('admin.product.add-product',[
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    protected function validateproduct($request){
        $this->validate($request,[
            'category_id' => 'required',
            'product_image' => 'required'
        ]);
    }

    protected function imageUpload($request){
        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
       // $productImage->move($directory, $imageName);
        Image::make($productImage)->resize(200,200)->save($imageUrl);

        return $imageUrl;
    }

    protected function saveProductInfo($request, $imageUrl){
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request){
        $this->validateproduct($request);
        $imageUrl = $this->imageUpload($request);
        $this->saveProductInfo($request, $imageUrl);

        return redirect('/product/add')->with('message','Product Added Successfully');

    }

    public function manageProduct(){
        $products = DB::table('products')
                        ->join('categories','products.category_id','=','categories.id')
                        ->join('brands','products.brand_id','=','brands.id')
                        ->select('products.*','categories.add_category','brands.brand_name')
                        ->get();

        return view('admin.product.manage-product',['products'=>$products]);
    }

    public function editProduct($id){
        $products = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        return view('admin.product.edit-product',[
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function productInfoUpdate($product, $request, $imageUrl){
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function updateProduct(Request $request){
        $productImage = $request->file('product_image');
        if($productImage){
            $product = Product::find($request->id);
            unlink($product->product_image);

            $imageUrl = $this->imageUpload($request);
            $this->productInfoUpdate($product, $request, $imageUrl);

            return redirect('/product/manage')->with('message','Product Updated Successfully');

        } else {
            $product = Product::find($request->id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->publication_status = $request->publication_status;
            $product->save();

            return redirect('/product/manage')->with('message','Product Updated Successfully');
        }
    }
}













