@extends('front-end.master')

@section('body')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                        class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Cart</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="cart.html">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                                src="{{ asset($cartProduct->options->image) }}"
                                                alt=""
                                        />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$cartProduct->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Tk. {{$cartProduct->price }}</h5>
                            </td>
                            <td>
                                {{Form::open(['route'=>'update-cart','method'=>'POST'])}}
                                <div class="product_count">
                                    <input
                                            type="number"
                                            name="qty"
                                            id="sst"
                                            maxlength="12"
                                            min="1"
                                            value="{{$cartProduct->qty}}"
                                            title="Quantity:"
                                            class="input-text qty"
                                    />
                                    <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">
                                    <input type="submit" value="Update" name="btn">
                                </div>
                                {{Form::close()}}
                            </td>
                            <td>
                                <h5>Tk. {{$total = $cartProduct->price*$cartProduct->qty}}</h5>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{route('delete-cart-item',['rowId'=>$cartProduct->rowId])}}">
                                    <span class="text-white"><i class="fa fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                            @php($sum = $sum+$total)
                        @endforeach

                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="#">Update Cart</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text">
                                    <input type="text" placeholder="Coupon Code" />
                                    <a class="main_btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>Tk. {{$orderTotal = $sum}}</h5>
                                {{Session::put('orderTotal',$orderTotal)}}
                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="{{route('/')}}">Continue Shopping</a>
                                    @if(Session::get('customerId')&& Session::get('shippingId'))
                                        <a class="main_btn" href="{{route('checkout-payment')}}">Proceed to checkout</a>
                                    @elseif(Session::get('customerId'))
                                        <a class="main_btn" href="{{route('checkout-shipping')}}">Proceed to checkout</a>
                                    @else
                                        <a class="main_btn" href="{{route('checkout')}}">Proceed to checkout</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

