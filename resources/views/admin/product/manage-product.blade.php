@extends('admin.master')

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <h3 class="text-success text-center" id="">{{Session::get('message')}}</h3>
            <div class="card-body">
                <h3 class="card-title text-center">Manage Product</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Sl No.</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($products as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->add_category}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td><img src="{{asset($product->product_image)}}"></td>
                        <td>{{$product->publication_status==1?'Published':'Unpublished'}}</td>
                        <td>
                            @if($product->publication_status == 1)
                                <a href="" class="btn btn-info">
                                    <span><i class="fa fa-arrow-up"></i></span>
                                </a>
                            @else
                                <a href="" class="btn btn-warning">
                                    <span><i class="fa fa-arrow-down"></i></span>
                                </a>
                            @endif
                            <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success">
                                <span><i class="fa fa-edit"></i></span>
                            </a>
                            <a href="" class="btn btn-danger">
                                <span><i class="fa fa-trash"></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection

