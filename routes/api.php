<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomePageEtcController;


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


Route::get('/chartdata', [ChartController::class, 'onSelectAll' ]);

Route::get('/clientreview', [ClientReviewController::class, 'onSelectAll' ]);

Route::post('/contact', [ContactController::class, 'onContactSent' ]);

Route::get('/portfoliohome', [PortfolioController::class, 'onSelectFour' ]);
Route::get('/portfolioall', [PortfolioController::class, 'onSelectAll' ]);
Route::get('/portfoliodetails/{portfolioId}', [PortfolioController::class, 'onSelectDetails' ]);

Route::get('/footerdata', [FooterController::class, 'onSelectAll' ]);

Route::get('/information', [InformationController::class, 'onSelectAll' ]);

Route::get('/services', [ServiceController::class, 'serviceView' ]);

Route::get('/projecthome', [ProjectController::class, 'onSelectThree' ]);
Route::get('/projectall', [ProjectController::class, 'onSelectAll' ]);
Route::get('/projectdetails/{projectId}', [ProjectController::class, 'onSelectDetails' ]);

Route::get('/home/video', [HomePageEtcController::class, 'selectVideo' ]);
Route::get('/totalhome', [HomePageEtcController::class, 'selectTotalHome' ]);
Route::get('/techhome', [HomePageEtcController::class, 'selectTechHome' ]);
Route::get('/homepage/title', [HomePageEtcController::class, 'selectHomeTitle' ]);