@extends('front-end.master')

@section('body')
    <div class="section-top-border">
        <div class="row">
            <div class="offset-1 col-lg-7s col-md-5">
                <h3 class="mb-30 title_color">If you are a new user <strong>Register Here</strong></h3>
                {{Form::open(['route'=>'new-customer-reg','method'=>'POST'])}}
                <div class="mt-10">
                    <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                           required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                           required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="number" name="phone" placeholder="Phone No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required class="single-input">
                </div>
                <div class="mt-10">
								<textarea class="single-textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
                                          required></textarea>
                </div>
                <div class="mt-10">
                    <input type="submit" name="btn" value="Register" class="main_btn float-right">
                </div>
                {{Form::close()}}
            </div>
            <div class="col-lg-5s col-md-5">
                <h3 class="mb-30 title_color">If you are an existing user <strong>Login Here</strong></h3>
                <h4 class="text-danger">{{Session::get('message')}}</h4>

                {{Form::open(['route'=>'new-customer-login-form','method'=>'POST'])}}

                <div class="mt-10">
                    <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                           class="single-input">
                </div>
                <div class="mt-10">
                    <input type="submit" name="btn" value="Login" class="main_btn btn-block">
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection