<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Cart;
use Mail;
use Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-content');
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

        return redirect('/checkout/shipping');
    }

    public function confirmAccount(){
        return view('front-end.mails.confirmed-account');
    }

    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if(password_verify($request->password,$customer->password)){

            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
        } else {
            return redirect('/checkout')->with('message','Incorrect Password');
        }
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }

    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;

        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        if($paymentType == 'Cash'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            Cart::destroy();

            return redirect('/complete/order');
        }
        if($paymentType == 'Bkash'){

        }
    }

    public function completeOrder(){
        return view('front-end.checkout.complete-order');
    }


}
















