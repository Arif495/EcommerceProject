@extends('admin.master')

@section('body')
    <div class="offset-1 col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Edit Product</strong>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            </div>
            <div class="card-body card-block">
                {{Form::open(['route'=>'update-product','method'=>'post', 'class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm'])}}
                <div class="form-group row">
                    <label class="control-label col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category_id">
                            <option>---Select Category Name---</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->add_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('category_id') ? $errors->first('category_id') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Brand Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="brand_id">
                            <option>---Select Brand Name---</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <span class="text-danger offset-3">{{$errors->has('brand_id') ? $errors->first('brand_id') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Product Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}">
                        <input type="hidden" class="form-control" name="id" value="{{$products->id}}">
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('product_name') ? $errors->first('product_name') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Product Price</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="product_price" value="{{$products->product_price}}">
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('product_price') ? $errors->first('product_price') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Product Quantity</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="product_quantity" value="{{$products->product_quantity}}">
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Short Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="short_desc" rows="2">{{$products->short_desc}}</textarea>
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('short_desc') ? $errors->first('short_desc') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Long Description</label>
                    <div class="col-md-9">
                        <textarea id="editor" class="form-control" name="long_desc" rows="5">{{$products->long_desc}}</textarea>
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('long_desc') ? $errors->first('long_desc') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Product Image</label>
                    <div class="col-md-9">
                        <input type="file" name="product_image">
                        <br>
                        <img src="{{asset($products->product_image)}}">
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('product_image') ? $errors->first('product_image') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Publication Status</label>
                    <div class="col-md-9 radio">
                        <label><input type="radio" name="publication_status" {{$products->publication_status == 1 ? 'checked' : ''}} value="1"> Published</label>
                        <label><input type="radio" name="publication_status" {{$products->publication_status == 0 ? 'checked' : ''}} value="0"> Unpublished</label>
                    </div>
                    <span class="text-danger offset-3">{{$errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                </div>
                <div class="form-group row">
                    <div class="offset-3 col-md-9">
                        <input type="submit" name="btn" class="btn btn-primary" value="Add Product">
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <script>
        document.forms['editProductForm'].elements['category_id'].value = '{{$products->category_id}}';
        document.forms['editProductForm'].elements['brand_id'].value = '{{$products->brand_id}}';
    </script>
@endsection


