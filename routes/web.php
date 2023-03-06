<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['check_referral']], function () {

	Route::get('language/{locale}', function ($locale) {
		app()->setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	});

	Route::group(['middleware' => 'localization'], function () {

		Route::get('/', [App\Http\Controllers\Front\FrontController::class, 'index']);
		Route::get('/about', [App\Http\Controllers\Front\FrontController::class, 'about']);
		Route::get('/news', [App\Http\Controllers\Front\FrontController::class, 'news']);
		Route::get('/single-news/{id}', [App\Http\Controllers\Front\FrontController::class, 'single_news'])->name('single_news');
		Route::get('/contact', [App\Http\Controllers\Front\FrontController::class, 'contact']);
		Route::get('/how-it-works', [App\Http\Controllers\Front\FrontController::class, 'how_it_works']);
		Route::post('/contact-post', [App\Http\Controllers\Front\ContactController::class, 'store'])->name('contact.store');
		Route::get('/faq', [App\Http\Controllers\Front\FrontController::class, 'faq']);
		Route::get('/terms_condition', [App\Http\Controllers\Front\FrontController::class, 'terms_condition']);
		Route::get('/privacy_policy', [App\Http\Controllers\Front\FrontController::class, 'privacy_policy']);

		// User Routes
		Route::group(['middleware' => ['auth', 'verified', 'user_access','check_manager_earning']], function () {
			Route::get('/my-account', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');

			Route::resource('user_wallet', 'App\Http\Controllers\User\WalletController');
			Route::resource('user_packages', 'App\Http\Controllers\User\PackageController');
			Route::resource('user_withdraws', 'App\Http\Controllers\User\WithdrawController');
			Route::resource('user_referrals', 'App\Http\Controllers\User\ReferralController');
			Route::resource('user_tansfer_money', 'App\Http\Controllers\User\TransferMoneyController');
			Route::resource('user_transactions', 'App\Http\Controllers\User\TransactionController');
			Route::resource('user_annoucements', 'App\Http\Controllers\User\AnnoucementController');
			Route::post('level-Withdraw', [App\Http\Controllers\User\WithdrawController::class, 'level_withdraw'])->name('user-level-withdraw');


			Route::get('user/support', [App\Http\Controllers\User\ContactController::class, 'index'])->name('user.support');
			Route::post('user/contact_store', [App\Http\Controllers\User\ContactController::class, 'store'])->name('user.contact_store');

			Route::get('user_deposits', [App\Http\Controllers\User\DepositController::class, 'index'])->name('user.deposits');

			Route::get('user/applied/surveys', [App\Http\Controllers\User\SurveyController::class, 'user_surveys'])->name('user.applied_surveys');
			Route::post('user/applied/{id}/done', [App\Http\Controllers\User\SurveyController::class, 'done'])->name('user.applied_surveys.done');

			Route::post('purchase_plan', [App\Http\Controllers\User\PurchasePlanController::class, 'store']);

			Route::get('user-notifications', [App\Http\Controllers\User\NotificationController::class, 'index'])->name('user_notifications.index');
			Route::delete('user-notifications/{id}/delete', [App\Http\Controllers\Udmin\NotificationController::class, 'destroy'])->name('user_notifications.destroy');

			Route::get('user/profile', ['as' => 'user.profile.edit', 'uses' => 'App\Http\Controllers\User\ProfileController@edit']);
			Route::put('user/profile', ['as' => 'user.profile.update', 'uses' => 'App\Http\Controllers\User\ProfileController@update']);
			Route::put('user/profile/password', ['as' => 'user.profile.password', 'uses' => 'App\Http\Controllers\User\ProfileController@password']);
		});
	});

	Route::get('reload-captcha', [App\Http\Controllers\Front\CaptchaValidationController::class, 'reloadCaptcha'])->name('reload-captha');

	Auth::routes(['verify' => true]);
	// Auth::routes();

	// Admin Routes
	Route::group(['middleware' => ['auth', 'admin_access']], function () {

		Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

		Route::resource('users', 'App\Http\Controllers\Admin\UserController');
		Route::resource('packages', 'App\Http\Controllers\Admin\PackageController');
		Route::resource('purchase_plans', 'App\Http\Controllers\Admin\PurchasePlanController');
		Route::resource('testimonials', 'App\Http\Controllers\Admin\TestimonialController');
		Route::resource('posts', 'App\Http\Controllers\Admin\PostController');
		Route::resource('withdraws', 'App\Http\Controllers\Admin\WithdrawController');
		Route::resource('referrals', 'App\Http\Controllers\Admin\ReferralController');
		Route::resource('transactions', 'App\Http\Controllers\Admin\TransactionController');
		Route::resource('payment_accounts', 'App\Http\Controllers\Admin\PaymentAccountController');
		Route::resource('annoucements', 'App\Http\Controllers\Admin\AnnoucementController');
		Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController');
		Route::resource('contact_messages', 'App\Http\Controllers\Admin\ContactMessageController');
		Route::resource('tansfer_money', 'App\Http\Controllers\Admin\TransferMoneyController');
		Route::resource('deposits', 'App\Http\Controllers\Admin\DepositController');

		Route::post('/tansfer_money/change_status', [App\Http\Controllers\Admin\TransferMoneyController::class, 'change_status'])->name('tansfer_money.change_status');

		Route::get('purchase_plans/approve/{id}', [App\Http\Controllers\Admin\PurchasePlanController::class, 'approve'])->name('user_registration.approve');
		Route::get('user_registration',  [App\Http\Controllers\Admin\SubscribeUserController::class, 'index'])->name('user_registration.index');
		Route::get('user_registration/disapprove/{id}', [App\Http\Controllers\Admin\SubscribeUserController::class, 'disapprove'])->name('user_registration.cancel');

		// Route::get('states', [App\Http\Controllers\Admin\AppProfileController::class, 'states_edit'])->name('states');
		// Route::post('update', [App\Http\Controllers\Admin\AppProfileController::class, 'states_update'])->name('states_update');

		Route::get('notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
		Route::delete('notifications/{id}/delete', [App\Http\Controllers\Admin\NotificationController::class, 'destroy'])->name('notifications.destroy');

		Route::get('/site/info', [App\Http\Controllers\Admin\AppProfileController::class, 'profile_setting'])->name('app.profile');
		Route::post('/site/update/info', [App\Http\Controllers\Admin\AppProfileController::class, 'profile_update'])->name('app.profile.update');

		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
	});

	Route::get('/optimize', function () {
		\Artisan::call('optimize');
	});
});
