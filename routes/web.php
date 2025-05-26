<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

$adminRoute = config('app.admin_url');

$webRoute = config('app.web_url');

Route::get('/script/moveChatOldToNew', 'ScriptController@moveChatOldToNew')->name('moveChatOldToNew');
Route::get('/script/moveFileLocalToS3','ScriptController@moveFileLocalToS3')->name('moveFileLocalToS3');

Route::get('test','IndexController@test')->name('test');
Route::get('create-gif','IndexController@createGif')->name('create-gif');

Route::group(['prefix' => $webRoute, 'namespace' => 'Web', 'as' => 'web.'], function () {
	
	// Auth::routes();
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login-user', 'Auth\LoginController@login')->name('loginUser');
	Route::post('/social-register', 'Auth\LoginController@socialRegister')->name('socialRegister');
	Route::get('/register-user', 'Auth\RegisterController@index')->name('register');
	Route::post('/register-submit', 'Auth\RegisterController@register')->name('registerUser');
	Route::get('/logout-user', 'WebController@logout')->name('logout');
	Route::get('/login-email-verify/{email}','Auth\LoginController@loginEmailVerify')->name('login-email-verify');

	Route::get('/email-verify/{user}','Auth\RegisterController@emailVerify', function (Request $request) {
		if (!$request->hasValidSignature()) {
			abort(401);
	}

})->name('email-verify')->middleware('signed');

	// Password Reset Routes...
	Route::group(['namespace' => 'Auth'], function() {
		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
		Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
			Route::post('/user-password-changed', 'ForgotPasswordController@passwordChanged')->name('passwordChanged');
			Route::get('/set-password/{user}','ForgotPasswordController@setPassword', function (Request $request) {
				if (!$request->hasValidSignature()) {
					abort(401);
			}
		
		})->name('set-password')->middleware('signed');
	});	
	
	Route::get('/', 'WebController@home')->name('home');
	Route::get('/front/video/{id}', 'WebController@videoInfo')->name('videoInfo');
	Route::get('/front/video/view/{id}', 'WebController@videoViewed')->name('videoViewed');
	Route::get('/front/video/comments/{id}/{type}', 'WebController@videoComments')->name('videoComments');
	Route::get('/privacy-policy','PageController@index')->name('privacy-policy')->defaults('slug', 'privacy-policy');
	Route::get('/terms','PageController@index')->name('terms')->defaults('slug', 'terms');
	Route::get('/data-delete','PageController@index')->name('data-delete')->defaults('slug', 'data-delete');
	Route::get('/child-safety','PageController@index')->name('child-safety')->defaults('slug', 'child-safety');
	
	Route::group(['middleware' => ['auth:web']], function () {
		Route::post('/front/video/comments/{id}', 'WebController@videoPostComments')->name('videoPostComments');
		Route::get('/front/video/like/{id}', 'WebController@videoLike')->name('videoLike');
		Route::get('/edit-profile/{id}', 'UserController@editUserProfile')->name('editUserProfile');
		Route::post('/edit-profile/{id}', 'UserController@updateUserProfile')->name('updateUserProfile');
		Route::get('/remove-profile-pic', 'UserController@removeProfilePic')->name('removeProfilePic');
		Route::get('/user-follow/{id}', 'UserController@followUnfollowUser')->name('followUnfollowUser');
		Route::get('/user-block/{id}', 'UserController@blockUnblock')->name('blockUnblock');
		Route::get('/notifications', 'UserController@userNotifications')->name('userNotifications');
		Route::get('/notificationStatus', 'UserController@notificationStatus')->name('notificationStatus');

		//upload videos
		Route::get('/upload-video', 'UserController@uploadVideo')->name('uploadVideo');
		Route::post('/upload-video', 'UserController@insertVideo')->name('insertVideo');
		Route::post('/delete-video', 'UserController@deleteVideo')->name('deleteVideo');
		Route::get('/video-info-update/{id?}', 'UserController@videoInfoUpdate')->name('video-info-update');
		Route::post('/video-info-submit', 'UserController@videoInfoSubmit')->name('video-info-submit');
		
		//password change
		Route::get('/change-password', 'UserController@changePassword')->name('changePassword');
		Route::post('/update-password', 'UserController@updatePassword')->name('updatePassword');


		Route::get('followers-list/{id}','UserController@followersList')->name('followers-list');
		Route::get('following-list/{id}','UserController@followingList')->name('following-list');
		Route::get('blocked-user-list','UserController@blockUsersList')->name('blocked-user-list');
		//messenger 
		Route::get('/messages', 'MessagesController@index')->name('messages');
		Route::get('/messages/chat/{conversation}', 'MessagesController@chatMessages')->name('messages.chat');
		Route::post('/messages/store/{conversation}', 'MessagesController@storeMessage')->name('messages.store');
		Route::post('/typing/{id}', 'MessagesController@typingMessage')->name('messages.typing');
		Route::post('/message/read/{conversation}', 'MessagesController@readMessage')->name('messages.readMessage');
		Route::post('/messages/delete', 'MessagesController@deleteMessage')->name('messages.messagesDelete');
		
		Route::get('/conversation/store/{user_id}', 'ConversationController@store')->name('conversation.store');
		Route::get('/conversation/get', 'ConversationController@index')->name('conversation.get');
        Route::post('/conversation/delete', 'ConversationController@deleteMessage')->name('conversation.deleteMessage');
      
	});

	//Social login
	Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->name('googleLogin');
	Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('googleCallback');

	Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook')->name('facebookLogin');
	Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback')->name('facebookCallback');

	Route::get('/profile/{id}', 'UserController@userProfile')->name('userProfile');

	//firebase notification
	Route::post('/save-token', 'NotificationController@saveToken')->name('saveToken');
	Route::post('/send-notification', 'NotificationController@sendNotification')->name('sendNotification');
	Route::get('/test-notification', 'NotificationController@testNotification')->name('testNotification');
	
	Route::get('/slike-search', 'UserController@slikeSearch')->name('slikeSearch');
	Route::get('search-all','WebController@searchAll')->name('searchAll');
	Route::get('tag-videos/{val}','WebController@searchTagVideos')->name('tagVideos');
});

Route::group(['prefix' => $adminRoute, 'namespace' => 'Admin', 'as' => 'admin.'], function () {
	// Routes without auth check for guest customers
	Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login')->name('loginPost');
	Route::get('/register', 'Auth\RegisterController@index')->name('register');
	Route::post('/register', 'Auth\RegisterController@register')->name('registerPost');
	Route::get('/logout', 'AdminController@logout')->name('logout');

	// Routes with auth check for logged in admin
	Route::group(['middleware' => 'auth:admin'], function () {
		Route::get('/dashboard', 'AdminController@index')->name('dashboard');
		Route::get('/change_password/', 'AdminController@changePassword')->name('change_password.index')->middleware('app_version_check');
		Route::post('/update_password/', 'AdminController@updatePassword')->name('change_password.update');

		// categories management system ( Listing, Add, Edit, Delete , Copy )
		Route::resource('categories', 'CategoryController');
		Route::post('/categories/delete', 'CategoryController@delete')->name('categories_delete');
		Route::get('/categories/create/{category_id?}', 'CategoryController@create')->name('categories_create');
		Route::get('/categories/{category_id}/view', 'CategoryController@view')->name('categories_view');
		Route::get('/categories/{category_id}/copy', 'CategoryController@copyContent')->name('categories_copy');
		Route::get('/categories/{category_id}/edit', 'CategoryController@edit')->name('categories_edit');
		Route::post('/categories/server_processing', 'CategoryController@serverProcessing')->name('categories_server_processing');

		Route::resource('sounds', 'SoundController');
		Route::post('/sounds/delete', 'SoundController@delete')->name('sounds_delete');
		Route::post('/sounds/select_cat', 'SoundController@select_cat')->name('sounds_select_cat');
		Route::post('/sounds/create', 'SoundController@create')->name('sounds_create');
		Route::get('/sounds/{user_id}/copy', 'SoundController@copyContent')->name('sounds_copy');
		Route::get('/sounds/{user_id}/view', 'SoundController@view')->name('sounds_view');
		Route::get('/sounds/detail/{payment_id}', 'SoundController@detail')->name('sounds_detail');
		Route::post('/sounds/server_processing', 'SoundController@serverProcessing')->name('sounds_server_processing');
		Route::post('/sounds/audio_play', 'SoundController@audio_play')->name('audio_play');

		Route::resource('videos', 'VideoController');
		Route::post('/videos/delete', 'VideoController@delete')->name('videos_delete');
		Route::post('/videos/create', 'VideoController@create')->name('videos_create');
		Route::get('/videos/{user_id}/view', 'VideoController@view')->name('videos_view');
		Route::get('/videos/{user_id}/edit', 'VideoController@edit')->name('videos_edit');
		Route::get('/videos/{user_id}/copy', 'VideoController@copyContent')->name('videos_copy');
		Route::post('/videos/server_processing', 'VideoController@serverProcessing')->name('videos_server_processing');
		Route::post('/videos/flag_video', 'VideoController@flaged_video')->name('flag_video');
		Route::post('/videos/active_video', 'VideoController@active_video')->name('active_video');
        Route::get('/videos/convert-all-videos-to-hls-stream/do', 'VideoController@convertAllVideosToHlsStream')->name('convertAllVideosToHlsStream');

		
		Route::resource('flagvideos', 'FlagVideoController');
		Route::post('/flagvideos/delete', 'FlagVideoController@delete')->name('flagvideos_delete');
		Route::post('/flagvideos/flag_video', 'FlagVideoController@flaged_video')->name('flaged_video');
		Route::post('/flagvideos/server_processing', 'FlagVideoController@serverProcessing')->name('flagvideos_server_processing');

		Route::resource('tags', 'TagController');
		Route::post('/tags/delete', 'TagController@delete')->name('tags_delete');
		Route::post('/tags/create', 'TagController@create')->name('tags_create');
		Route::get('/tags/{user_id}/view', 'TagController@view')->name('tags_view');
		Route::get('/tags/{user_id}/edit', 'TagController@edit')->name('tags_edit');
		Route::get('/tags/{user_id}/copy', 'TagController@copyContent')->name('tags_copy');
		Route::post('/tags/server_processing', 'TagController@serverProcessing')->name('tags_server_processing');

		Route::resource('sponsors', 'SponsorController');
		Route::post('/sponsors/delete', 'SponsorController@delete')->name('sponsors_delete');
		Route::post('/sponsors/create', 'SponsorController@create')->name('sponsors_create');
		Route::get('/sponsors/{user_id}/view', 'SponsorController@view')->name('sponsors_view');
		Route::get('/sponsors/{user_id}/edit', 'SponsorController@edit')->name('sponsors_edit');
		Route::get('/sponsors/{user_id}/copy', 'SponsorController@copyContent')->name('sponsors_copy');
		Route::post('/sponsors/server_processing', 'SponsorController@serverProcessing')->name('sponsors_server_processing');

		Route::resource('candidates', 'CandidateController');
		Route::post('/candidates/delete', 'CandidateController@delete')->name('candidates_delete');
		Route::get('/candidates/copy/{user_id}', 'CandidateController@copyContent')->name('candidates_copy');
		Route::get('/candidates/view/{user_id?}', 'CandidateController@view')->name('candidates_view');
		Route::get('/candidates/edit/{user_id?}', 'CandidateController@edit')->name('candidates_edit');
		Route::post('/candidates/active_video', 'CandidateController@active_user')->name('active_user');
		
		Route::get('/candidates/{action?}/photos/{user_id?}', 'CandidateController@photos')->name('candidates_photos');
		Route::get('/candidates/{action?}/videos/{user_id?}', 'CandidateController@videos')->name('candidates_videos');
		Route::get('/candidates/{action?}/audios/{user_id?}', 'CandidateController@audios')->name('candidates_audios');
		Route::get('/candidates/inactive/{user_id}', 'CandidateController@inactive')->name('candidates_inactive');
		Route::get('/candidates/active/{user_id}', 'CandidateController@active')->name('candidates_active');
		Route::post('/candidates/server_processing', 'CandidateController@serverProcessing')->name('candidates_server_processing');
		Route::get('/candidates/changePassword/{user_id}', 'CandidateController@changePassword')->name('candidates_changePassword');
		Route::post('/candidates/updatePassword/{user_id}', 'CandidateController@updatePassword')->name('candidates_updatePassword');
		Route::post('/candidates/loadMore', 'CandidateController@loadMore')->name('candidates_loadMore');
		Route::post('/candidates/loadMoreVideos', 'CandidateController@loadMoreVideos')->name('candidates_loadMoreVideos');
		Route::post('/candidates/loadMoreAudios', 'CandidateController@loadMoreAudios')->name('candidates_loadMoreAudios');

		Route::resource('user-verify', 'UserVerifyController');
		Route::post('/user-verify/server_processing', 'UserVerifyController@serverProcessing')->name('user_verify_server_processing');
		Route::post('/user-verify/delete', 'UserVerifyController@delete')->name('user_verify_delete');
		Route::post('/user-verify/reject', 'UserVerifyController@reject')->name('user_verify_reject');
		Route::get('/user-verify/accept/{user_id}', 'UserVerifyController@accept')->name('user_verify_accept');
		
		// Route::resource('settings', 'SettingController');
		Route::get('/settings/{type?}', 'SettingController@index')->name('settings');
		Route::post('/settings-update', 'SettingController@update')->name('settings_update');

		Route::post('/settings/delete', 'SettingController@delete')->name('settings_delete');
		Route::get('/settings/copy/{msg_id}', 'SettingController@copyContent')->name('settings_copy');
		Route::post('/settings/server_processing', 'SettingController@serverProcessing')->name('settings_server_processing');
		Route::get('/settings/clear/cache', 'SettingController@clearCache')->name('clear_cache');
		Route::get('/settings/check/update', 'SettingController@checkForUpdates')->name('check_updates');
		Route::get('/ads-settings/{type?}', 'SettingController@adSettings')->name('ad_settings');
		Route::post('/ad-settings-update', 'SettingController@adSettingUpdate')->name('ad_settings_update');
		Route::get('/nsfw-settings/{type?}', 'SettingController@nsfwSettings')->name('nsfw_settings');
		Route::post('/nsfw-settings-update', 'SettingController@nsfwSettingUpdate')->name('nsfw_settings_update');
		Route::get('/mail-settings/{type?}', 'SettingController@mailSettings')->name('mail_settings')->middleware('app_version_check');
		Route::post('/mail-settings-update', 'SettingController@mailSettingUpdate')->name('mail_settings_update');

		Route::get('/home-settings', 'SettingController@homeSettings')->name('home_settings');
		Route::post('/home-settings-update', 'SettingController@homeSettingUpdate')->name('home_settings_update');

		Route::get('/social-settings/{type?}', 'SettingController@socialSettings')->name('social_settings')->middleware('app_version_check');
		Route::post('/social-settings-update', 'SettingController@socialSettingUpdate')->name('social_settings_update');

		Route::get('/pusher-settings/{type?}', 'SettingController@pusherSettings')->name('pusher_settings')->middleware('app_version_check');
		Route::post('/pusher-settings-update', 'SettingController@pusherSettingUpdate')->name('pusher_settings_update');

		Route::get('/google-captcha/{type?}', 'SettingController@googleCaptchaSettings')->name('google_captcha')->middleware('app_version_check');
		Route::post('/google-captcha-update', 'SettingController@googleCaptchaUpdate')->name('google_captcha_update');

        Route::get('/inapp-purchase-products', 'SettingController@inappPurchase')->name('inapp_purchase_products')->middleware('app_version_check');
		Route::post('/inapp-purchase-products-update', 'SettingController@inappPurchaseUpdate')->name('ginapp_purchase_products_update');
		
		Route::get('/social-media-links', 'SettingController@socialMediaLinks')->name('social_media_links');
		Route::post('/social-media-links-update', 'SettingController@socialMediaLinksUpdate')->name('social_media_links_update');

		Route::get('/app-settings/{type?}', 'SettingController@appSettings')->name('app_settings');
		Route::post('/app-settings-update', 'SettingController@appSettingUpdate')->name('app_settings_update');
		Route::post('/app-login-settings-update', 'SettingController@appLoginSettingUpdate')->name('app_login_settings_update');
		Route::post('/app-general-settings-update', 'SettingController@appGeneralSettingUpdate')->name('app_general_settings_update');
		
		Route::get('/app-config-settings', 'AppConfigSettingController@index')->name('app_config_settings');
		Route::post('/app-config-settings-update', 'AppConfigSettingController@appConfigSettingUpdate')->name('app_config_settings_update');

		Route::get('/storage-settings/{type?}', 'SettingController@storageSettings')->name('storage_settings');
		Route::post('/storage-settings-update', 'SettingController@storageSettingUpdate')->name('storage_settings_update');

		Route::get('/stream-settings/{type?}', 'SettingController@streamSettings')->name('stream_settings');
		Route::post('/stream-settings-update', 'SettingController@streamSettingUpdate')->name('stream_settings_update')->middleware('app_version_check');

		Route::get('export', 'ImportController@export')->name('export');
		Route::get('importExportView', 'ImportController@importExportView')->name('exportView');
		Route::post('import', 'ImportController@import')->name('import');

		Route::resource('reports', 'ReportController');
		Route::post('/reports/server_processing', 'ReportController@serverProcessing')->name('reports_server_processing');
	
		Route::resource('pages', 'PageController');
		Route::post('/pages/delete', 'PageController@delete')->name('pages_delete');
		Route::post('/pages/create', 'PageController@create')->name('pages_create');
		Route::get('/pages/{user_id}/view', 'PageController@view')->name('pages_view');
		Route::get('/pages/{user_id}/edit', 'PageController@edit')->name('pages_edit');
		Route::get('/pages/{user_id}/copy', 'PageController@copyContent')->name('pages_copy');
		Route::post('/pages/server_processing', 'PageController@serverProcessing')->name('pages_server_processing');
	
		Route::get('/app-version-warning', 'SettingController@appVersion')->name('app-version-warning');
		Route::get('/admin-app-version-warning', 'SettingController@adminAppVersion')->name('admin-app-version-warning');

		Route::resource('comments', 'CommentController');
		Route::post('/comments/delete', 'CommentController@delete')->name('comments_delete');
		Route::post('/comments/server_processing', 'CommentController@serverProcessing')->name('comments_server_processing');
	
		Route::resource('chats', 'ChatController');
		Route::post('/chats/delete', 'ChatController@delete')->name('chats_delete');
		Route::post('/chats/server_processing', 'ChatController@serverProcessing')->name('chats_server_processing');
	
		Route::resource('likes', 'LikeController');
		Route::post('/likes/delete', 'LikeController@delete')->name('likes_delete');
		Route::post('/likes/server_processing', 'LikeController@serverProcessing')->name('likes_server_processing');
	
		Route::get('/chat-migration', 'SettingController@chatMigration')->name('chat-migration');

		
		Route::resource('languages', 'LanguageController');
		Route::post('/languages/delete', 'LanguageController@delete')->name('languages_delete');
		Route::post('/languages/create', 'LanguageController@create')->name('languages_create');
		Route::get('/languages/{user_id}/view', 'LanguageController@view')->name('languages_view');
		Route::get('/languages/{user_id}/edit', 'LanguageController@edit')->name('languages_edit');
		Route::get('/languages/{user_id}/copy', 'LanguageController@copyContent')->name('languages_copy');
		Route::post('/languages/server_processing', 'LanguageController@serverProcessing')->name('languages_server_processing');

		Route::get('/translations', 'TranslationController@index')->name('translations');
		Route::get('/translations/create', 'TranslationController@create')->name('translations.create');
		Route::post('/translations/store', 'TranslationController@store')->name('translations.store');
		Route::post('/translations/update', 'TranslationController@update')->name('translations.update');
		Route::post('/translations/delete', 'TranslationController@delete')->name('translations.delete');
		Route::get('/translations/add-more', 'TranslationController@addMore')->name('translations.addMore');
		Route::get('/translations/export', 'TranslationController@export')->name('translations.export');
		Route::post('/translations/import', 'TranslationController@import')->name('translations.import');

		//// gifts
		Route::resource('gifts', 'GiftsController');
		Route::post('/gifts/delete', 'GiftsController@delete')->name('gifts_delete');
		Route::get('/gifts/create/{id?}', 'GiftsController@create')->name('gifts_create');
		Route::get('/gifts/{id}/view', 'GiftsController@view')->name('gifts_view');
		Route::get('/gifts/{id}/edit', 'GiftsController@edit')->name('gifts_edit');
		Route::post('/gifts/server_processing', 'GiftsController@serverProcessing')->name('gifts_server_processing');
		// end gifts

		//// payment_history
		Route::resource('payment_history', 'PaymentHistoryController');
		Route::post('/payment_history/server_processing', 'PaymentHistoryController@serverProcessing')->name('payment_history_server_processing');
		Route::post('/payment_history/delete', 'PaymentHistoryController@delete')->name('payment_history_delete');
		// payment_history 

		//// send coins admin wallet history
		Route::resource('send-coins', 'SendCoinController');
		// Route::post('/send-coins/delete', 'SendCoinsController@delete')->name('send_coins_delete');
		Route::get('/send-coins/create/{id?}', 'SendCoinController@create')->name('send_coins_create');
		// Route::get('/send-coins/{id}/view', 'SendCoinsController@view')->name('send_coins_view');
		Route::get('/send-coins/{id}/edit', 'SendCoinController@edit')->name('send_coins_edit');
		Route::post('/send-coins/server_processing', 'SendCoinController@serverProcessing')->name('send_coins_server_processing');
		Route::get('send-coins/get/users', 'SendCoinController@getUsers')->name('getUsers');
		// end send coins admin wallet history

		//// withdraw requests
		Route::resource('withdraw_requests', 'WithdrawRequestController');
		Route::post('/withdraw_requests/paid', 'WithdrawRequestController@updateStatus')->name('withdraw_requests_paid');
		Route::post('/withdraw_requests/server_processing', 'WithdrawRequestController@serverProcessing')->name('withdraw_requests_server_processing');
		// withdraw requests gifts
		
	});
});


Route::get('{video_id}', 'IndexController@showVideo')->name('show-video');
Route::get('view-video/{id}', 'IndexController@viewVideo')->name('view-video');

Route::get('/open/app/{id?}', 'IndexController@index')->name('openmyapp');

Route::get('web/open-video', 'IndexController@showVideoWeb')->name('open-video');
