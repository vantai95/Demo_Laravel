<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact-us', 'User\\ContactUsController@index')->name('contact_us');
Route::post('/contact-us', 'User\\ContactUsController@submitContactUs')->name('submit_contact_us');
Route::get('/where-to-buy/{id}', 'User\\AgentsController@getAgent')->name('where_to_buy_detail');
Route::get('/where-to-buy', 'User\\AgentsController@index')->name('where_to_buy');
Route::get('/languages/{locale}', 'HomeController@changeLocalization')->name('locale');

Route::get('/products', 'User\\ProductsController@index')->name('products');
Route::get('/product-detail/{id}', 'User\\ProductsController@showProductDetail');
Route::get('/products/{category_slug}', 'User\\ProductsController@productDetail')->name('product_detail');
Route::get('/about-us', 'User\\AboutUsController@index')->name('about_us');

// Admin
Route::group(['middleware' => ['admin']], function () {
    // Admin dashboard
    Route::get('/admin', 'Admin\\AdminController@index');
    Route::get('/logout','Admin\\AdminController@logout');

    // Manage Users
    Route::resource('/admin/users', 'Admin\\UserController');
    Route::get('admin/my-profile', 'Admin\\UserController@myProfile');
    Route::patch('admin/my-profile', 'Admin\\UserController@myProfileUpdate');
    //change password
    Route::patch('admin/my-profile/change-password', 'Admin\\UserController@updatePassword');

    // Manage Categories
    Route::resource('admin/categories', 'Admin\\CategoriesController');
    Route::post('admin/categories/upload','Admin\\CategoriesController@upload');

    // Manage Products
    Route::resource('admin/products', 'Admin\\ProductController');
    Route::post('admin/products/upload','Admin\\ProductController@upload');

    // Manage Companies
    Route::get('admin/companies', 'Admin\\CompanyController@index')->name('companies');
    Route::get('admin/companies/createTeam', 'Admin\\CompanyController@createTeam');
    Route::post('admin/companies/createTeam', 'Admin\\CompanyController@storeTeam');
    Route::post('admin/companies','Admin\\CompanyController@updateAboutUs');
    Route::post('admin/companies/upload','Admin\\CompanyController@upload');
    Route::get('admin/companies/{id}/editTeam', 'Admin\\CompanyController@editTeam');
    Route::post('admin/companies/editTeam/{id}', 'Admin\\CompanyController@updateTeam');
    Route::post('admin/companies/destroyTeam/{id}','Admin\\CompanyController@destroyTeam');

    // Manage Configurations
    Route::get('admin/configurations', 'Admin\\ConfigurationController@index');
    Route::post('admin/configurations','Admin\\ConfigurationController@update');
    Route::post('admin/configurations/upload','Admin\\ConfigurationController@upload');

    //Manage Contact
    Route::resource('admin/contacts', 'Admin\\ContactController', ['except' => ['edit']]);

    // Manage Agencie
    Route::resource('admin/agents', 'Admin\\AgentController');
    Route::get('admin/agents/getContact/{id}', 'Admin\\AgentController@getContact');

});
