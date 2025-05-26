<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: user,key,token,Content-Type, x-xsrf-token");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


Route::group(['prefix' => 'v1', 'namespace' => 'API'], function () {
	Route::post('install-url', 'InstallerController@storeUrl')->name('storeUrl');

	Route::post('register', 'RegisterController@index')->name('user_register');
	Route::post('is-email-exist', 'RegisterController@isEmailExist')->name('is_email_exist');
	Route::post('login', 'RegisterController@login')->name('login');
	Route::post('social-register', 'RegisterController@socialRegister')->name('social-register');
	Route::post('refresh', 'RegisterController@refresh')->name('refresh');
	Route::post('resend-otp', 'RegisterController@resendOtp')->name('resend-otp');
	Route::post('logout', 'UserController@logout')->name('logout');
	Route::post('register-social', 'RegisterController@socialLogin')->name('user_register_social');
	Route::post('verify-otp', 'RegisterController@verifyOtp')->name('verify_otp');
	Route::get('get-sounds', 'SoundController@index')->name('get_sounds');
	Route::get('fav-sounds', 'SoundController@favSounds')->name('get_fav_sounds');
	Route::post('set-fav-sound', 'SoundController@setFavSound')->name('set_fav_sound');
	Route::get('get-videos', 'VideoController@index')->name('get_videos');
	Route::post('get-videos', 'VideoController@index')->name('get_videos');
	Route::get('user_information', 'RegisterController@loginProfileInformation')->name('user_information');
	Route::post('update_user_information', 'RegisterController@updateUserInformation')->name('update_user_information');
	Route::post('update_profile_pic', 'UserController@updateUserProfilePic')->name('update_profile_pic');
	Route::post('upload-video', 'VideoController@uploadVideo')->name('upload-video');
	Route::post('fetch-user-info', 'UserController@fetchUserInformation')->name('fetch-user-info');
	Route::post('fetch-login-user-info', 'UserController@fetchLoginUserInformation')->name('fetch-login-user-info');
	Route::post('fetch-login-user-fav-videos', 'UserController@fetchLoginUserFavVideos')->name('fetch-login-user-fav-videos');
	Route::post('video-like', 'VideoController@videoLikes')->name('video-like');
	Route::post('fetch-video-comments', 'VideoController@fetchVideoComments')->name('fetch-video-comments');
	Route::post('add-comment', 'VideoController@addComment')->name('add-comment');
	Route::post('follow-unfollow-user', 'UserController@followUnfollowUser')->name('follow-unfollow-user');
	Route::post('remove-follower', 'UserController@removeFollower')->name('remove-follower');

	Route::post('video-upload-2', 'VideoController@uploadVideo2')->name('video-upload-2');
	Route::post('filter-video-upload', 'VideoController@filterUploadVideo')->name('filter-video-upload');
	Route::post('hash-tag-videos', 'VideoController@hashTagVideos')->name('hash-tag-videos');
	Route::post('video-views', 'VideoController@video_views')->name('video-views');
	Route::post('video-enabled', 'VideoController@video_enabled')->name('video-enabled');
	Route::post('delete-video', 'VideoController@deleteVideo')->name('delete-video');
	Route::post('most-viewed-video-users', 'VideoController@mostViewedVideoUsers')->name('most-viewed-video-users');
	Route::post('following-users-list', 'UserController@FollowingUsersList')->name('following-users-list');
	Route::post('followers-list', 'UserController@FollowersList')->name('followers-list');
	Route::get('blocked-users-list', 'UserController@blockedUsersList')->name('blocked-users-list');
	Route::post('get-unique-id', 'UserController@unique_user_id')->name('get-unique-id');
	Route::post('get-sound', 'SoundController@getSound')->name('get-sound');
	Route::get('get-cat-sounds', 'SoundController@getCategorySounds')->name('get-cat-sounds');
	Route::post('submit-report', 'UserController@submitReport')->name('submit-report');
	Route::post('delete-comment', 'UserController@deleteComment')->name('delete-comment');
	Route::post('edit-comment', 'UserController@editComment')->name('edit-comment');
	Route::post('block-user', 'UserController@blockUser')->name('block-user');
	Route::get('get-ads', 'adController@index')->name('get-ads');
	Route::get('get-watermark', 'VideoController@getWatermark')->name('get-watermark');
	Route::post('user-verify', 'UserController@userVerify')->name('user-verify');
	Route::get('verify-status', 'UserController@verifyStatusDetail')->name('verify-status');

	Route::get('app-configration', 'AppController@appConfig')->name('app-configration');
	Route::get('app-login', 'AppController@index')->name('app-login');
	Route::get('get-translations', 'AppController@getTranslations')->name('get-translations');
	Route::get('end-user-license-agreement', 'AppController@endUserLicenseAgreement')->name('end-user-license-agreement');
	Route::post('change-password', 'UserController@changePassword')->name('change-password');

	Route::get('get-eula-agree', 'UserController@getEulaAgree')->name('get-eula-agree');
	Route::post('update-eula-agree', 'UserController@updateEulaAgree')->name('update-eula-agree');
	Route::post('forgot-password', 'UserController@forgotPassword')->name('forgot-password');
	Route::post('update-forgot-password', 'UserController@updateForgotPassword')->name('update-forgot-password');
	Route::post('update-video-description', 'VideoController@updateVideoDescription')->name('update-video-description');

	Route::get('search', 'AppController@search')->name('search');
	Route::get('user-search', 'AppController@searchUsers')->name('user-search');
	Route::get('video-search', 'AppController@searchVideos')->name('video-search');
	Route::get('tag-search', 'AppController@searchTags')->name('tag-search');
	Route::get('hash-videos', 'AppController@hashTagVideos')->name('hash-videos');

	Route::post('add-guest-user', 'UserController@addGuestUser')->name('add-guest-user');
	Route::post('update-fcm-token', 'UserController@updateFcmToken')->name('update-fcm-token');

	Route::post('update-notification-setting', 'SettingController@updateNotificationSetting')->name('update-notification-setting');
	Route::post('user-notification-setting', 'SettingController@userNotification')->name('user-notification-setting');

	Route::post('notifications-list', 'UserController@notificationsList')->name('notifications-list');

	Route::post('/chat-users', 'ConversationController@chatUsers')->name('chat-users');
	Route::post('/conversation/store', 'ConversationController@store')->name('conversation.store');
	Route::post('/conversation/get', 'ConversationController@getConversation')->name('conversation.get');
	Route::post('get-online-users', 'ConversationController@getOnlineUsers')->name('get-online-users');

	Route::post('/message/{conversation}/store', 'ChatController@storeMessage')->name('chats.storeMessage');
	Route::post('/message/{conversation}/read', 'ChatController@readMessage')->name('chats.readMessage');
	Route::post('/message/{conversation}/delete', 'ChatController@deleteMessage')->name('chats.deleteMessage');
	Route::post('/message/{conversation}/typing', 'ChatController@typingMessage')->name('chats.typingMessage');
	Route::post('/message/{conversation}/get-messages', 'ChatController@getMessage')->name('chats.getMessage');

	Route::post('get-chat-with', 'UserController@getChatWith')->name('get-chat-with');

	Route::post('delete-user-confirmation', 'UserController@deleteProfileConfirmation')->name('delete-user-confirmation');
	Route::post('delete-user-profile', 'UserController@deleteProfile')->name('delete-user-profile');

	// streaming routes
	Route::post('start-stream', 'StreamController@start')->name('start-stream');
	Route::post('stop-stream', 'StreamController@stop')->name('stop-stream');
	Route::post('join-stream', 'StreamController@join')->name('join-stream');
	Route::post('exit-stream', 'StreamController@exit')->name('exit-stream');
	Route::post('add-stream-comment', 'StreamController@addComment')->name('add-stream-comment');
	Route::post('live-stream-list', 'StreamController@liveStreamsList')->name('live-stream-list');
	Route::post('live-user-leave', 'StreamController@leavingLiveUser')->name('live-user-leave');

    //Gifts
	Route::get('gifts','GiftsController@list')->name('gifts');
	Route::post('send-gift','GiftsController@sendGift')->name('send-gift');
	Route::get('my-gifts','GiftsController@myGifts')->name('my-gifts');
	Route::get('sent-gifts','GiftsController@sentGifts')->name('sent-gifts');
	Route::post('send-stream-gift','GiftsController@sendStreamGift')->name('send-stream-gift');
	
	//Wallet
	Route::post('purchase-product', 'WalletController@purchaseProduct')->name('purchase-product');
    Route::post('challenge-entry', 'WalletController@entry')->name('challenge-entry');
    Route::get('wallet-history', 'WalletController@walletHistory')->name('wallet-history');
    Route::get('payment-types', 'WalletController@paymentTypes')->name('payment-types');
    Route::post('withdraw-request', 'WalletController@withdrawRequest')->name('withdraw-request');
    Route::get('withdraw-request-list', 'WalletController@withdrawRequestsList')->name('withdraw-request-list');
	// 	});
});
