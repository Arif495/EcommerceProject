@extends('front-end.master')

@section('body')
    <div class="section-top-border">
        <div class="row">
            <div class="offset-1 col-lg-7s col-md-5">
                <h3 class="mb-30 title_color">Please give us your shipping info</strong></h3>
                {{Form::open(['route'=>'new-shipping','method'=>'POST'])}}
                <div class="mt-10">
                    <input type="text" name="full_name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                           required value="{{$customer->first_name.' '.$customer->last_name}}" class="single-input">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required value="{{$customer->email}}" class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="phone" placeholder="Phone No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required value="{{$customer->phone}}" class="single-input">
                </div>
                <div class="mt-10">
								<textarea class="single-textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
                                          required>{{$customer->address}}</textarea>
                </div>
                <div class="mt-10">
                    <input type="submit" name="btn" value="Save Shipping Info" class="main_btn">
                </div>
                {{Form::close()}}
            </div>

        </div>
    </div>


@endsection