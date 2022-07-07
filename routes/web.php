<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ContactController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

});


Route::get('/logout', [AdminUserController::class, 'adminLogout' ])->name('admin.logout');

Route::prefix('admin')->group(function(){
	Route::get('/user/profile', [AdminUserController::class, 'userProfile' ])->name('user.profile');
	Route::get('/user/profile/edit', [AdminUserController::class, 'userProfileEdit' ])->name('user.profile.edit');
	Route::post('/user/profile/store', [AdminUserController::class, 'userProfileStore' ])->name('user.profile.store');
    Route::get('/change/password', [AdminUserController::class, 'userChangePassword' ])->name('change.password');
    Route::post('/change/password/update', [AdminUserController::class, 'userPasswordUpdate' ])->name('change.password.update');
});

Route::prefix('information')->group(function(){
    Route::get('/all', [InformationController::class, 'allInformation' ])->name('information.all');
    Route::get('/add', [InformationController::class, 'addInformation' ])->name('information.add');
    Route::post('/store', [InformationController::class, 'storeInformation' ])->name('information.store');
    Route::get('/edit/{id}', [InformationController::class, 'editInformation' ])->name('information.edit');
    Route::post('/update/{id}', [InformationController::class, 'updateInformation' ])->name('information.update');
    Route::get('/delete/{id}', [InformationController::class, 'deleteInformation' ])->name('information.delete');
});

Route::prefix('service')->group(function(){
    Route::get('/all', [ServiceController::class, 'allService' ])->name('service.all');
    Route::get('/add', [ServiceController::class, 'addService' ])->name('service.add');
    Route::post('/store', [ServiceController::class, 'storeService' ])->name('service.store');
    Route::get('/edit/{id}', [ServiceController::class, 'editService' ])->name('service.edit');
    Route::post('/update/{id}', [ServiceController::class, 'updateService' ])->name('service.update');
    Route::get('/delete/{id}', [ServiceController::class, 'deleteService' ])->name('service.delete');
});

Route::prefix('project')->group(function(){
    Route::get('/all', [ProjectController::class, 'allProject' ])->name('project.all');
    Route::get('/add', [ProjectController::class, 'addProject' ])->name('project.add');
    Route::post('/store', [ProjectController::class, 'storeProject' ])->name('project.store');
    Route::get('/edit/{id}', [ProjectController::class, 'editProject' ])->name('project.edit');
    Route::post('/update/{id}', [ProjectController::class, 'updateProject' ])->name('project.update');
    Route::get('/delete/{id}', [ProjectController::class, 'deleteProject' ])->name('project.delete');
});


Route::prefix('portfolio')->group(function(){
    Route::get('/all', [PortfolioController::class, 'allPortfolio' ])->name('portfolio.all');
    Route::get('/add', [PortfolioController::class, 'addPortfolio' ])->name('portfolio.add');
    Route::post('/store', [PortfolioController::class, 'storePortfolio' ])->name('portfolio.store');
    Route::get('/edit/{id}', [PortfolioController::class, 'editPortfolio' ])->name('portfolio.edit');
    Route::post('/update/{id}', [PortfolioController::class, 'updatePortfolio' ])->name('portfolio.update');
    Route::get('/delete/{id}', [PortfolioController::class, 'deletePortfolio' ])->name('portfolio.delete');
});

Route::prefix('home')->group(function(){
    Route::get('/all', [HomePageEtcController::class, 'allHomeContent' ])->name('homecontent.all');
    Route::get('/add', [HomePageEtcController::class, 'addHomeContent' ])->name('homecontent.add');
    Route::post('/store', [HomePageEtcController::class, 'storeHomeContent' ])->name('homecontent.store');
    Route::get('/edit/{id}', [HomePageEtcController::class, 'editHomeContent' ])->name('homecontent.edit');
    Route::post('/update/{id}', [HomePageEtcController::class, 'updateHomeContent' ])->name('homecontent.update');
    Route::get('/delete/{id}', [HomePageEtcController::class, 'deleteHomeContent' ])->name('homecontent.delete');
});


Route::prefix('review')->group(function(){
    Route::get('/all', [ClientReviewController::class, 'allReview' ])->name('review.all');
    Route::get('/add', [ClientReviewController::class, 'addReview' ])->name('review.add');
    Route::post('/store', [ClientReviewController::class, 'storeReview' ])->name('review.store');
    Route::get('/edit/{id}', [ClientReviewController::class, 'editReview' ])->name('review.edit');
    Route::post('/update/{id}', [ClientReviewController::class, 'updateReview' ])->name('review.update');
    Route::get('/delete/{id}', [ClientReviewController::class, 'deleteReview' ])->name('review.delete');
});


Route::prefix('footer')->group(function(){
    Route::get('/all', [FooterController::class, 'allFooter' ])->name('footer.all');
    Route::post('/store', [FooterController::class, 'storeFooter' ])->name('footer.store');
    Route::get('/edit/{id}', [FooterController::class, 'editFooter' ])->name('footer.edit');
    Route::post('/update/{id}', [FooterController::class, 'updateFooter' ])->name('footer.update');
    Route::get('/delete/{id}', [FooterController::class, 'deleteFooter' ])->name('footer.delete');
});


Route::prefix('chart')->group(function(){
    Route::get('/all', [ChartController::class, 'allChart' ])->name('chart.all');
    Route::get('/add', [ChartController::class, 'addChart' ])->name('chart.add');
    Route::post('/store', [ChartController::class, 'storeChart' ])->name('chart.store');
    Route::get('/edit/{id}', [ChartController::class, 'editChart' ])->name('chart.edit');
    Route::post('/update/{id}', [ChartController::class, 'updateChart' ])->name('chart.update');
    Route::get('/delete/{id}', [ChartController::class, 'deleteChart' ])->name('chart.delete');
});

Route::prefix('message')->group(function(){
    Route::get('/all', [ContactController::class, 'allMessage' ])->name('message.all');
    Route::get('/delete/{id}', [ContactController::class, 'deleteMessage' ])->name('message.delete');
});
