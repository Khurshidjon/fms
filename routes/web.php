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

/* -----------------------------------  Abdullo shu yerdan pastga routelaringizni yozing ------------------------------------*/ 

// Route::get('/', function(){
    // $aa = "Ayni paytda biz FMS PostService sayti ustida ishlayapmiz. tizimga kirish uchun yuqoridagi havolaga o'tishingiz mumkin noqulayliklar uchun uzr so'raymiz";
    // $result = "<a href='http://post.exurshid.uz/admin'> fms.uz </a>";
    // return $aa . ' ' . $result;
// });
/*------------------------------------------Websayt Frontend qismi boshlandi-------------------------------------*/ 
Route::get('/',function(){
    return view('frontend.index');
});
Route::get('/news',function(){
return view('frontend.news');
});
Route::get('/news_blog',function(){
return view('frontend.news_blog');
});
Route::get('/fast_mail',function(){
    return view('frontend.fast_mail');
});
Route::get('cargo_transportation',function(){
    return view('frontend.cargo_transportation');
});
Route::get('international_express_mail',function(){
    return view('frontend.international_express_mail');
});
Route::get('registeration',function(){
    return view('frontend.registeration');
});
Route::get('about_us',function(){
    return view('frontend.about_us');
});
Route::get('enter_login',function(){
    return view('frontend.enter_login');
});
/* -----------------------------------  Websaytni Backend qismi boshlandi ------------------------------------*/ 
 Route::get('/main', 'MainController@getLogin')->name('admin.login');
Route::post('/main', 'MainController@postLogin')->name('admin.login');
Route::get('/main/dashboard', 'MainController@getDashboard')->name('admin.dashboard');
 Route::get('/admin_one',function(){
     return view('web_backend.index');
 });
 
 Route::group(['prefix'=>'backend','middleware'=>'auth'],function(){
    Route::resource('/post', 'PostController');
    Route::resource('/menu', 'MenuController');
    Route::resource('/settings', 'SettingsController');
    Route::get('/contact','FrontContactController@create');
    Route::post('/contact','FrontContactController@store');
   
});
/* -----------------------------------  Abdullo bundan pastdagi routelarga tegmang ------------------------------------*/ 


Route::get('/admin', function (){
    return redirect()->route('admin.index');
});

Route::get('index/{lang}', function ($lang) {
    \Session::put('lang', $lang);
    return redirect()->back();
})->name('locale');


Route::group(['prefix'=> 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::get('/add/new-user', 'AdminController@addUser')->name('add-new-user');

    Route::get('/admin/from-city-index', 'ApplicationController@indexFromCity')->name('admin.index-from-city');
    Route::get('/admin/to-city-index', 'ApplicationController@indexToCity')->name('admin.index-to-city');


    Route::get('/overhead/first-step', 'ApplicationController@firstStep')->name('admin.first-step');

    Route::post('/overhead/first-step/result', 'ApplicationController@firstStepResult')->name('admin.first-step-result');
    Route::post('/overhead/first-step/change-city', 'ApplicationController@cityChange')->name('admin.change-city');
    Route::post('/overhead/first-step/change-city-action', 'ApplicationController@cityChangeAction')->name('admin.change-city-action');
    Route::post('/overhead/first-step/to-change-city', 'ApplicationController@toCityChangeAction')->name('admin.change-city-action-to');
    Route::get('/overhead/second-step', 'ApplicationController@secondStep')->name('admin.second-step');
    Route::post('/overhead/second-step/result', 'ApplicationController@secondStepResult')->name('admin.second-step-result');
    Route::get('/overhead/third-step', 'ApplicationController@thirdStep')->name('admin.third-step');

    /*edit applications*/
    Route::get('/overhead/first-step/{application}/edit', 'ApplicationController@firstStepEdit')->name('admin.first-step-edit');
    Route::put('/overhead/first-step/{application}/result', 'ApplicationController@firstStepResultEdit')->name('admin.first-step-edit-result');
    Route::get('/overhead/second-step/{application}/edit', 'ApplicationController@secondStepEdit')->name('admin.second-step-edit');
    Route::put('/overhead/second-step/{application}/edit/result', 'ApplicationController@secondStepResultEdit')->name('admin.second-step-edit-result');
    Route::get('/overhead/third-step/{application}', 'ApplicationController@thirdStepEdit')->name('admin.third-step-edit');


    Route::get('/contracts/price', 'ContractController@contractPrice')->name('contract.price');
    Route::get('/contracts/price/{contract}/edit', 'ContractController@contractPriceEdit')->name('contract.price-edit');
    Route::put('/contracts/price/{id}/update', 'ContractController@contractPriceUpdate')->name('contract.price-update');
    Route::post('/make/contracts', 'ContractController@makeContract')->name('make.contract');
    Route::post('/status/contracts/{contract}', 'ContractController@contractStatus')->name('status.contract');

    /*Roles and Permissions*/
    Route::post("/permissions/attach-role-to-permission/{role}/{permission}", 'Permissions\PermissionController@assignRoleToPermission')->name('attach-role-to-permission');
    Route::post('/permissions/revoke-role-to-permission/{role}/{permission}', 'Permissions\PermissionController@removeRoleFromPermission')->name('revoke-role-to-permission');
    Route::resource('/permissions', 'Permissions\PermissionController');


    Route::post('/roles/assign-permission-to-role/{role}/{permission}', 'Permissions\RoleController@attachPermissionToRole')->name('attach-permission-to-role');
    Route::post('/roles/revoke-permission-to-role/{role}/{permission}', 'Permissions\RoleController@revokePermissionToRole')->name('revoke-permission-to-role');
    Route::resource('/roles', 'Permissions\RoleController');


    Route::post("/users/attach-role-to-user/{user}/{role}", 'User\UserController@assignRoleToPermission')->name('attach-role-to-user');
    Route::post('/users/revoke-role-to-user/{user}/{role}', 'User\UserController@removeRoleFromPermission')->name('revoke-role-to-user');
    Route::post('/users/assign-permission-to-user/{user}/{permission}', 'User\UserController@attachPermissionToRole')->name('attach-permission-to-user');
    Route::post('/users/revoke-permission-to-user/{user}/{permission}', 'User\UserController@revokePermissionToRole')->name('revoke-permission-to-user');

    Route::resource('/users', 'User\UserController');

    Route::get('/line-chart-js', 'AdminController@lineChartjs');
    Route::get('/pie-chart-js', 'AdminController@pieChartjs');
    Route::get('/bar-chart-js', 'AdminController@barChartjs');
    Route::get('/radar-chart-js', 'AdminController@radarChartjs');

    /*Result change courier*/
    Route::get('/change-courier', 'AdminController@changeCourier')->name('change-courier');

    Route::resource('/texnologs', 'TexnologController');
    Route::resource('/applications', 'ApplicationController')->middleware("permission:application create");
    Route::resource('/contracts', 'ContractController')->middleware('permission:contract');
    Route::resource('/international-techno', 'InternationalTechController');
    Route::resource('/techno-countries', 'TechnoCountryController');
    Route::resource('/countries', 'CountryController');

    Route::post('/attach-country-to-zone/{categories_techno}/{country}', 'CategoryInterTechController@attach_country_to_zone')->name('attach_country_to_zone');
    Route::post('/detach-country-from-zone/{categories_techno}/{country}', 'CategoryInterTechController@detach_country_from_zone')->name('detach_country_from_zone');
    Route::resource('/categories-techno', 'CategoryInterTechController');
    Route::resource('/reports', 'ReportController');
});
Auth::routes();
