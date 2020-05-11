<?php

use App\Models\Product;
use App\Models\ProductVariation;

Route::get('/test-product_specification', function(){
    // $product = Product::first();
    $product_id = 36;
    $product = Product::find($product_id);
    // dd($product);
    $product->update([
        'specification' => [
            'color'  => [
                'name'    => '颜色',
                'options' => ['红色', '蓝色', '绿色'],
                'default' => '红色'
            ],
            'memory' => [
                'name'    => '内存',
                'options' => ['8GB & 64GB', '8GB & 128GB', '16GB & 256GB'],
                'default' => '8GB & 64GB'
            ],
        ]
    ]);
    // dd($product->variations);
    dd($product);

    $product->variations()->saveMany([
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '红色',
                'memory' => '8GB & 64GB'
            ],
            'stock' => 1000,
            'price' => 2000,
        ]),
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '红色',
                'memory' => '8GB & 128GB'
            ],
            'stock' => 1000,
            'price' => 2000
        ]),
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '红色',
                'memory' => '16GB & 256GB'
            ],
            'stock' => 1000,
            'price' => 3000
        ]),
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '蓝色',
                'memory' => '8GB & 64GB'
            ],
            'stock' => 1000,
            'price' => 1100
        ]),
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '蓝色',
                'memory' => '8GB & 128GB'
            ],
            'stock' => 1000,
            'price' => 2100
        ]),
        ProductVariation::create([
            'product_id' => $product_id,
            'specification' => [
                'color' => '蓝色',
                'memory' => '16GB & 256GB'
            ],
            'stock' => 1000,
            'price' => 3100
        ]),
    ]);
    dd($product->variations);
});


Route::get('/', 'TopicsController@index')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

Route::resource('replies', 'RepliesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');
