<?php
/*Home Page*/
Route::get('/',[
    'uses' => 'FrontController@index',
    'as' => '/'
]);

Route::get('/category/products/{id}',[
    'uses' => 'FrontController@category',
    'as' => 'category'
]);

Route::get('/product-details/{id}/{name}',[
    'uses' => 'FrontController@productDetails',
    'as' => 'product-details'
]);
/*Home Page*/

/*Cart*/
Route::post('/cart/add',[
    'uses' => 'CartController@addToCart',
    'as' => 'add-to-cart'
]);

Route::get('/cart/show',[
    'uses' => 'CartController@showCart',
    'as' => 'show-cart'
]);

Route::get('/cart/delete/{id}',[
    'uses' => 'CartController@deleteCart',
    'as' => 'delete-cart-item'
]);

Route::post('/cart/update',[
    'uses' => 'CartController@updateCart',
    'as' => 'update-cart'
]);
/*Cart*/

/*Checkout */
Route::get('/checkout',[
    'uses' => 'CheckoutController@index',
    'as' => 'checkout'
]);

Route::post('/customer/sign-up',[
    'uses' => 'CheckoutController@customerSignUp',
    'as' => 'new-customer'
]);

Route::get('/confirmed',[
    'uses' => 'CheckoutController@confirmAccount',
    'as' => 'confirm-account'
]);

Route::get('/checkout/shipping',[
    'uses' => 'CheckoutController@shippingForm',
    'as' => 'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses' => 'CheckoutController@saveShippingInfo',
    'as' => 'new-shipping'
]);

Route::get('/checkout/payment',[
    'uses' => 'CheckoutController@paymentForm',
    'as' => 'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses' => 'CheckoutController@newOrder',
    'as' => 'new-order'
]);

Route::get('/complete/order',[
    'uses' => 'CheckoutController@completeOrder',
    'as' => 'complete-order'
]);

Route::post('/checkout/customer-log-in',[
    'uses' => 'CheckoutController@customerLoginCheck',
    'as' => 'customer-login'
]);

Route::post('/checkout/customer-logout',[
    'uses' => 'CheckoutController@customerLogout',
    'as' => 'customer-logout'
]);
/*Checkout */
/*Customer Login*/
Route::get('/customer/log-in',[
    'uses' => 'CustomerController@newCustomerLogin',
    'as' => 'new-customer-login'
]);

Route::post('/customer/registration',[
    'uses' => 'CustomerController@customerSignUp',
    'as' => 'new-customer-reg'
]);

Route::post('/new/customer/login',[
    'uses' => 'CustomerController@newCustomerLoginCheck',
    'as' => 'new-customer-login-form'
]);


/*Customer Login*/





//Admin
Auth::routes();

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);


/*category */
Route::get('/category/add',[
    'uses' => 'CategoryController@index',
    'as' => 'add-category'
]);

Route::post('/category/save',[
    'uses' => 'CategoryController@saveCategory',
    'as' => 'new-category'
]);

Route::get('/category/manage',[
    'uses' => 'CategoryController@manageCategory',
    'as' => 'manage-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses' => 'CategoryController@unpublishedCategory',
    'as' => 'unpublished-category'
]);

Route::get('/category/published/{id}',[
    'uses' => 'CategoryController@publishedCategory',
    'as' => 'published-category'
]);

Route::get('/category/edit/{id}',[
    'uses' => 'CategoryController@editCategory',
    'as' => 'edit-category'
]);

Route::post('/category/update',[
    'uses' => 'CategoryController@updateCategory',
    'as' => 'update-category'
]);

Route::get('/category/delete/{id}',[
    'uses' => 'CategoryController@deleteCategory',
    'as' => 'delete-category'
]);
/*category */
//Route::get('/brand/add',[
//    'uses' => 'BrandController@index',
//    'as' => 'add-brand'
//]);
/*Brand */
Route::get('/brand/add', 'BrandController@index')->name('add-brand');

Route::post('/brand/new', [
    'uses'=>'BrandController@saveBrand',
    'as' => 'new-brand'
]);
/*Brand */

/*Product */
Route::get('/product/add',[
    'uses' => 'ProductController@index',
    'as' => 'add-product'
]);

Route::post('/product/save',[
    'uses' => 'ProductController@saveProduct',
    'as' => 'new-product'
]);

Route::get('/product/manage',[
    'uses' => 'ProductController@manageProduct',
    'as' => 'manage-product'
]);

Route::get('/product/edit/{id}',[
    'uses' => 'ProductController@editProduct',
    'as' => 'edit-product'
]);

Route::post('/product/update',[
    'uses' => 'ProductController@updateProduct',
    'as' => 'update-product'
]);
/*Product */

/*Orders */
Route::get('/order/manage-orders',[
    'uses' => 'OrderController@manageOrder',
    'as' => 'manage-orders'
]);


Route::get('/order/view-order-detail/{id}',[
    'uses' => 'OrderController@viewOrderDetails',
    'as' => 'view-order-detail'
]);

Route::get('/order/view-order-invoice/{id}',[
    'uses' => 'OrderController@viewOrderInvoice',
    'as' => 'view-order-invoice'
]);

Route::get('/order/download-order-invoice/{id}',[
    'uses' => 'OrderController@downloadOrderInvoice',
    'as' => 'download-invoice'
]);







