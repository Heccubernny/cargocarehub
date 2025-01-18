<?php

use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/track', [TrackController::class, 'index']);
Route::post('/track', [TrackController::class, 'track']);
Route::get('/track/pdf/{tnumber}', [TrackController::class, 'generatePDF']);
Route::get('/404', function () {
    return view('404');
});
Route::get('/aa', function () {
    return view('aa');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/index-2', function () {
    return view('index-2');
});
Route::get('/index-3', function () {
    return view('index-3');
});
Route::get('/news-details', function () {
    return view('news-details');
});
Route::get('/news', function () {
    return view('news');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/services-details', function () {
    return view('services-details');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/team-details', function () {
    return view('team-details');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/testimoinals', function () {
    return view('testimoinals');
});
