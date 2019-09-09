@extends('front-end.master')

@section('body')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h2 class="text-center">Select Payment Type</h2>
            <div class="card">
                <div class="card-body">
                    {{Form::open(['route'=>'new-order','method'=>'POST'])}}
                    <table class="table">
                        <tr>
                            <th>Cash On Delivery</th>
                            <td><input type="radio" name="payment_type" value="Cash">Cash on delivery</td>
                        </tr>
                        <tr>
                            <th>Bkash</th>
                            <td><input type="radio" name="payment_type" value="Bkash">Bkash</td>
                        </tr>
                        <tr>
                            <th>Paypal</th>
                            <td><input type="radio" name="payment_type" value="Paypal">Paypal</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="btn" class="main_btn" value="Confirm Order"></td>
                        </tr>
                    </table>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection