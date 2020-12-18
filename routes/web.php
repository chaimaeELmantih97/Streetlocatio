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

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

Auth::routes();

Route::get('user/login',[App\http\Controllers\FrontendController::class,'login'])->name('login.form');
Route::post('user/login',[App\http\Controllers\FrontendController::class,'loginSubmit'])->name('login.submit');
Route::get('user/logout',[App\http\Controllers\FrontendController::class,'logout'])->name('user.logout');

Route::get('user/register',[App\http\Controllers\FrontendController::class,'register'])->name('register.form');
Route::post('user/register',[App\http\Controllers\FrontendController::class,'registerSubmit'])->name('register.submit');

// Reset password
Route::get('resetpassword', [App\http\Controllers\FrontendController::class,'showResetForm'])->name('passwordReset'); 
Route::get('password-reset', [App\http\Controllers\FrontendController::class,'showResetForm2'])->name('password.reset');
Route::post('password.update', [App\http\Controllers\FrontendController::class,'updatepassword'])->name('password.update');

// Socialite 
Route::get('login/{provider}/', [App\http\Controllers\Auth\LoginController::class,'redirect'])->name('login.redirect');
Route::get('login/{provider}/callback/', [App\http\Controllers\Auth\LoginController::class,'Callback'])->name('login.callback');

Route::get('/',[App\http\Controllers\FrontendController::class,'home'])->name('home');

// Frontend Routes
Route::get('/home', [App\http\Controllers\FrontendController::class,'index']);
Route::get('/about-us',[App\http\Controllers\FrontendController::class,'aboutUs'])->name('about-us');
Route::get('/contact-us',[App\http\Controllers\FrontendController::class,'contact'])->name('contact-us');
Route::post('/contact/message',[App\http\Controllers\MessageController::class,'store'])->name('contact.store');
Route::get('car-detail/{slug}',[App\http\Controllers\FrontendController::class,'CarDetail'])->name('car-detail');
Route::post('/car/search',[App\http\Controllers\FrontendController::class,'CarSearch'])->name('Car.search');
Route::get('/car-cat/{slug}',[App\http\Controllers\FrontendController::class,'CarCat'])->name('Car-cat');
Route::get('/car-sub-cat/{slug}/{sub_slug}',[App\http\Controllers\FrontendController::class,'CarSubCat'])->name('car-sub-cat');
Route::get('/car-brand/{slug}',[App\http\Controllers\FrontendController::class,'CarBrand'])->name('Car-brand');

Route::get('/Promotions',[App\http\Controllers\PromosController::class,'frontend'])->name('Promotions');
// Cart section

// Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/car-grids',[App\http\Controllers\FrontendController::class,'carGrids'])->name('car-grids');
// AvailableCars
Route::post('/AvailableCars',[App\http\Controllers\CarController::class,'AvailableCars'])->name('AvailableCars');
Route::post('/isAvailable',[App\http\Controllers\CarController::class,'isAvailable'])->name('isAvailable');
Route::post('bookingStep1',[App\http\Controllers\CarController::class,'booking1'])->name('bookingStep1');
Route::post('bookingStep2',[App\http\Controllers\CarController::class,'booking2'])->name('bookingStep2');
Route::post('bookingStep3',[App\http\Controllers\CarController::class,'booking3'])->name('bookingStep3');
Route::match(['get','post'],'/filter',[App\http\Controllers\FrontendController::class,'carFilter'])->name('shop.filter');
Route::match(['get','post'],'/filterCategory',[App\http\Controllers\FrontendController::class,'carFilter2'])->name('filter');

// Blog
Route::get('/blog',[App\http\Controllers\FrontendController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[App\http\Controllers\FrontendController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[App\http\Controllers\FrontendController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[App\http\Controllers\FrontendController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[App\http\Controllers\FrontendController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[App\http\Controllers\FrontendController::class,'blogByTag'])->name('blog.tag');

// NewsLetter
Route::post('/subscribe',[App\http\Controllers\FrontendController::class,'subscribe'])->name('subscribe');

// car Review
Route::resource('/review',App\http\Controllers\carReviewController::class);
Route::post('car/{slug}/review',[App\http\Controllers\carReviewController::class,'store'])->name('review.store');

// Post Comment 
Route::post('post/{slug}/comment',[App\http\Controllers\PostCommentController::class,'store'])->name('post-comment.store');
Route::resource('/comment',App\http\Controllers\PostCommentController::class);
// Coupon
Route::post('/coupon-store',[App\http\Controllers\CouponController::class,'couponStore'])->name('coupon-store');
// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

// Backend section start
// 
// Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/admin',[App\http\Controllers\AdminController::class,'index'])->name('admin');
    // user route
    Route::resource('/admin/users',App\http\Controllers\UsersController::class);
    // Banner
    Route::resource('/admin/banner',App\http\Controllers\BannerController::class);
    
    // Profile
    Route::get('/admin/profile',[App\http\Controllers\AdminController::class,'profile'])->name('admin-profile');
    Route::post('/admin/profile/{id}',[App\http\Controllers\AdminController::class,'profileUpdate'])->name('profile-update');
    // car
    Route::resource('/admin/cars',App\http\Controllers\CarController::class);
      // demandefchange.password.form
      Route::resource('/admin/demandes',App\http\Controllers\DemandeReservationController::class);
      Route::get('/admin/demande/pdf/{id}',[App\http\Controllers\DemandeReservationController::class,'pdf'])->name('demande.pdf');
   
    // POST category
    Route::resource('/admin/post-category',App\http\Controllers\PostCategoryController::class);
    // Post tag
    Route::resource('/admin/post-tag',App\http\Controllers\PostTagController::class);
    // Post
    Route::resource('/admin/post',App\http\Controllers\PostController::class);
    // Message
    Route::resource('/admin/message',App\http\Controllers\MessageController::class);
    Route::get('/admin/message/five',[App\http\Controllers\MessageController::class,'messageFive'])->name('messages.five');

    // Order
    Route::resource('/admin/order',App\http\Controllers\OrderController::class);
  
    // Settings
    Route::get('/admin/settings',[App\http\Controllers\AdminController::class,'settings'])->name('settings');
    Route::post('/admin/setting/update',[App\http\Controllers\AdminController::class,'settingsUpdate'])->name('settings.update');
    Route::get('/income',[App\http\Controllers\CarController::class,'income'])->name('product.order.income');
    // Notification
    // Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    // Route::get('/notifications','NotificationController@index')->name('all.notification');
    // Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', [App\http\Controllers\AdminController::class,'changePassword'])->name('change.password.form');
    Route::post('change-password', [App\http\Controllers\AdminController::class,'changPasswordStore'])->name('change.password');
// });










// User section start
// Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/user',[App\http\Controllers\HomeController::class,'index'])->name('user');
     // Profile
     Route::get('/profile',[App\http\Controllers\HomeController::class,'profile'])->name('user-profile');
     Route::post('/profile/{id}',[App\http\Controllers\HomeController::class,'profileUpdate'])->name('user-profile-update');
    //  Order
    Route::get('/order',[App\http\Controllers\HomeController::class,'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}',[App\http\Controllers\HomeController::class,'orderShow"'])->name('user.order.show');
    Route::delete('/order/delete/{id}',[App\http\Controllers\HomeController::class,'userOrderDelete'])->name('user.order.delete');
    // car Review
    Route::get('/user-review',[App\http\Controllers\HomeController::class,'carReviewIndex'])->name('user.carreview.index');
    Route::delete('/user-review/delete/{id}',[App\http\Controllers\HomeController::class,'carReviewDelete'])->name('user.carreview.delete');
    Route::get('/user-review/edit/{id}',[App\http\Controllers\HomeController::class,'carReviewEdit'])->name('user.carreview.edit');
    Route::patch('/user-review/update/{id}',[App\http\Controllers\HomeController::class,'carReviewUpdate'])->name('user.carreview.update');
    
    // Post comment
    Route::get('user-post/comment',[App\http\Controllers\HomeController::class,'userComment'])->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}',[App\http\Controllers\HomeController::class,'userCommentDelete'])->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}',[App\http\Controllers\HomeController::class,'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}',[App\http\Controllers\HomeController::class,'userCommentUpdate'])->name('user.post-comment.update');
    
    // Password Change

// });
