<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Session;
use Mail;

class CustomerController extends Controller
{
    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }

    public function customerSignUp(Request $request){
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $email = $customer['email'];
        $messageData = ['email'=>$customer['email'],'first_name'=>$customer['first_name'],'code'=>base64_encode($customer['email'])];
        Mail::send('front-end.mails.confirmation-mail', $messageData, function($message) use ($email){
            $message->to($email);
            $message->subject('Eiser Ecommerce Confirmation Mail');
        });

        return redirect('/');
    }

    public function newCustomerLoginCheck(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if(password_verify($request->password,$customer->password)){

            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);

            return redirect('/');
        } else {
            return redirect('/customer/log-in')->with('message','Incorrect Password');
        }
    }
}
