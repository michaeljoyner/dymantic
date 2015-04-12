<?php



/*
 * Quote Requests
 */
Route::post('quickquote', 'QuotesController@storeQuoteRequest');

/*
 * Ajax Uploads
 */
Route::post('qquploads', 'AjaxUploadController@storeQuoteFile');
Route::post('logoupload', 'AjaxUploadController@storeLogoImageUploads');
Route::post('printimageupload', 'AjaxUploadController@storePrintImageUpload');
Route::post('printdocupload', 'AjaxUploadController@storePrintDocUpload');

/*
 * Brief Requests
 */
Route::post('brief', 'BriefsController@storeBrief');

/*
 * Pages
 */
Route::get('/', 'PagesController@showWelcome');
Route::get('services', 'PagesController@showServicePage');
Route::get('getstarted', 'PagesController@showGetStartedPage');
Route::get('quote', 'PagesController@showQuotePage');
Route::get('contact', 'PagesController@showContactPage');
Route::post('contact', 'PagesController@postContactMessage');
Route::get('thanks', 'PagesController@showThankYouPage');

/*
 * Auth
 */
Route::get('admin/login', 'Auth\AuthController@showLogin');
Route::post('admin/login', 'Auth\AuthController@login');
Route::get('admin/logout', 'Auth\AuthController@logout');
/*
 * Admin
 */
Route::get('admin', 'Admin\AdminController@home');
Route::get('admin/users', 'Admin\UsersController@index');
Route::get('admin/users/create', 'Admin\UsersController@create');
Route::post('admin/users/create', 'Admin\UsersController@register');

/*
 * Clients
 */
Route::get('admin/clients', 'Admin\ClientsController@index');
Route::get('admin/clients/create', 'Admin\ClientsController@create');
Route::post('admin/clients/create', 'Admin\ClientsController@store');
Route::get('admin/clients/show/{slug}', 'Admin\ClientsController@show');
Route::post('admin/clients/project', 'Admin\ClientsController@storeProject');
Route::get('admin/clients/{slug}/project/create', 'Admin\ClientsController@createProject');
Route::post('admin/clients/imageupload', function() {
   dd(\Illuminate\Support\Facades\Input::all());
});
