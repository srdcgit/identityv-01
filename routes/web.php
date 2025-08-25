<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\GoogleAuthController;
use App\Http\Controllers\User\GoogleCalenderController;
use App\Http\Controllers\web\AboutController;
use App\Lib\Router;
use App\Models\Module;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->group(function () {
    Route::get('/', 'supportTicket')->name('ticket');
    Route::get('/new', 'openSupportTicket')->name('ticket.open');
    Route::post('/create', 'storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'replyTicket')->name('ticket.reply');
    Route::post('/close/{ticket}', 'closeTicket')->name('ticket.close');
    Route::get('/download/{ticket}', 'ticketDownload')->name('ticket.download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/career-library', 'careerLibrary')->name('carrer_library');
    Route::get('/view-carrer-library/{id}', 'viewCarrerLibrary')->name('viewCarrerLibrary');
    Route::get('/view-details/{id}', 'viewdetails')->name('viewdetails');
    Route::get('/psychometric-test', 'psychometricTest')->name('psychometricTest');
    Route::get('/events', 'events')->name('events');
    Route::get('/view-events/{id}', 'viewEvents')->name('viewEvents');
    Route::get('/services', 'services')->name('services');
    Route::get('/clientele', 'clientele')->name('clientele');
    Route::get('/csr', 'csr')->name('csr');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');

    // blog
    Route::get('/blog', 'blog')->name('blog');
    // plan
    Route::get('/plan', 'plan')->name('plans');
    

    // services
    Route::get('/services', 'services')->name('services');
    Route::get('service/{slug}/{id}', 'serviceDetails')->name('service.details');
    Route::get('service/filter', 'serviceFilter')->name('service.filtered');

    // portfolio
    Route::get('portfolio/{slug}/{id}', 'portfolioDetails')->name('portfolio.details');
    Route::get('portfolio', 'fetchPortfolio')->name('portfolio');
    Route::get('portfolio/filter', 'portfolioFilter')->name('portfolio.filtered');

    // subscriber
    Route::post('/subscribe', 'subscribe')->name('subscribe');

    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');

    //Chatbot
    Route::post('get_module', [ChatBotController::class, 'getModule'])->name('getModule');
    Route::post('get_category', [ChatBotController::class, 'get_category'])->name('get_category');
    Route::post('get_subcategory', [ChatBotController::class, 'get_subcategory'])->name('get_subcategory');
    Route::post('get_scolarship', [ChatBotController::class, 'getScolarship'])->name('getScolarship');
    Route::post('get_entranceexam', [ChatBotController::class, 'getEntranceexam'])->name('getEntranceexam');
    Route::post('get_institute', [ChatBotController::class, 'getInstitute'])->name('getInstitute');
    Route::post('get_country', [ChatBotController::class, 'getCountry'])->name('getCountry');
    Route::post('get_state', [ChatBotController::class, 'getState'])->name('getState');
    Route::post('institute_type', [ChatBotController::class, 'Institute_type'])->name('Institute_type');
    Route::post('store', [ChatBotController::class, 'storeUser'])->name('storeUser');

    //Google Calender
    Route::get('google/redirect', [GoogleCalenderController::class, 'redirectToGoogle']);
    Route::get('google/callback', [GoogleCalenderController::class, 'handleGoogleCallback']);
    Route::get('calendar/events', [GoogleCalenderController::class, 'listEvents']);
    Route::post('calendar/event/create', [GoogleCalenderController::class, 'createEvent']);

    //Google Zoom Meeting
    // routes/web.php
    Route::get('oauth2/redirect', [GoogleAuthController::class, 'redirect']);
    Route::get('oauth2/callback', [GoogleAuthController::class, 'callback']);
});

// Route::match(['get', 'post'], '/botman/web', [BotManController::class,'handle']);
