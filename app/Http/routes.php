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
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
