<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    
Route::get('try','FaceDetectionController@faceDetection');
// start front routing
Route::get('/signup', 'Auth\SignupController@GetSignup');
Route::get('/', 'Front\HomeController@index');
Route::get('/cities/{country_id}', 'Front\HomeController@CitiesByCountry');
Route::get('/aboutus', 'Front\HomeController@aboutus');
Route::get('/terms', 'Front\HomeController@terms');
Route::get('/faq', 'Front\HomeController@faq');
Route::post('/contactus', 'Front\ContactUsController@contactus');
Route::get('/policy', 'Front\HomeController@policy');
Route::get('/category/{name}', 'Front\CategoriesController@ShowCategory');
Route::get('/product/{name}', 'Front\ProductController@ShowProduct');


Route::group(['middleware' => 'auth'], function () {
  
});

// end front routing

// start admin routing


Route::get('/home', 'HomeController@index');
Route::get('/login','Auth\LoginController@GetLogin');
Route::post('/check','Auth\LoginController@postLogin');

Route::get('forget/password','Auth\ResetPasswordController@GetForgetPassword');
Route::post('forget/password','Auth\ResetPasswordController@PostForgetPassword');
Route::get('reset/verfy/{token}','Auth\ResetPasswordController@GetCodeVerfy');
Route::post('reset/verfy/{token}','Auth\ResetPasswordController@PostCodeVerfy');
Route::get('reset/password/{token}','Auth\ResetPasswordController@GetRestorePassword');
Route::post('reset/password/{token}','Auth\ResetPasswordController@PostRestorePassword');


Route::group(['middleware' => 'auth'], function () {
    
   Route::group(['prefix' => 'admin'], function () {
     //home screan
    Route::get('/home', function () {
            return view('admin.home');
        });
    
    Route::post('users/suspended/{user_id}','Admin\UsersGroupSettingsController@suspended');
    Route::post('users/deactivate/{user_id}','Admin\UsersGroupSettingsController@deactivate');
    Route::get('users/{id}/active','Admin\UsersGroupSettingsController@active');

    Route::get('user/reset_password','Admin\UsersController@GetForgetPassword');
    Route::PUT('reset/password/{id}','Admin\UsersController@PostRestorePassword');
   

    Route::resource('admins','Admin\AdminsController');
    Route::get('admin/{id}/delete','Admin\AdminsController@destroy');
    Route::get('users','Admin\UsersController@Users');
    Route::get('latest_members','Admin\UsersController@latestMembers');
    Route::get('/find/member/date','Admin\UsersController@findMemberByDates');
    
    Route::resource('terms','Admin\TermsController');
    Route::get('terms/{id}/delete','Admin\TermsController@destroy');

    Route::resource('about_us','Admin\AboutUsController');

    Route::resource('contact_us_settings','Admin\ContactUSSettings');
    Route::get('settings','Admin\ContactUSSettings@create');
    Route::get('contact_us_settings/{id}/delete','Admin\ContactUSSettings@destroy');
    Route::get('contact_us_settings/{id}/map','Admin\ContactUSSettings@show');
    Route::get('contact_us','Admin\contactusController@index');
    Route::get('contact_us/{id}/reply','Admin\contactusController@GetReply');
    Route::post('contact_us/reply','Admin\contactusController@PostReply');
    Route::get('contact_us/{id}/delete','Admin\contactusController@destroy');
    
    Route::resource('slider','Admin\SliderController');
    Route::get('slider/{id}/delete','Admin\SliderController@destroy');
   
    Route::resource('categories','Admin\CategoriesController');
    Route::get('categories/{id}/delete','Admin\CategoriesController@destroy');


    Route::get('categories/{id}/sub','Admin\SubCategoriesController@index');
    Route::get('categories/{id}/sub/create','Admin\SubCategoriesController@create');
    Route::post('categories/sub/{id}','Admin\SubCategoriesController@store');
    Route::get('categories/{id}/sub/edit','Admin\SubCategoriesController@edit');
    Route::PUT('categories/sub/{id}','Admin\SubCategoriesController@update');

    Route::resource('faqs','Admin\FaqController');
    Route::get('faqs/{id}/delete','Admin\FaqController@destroy');
    
    Route::resource('policy','Admin\RetrievalPolicyController');
    Route::get('policy/{id}/delete','Admin\RetrievalPolicyController@destroy');


    Route::resource('countries','Admin\CountriesController');
    Route::get('countries/{id}/delete','Admin\CountriesController@destroy');

    Route::resource('cities','Admin\CitiesController');
    Route::get('cities/{id}/delete','Admin\CitiesController@destroy');
    
    
    //logout
    Route::get('/logout','Auth\LoginController@logout');

    });
}); 
   // end admin routing 

});


