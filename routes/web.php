<?php
use App\Menu;
use App\Setting;
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

View::composer('layouts.front_main', function($view){
    $menus = Menu::where('status', 1)->where('position', 1)->where('parent', null)->get();
    $footer_menus = Menu::where('status', 1)->where('position', 0)->where('parent', null)->get();
    $footer_left_side = Setting::where('key', 'foo_left_side')->first();
    $footer_right_side = Setting::where('key', 'foo_right_side')->first();
    $phone_number = Setting::where('key', 'phone_number')->first();
    $email = Setting::where('key', 'email')->first();    
    $address = Setting::where('key', 'address')->first();
    $telegram = Setting::where('key', 'telegram')->first();
    $facebook = Setting::where('key', 'facebook')->first();
    $instagram = Setting::where('key', 'instagram')->first();
    $google = Setting::where('key', 'google_plus')->first();
    $twitter= Setting::where('key', 'twitter')->first();

    return $view->with([
        'menus' => $menus,
        'footer_menus' => $footer_menus,
        'footer_left_side' => $footer_left_side,
        'footer_right_side' => $footer_right_side,
        'phone_number' => $phone_number,
        'email' => $email,
        'address' => $address,
        'telegram' => $telegram,
        'facebook' => $facebook,
        'instagram'=>$instagram,
        'google'=>$google,
        'twitter'=>$twitter
    ]);
});

Route::get('/','FrontendController@index')->name('index');
Route::get('/contact', 'FrontContactController@create')->name('contact');
Route::post('/contact', 'FrontContactController@store')->name('cont');
Route::get('/subscribe', 'SubscribeController@create')->name('subscribe');
Route::post('/subscribe', 'SubscribeController@store');

Route::get('/page/news/show','FrontendController@news')->name('news.index');

Route::get('/news_blog/{post}', 'FrontendController@single_news')->name('single.news');
Route::get('/contact', 'FrontendController@contact')->name('contact');


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

Route::get('/page/{menu}/show', 'FrontendController@page')->name('page.inforamtion');

Route::get('/news/render/ajax', 'FrontendController@renderNews')->name('render.news');

/* -----------------------------------  Websaytni Backend qismi boshlandi ------------------------------------*/ 


 Route::get('/main', 'MainController@getLogin')->name('admin.login');
Route::post('/main', 'MainController@postLogin')->name('admin.login');
 Route::get('/backends', function(){
     return redirect()->route('backend.index');
 })->name('backend')->middleware('role:Moderator');

 Route::group(['prefix'=>'backend/panel', 'middleware' => 'auth', 'middleware' => 'role:Moderator'],function(){
    Route::get('/', 'BackendController@index')->name('backend.index');
    Route::resource('/post', 'PostController');
    Route::post('/post/{post}', 'PostController@postStatus')->name('status.post');
    Route::resource('/menu', 'MenuController');
    Route::post('/menu/{menu}', 'MenuController@menuStatus')->name('status.menu');
    Route::resource('/settings', 'SettingsController');
    Route::resource('/partners', 'PartnerController');
    Route::post('/pages/status/{page}/edit', 'PageController@status')->name('pages.status');
    Route::resource('/pages', 'PageController');    
});
/* -----------------------------------  Abdullo bundan pastdagi routelarga tegmang ------------------------------------*/ 


Route::get('/login', function (){
    return redirect()->route('admin.index');
});

Route::get('index/{lang}', function ($lang) {
    \Session::put('lang', $lang);
    return redirect()->back();
})->name('locale');


Route::group(['prefix'=> 'admin', 'middleware' => ['auth', 'role:Admin|Operator|texnolog|courier']], function (){
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
