@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Manage Orders</h3>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl no.</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i=1)
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->first_name.' '.$order->last_name}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_type}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('view-order-detail',['id'=>$order->id])}}" class="btn btn-info">
                                        <span><i class="fa fa-search-plus"></i></span>
                                    </a>
                                    <a href="{{route('view-order-invoice',['id'=>$order->id])}}" class="btn btn-success">
                                        <span><i class="fa fa-video-camera"></i></span>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <span><i class="fa fa-trash"></i></span>
                                    </a>
                                    <a href="" class="btn btn-dark">
                                        <span><i class="fa fa-check-square-o"></i></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection