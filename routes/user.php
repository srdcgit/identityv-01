<?php

use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\User\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RazorpayController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\UserController;

Route::namespace('User\Auth')->name('user.')->group(function () {

    Route::controller('LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::controller('RegisterController')->group(function () {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'register')->middleware('registration.status');
        Route::post('check-mail', 'checkUser')->name('checkUser');
    });

    Route::controller('ForgotPasswordController')->group(function () {
        Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'sendResetCodeEmail')->name('password.email');
        Route::get('password/code-verify', 'codeVerify')->name('password.code.verify');
        Route::post('password/verify-code', 'verifyCode')->name('password.verify.code');
    });
    Route::controller('ResetPasswordController')->group(function () {
        Route::post('password/reset', 'reset')->name('password.update');
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    });

    Route::controller('SocialiteController')->prefix('social')->group(function () {
        Route::get('login/{provider}', 'socialLogin')->name('social.login');
        Route::get('login/callback/{provider}', 'callback')->name('social.login.callback');
    });
});

Route::middleware('auth')->name('user.')->group(function () {
    //authorization
    Route::namespace('User')->controller('AuthorizationController')->group(function () {
        Route::get('authorization', 'authorizeForm')->name('authorization');
        Route::get('resend/verify/{type}', 'sendVerifyCode')->name('send.verify.code');
        Route::post('verify/email', 'emailVerification')->name('verify.email');
        Route::post('verify/mobile', 'mobileVerification')->name('verify.mobile');
        Route::post('verify/g2fa', 'g2faVerification')->name('go2fa.verify');
    });

    Route::middleware(['check.status'])->group(function () {

        Route::get('user/data', 'User\UserController@userData')->name('data');
        Route::post('user/data/submit', 'User\UserController@userDataSubmit')->name('data.submit');

        Route::middleware('registration.complete')->namespace('User')->group(function () {

            Route::controller('UserController')->group(function () {
                Route::get('dashboard', 'home')->name('home');
                Route::get('viewcategory/{id}', 'viewcategory')->name('viewcategory');

                //2FA
                Route::get('twofactor', 'show2faForm')->name('twofactor');
                Route::post('twofactor/enable', 'create2fa')->name('twofactor.enable');
                Route::post('twofactor/disable', 'disable2fa')->name('twofactor.disable');

                //Report
                Route::any('deposit/history', 'depositHistory')->name('deposit.history');
                Route::get('transactions', 'transactions')->name('transactions');

                Route::get('attachment-download/{fil_hash}', 'attachmentDownload')->name('attachment.download');

                // get orders
                Route::get('orders', 'getOrders')->name('orders');
                Route::get('approved/orders', 'approvedOrders')->name('approved.orders');
                Route::get('pending/orders', 'pendingOrders')->name('pending.orders');

                // fetch subscriptions
                Route::get('all/subscription-plan', 'fetchSubscription')->name('fetch.subscription');

                //career library category
                Route::get('/career_library/stream', 'stream')->name('stream');
                Route::get('/career_library/category/{id}', 'category')->name('category');
                Route::get('/career_library/2nd_category/{id}', 'category2')->name('2ndcategory');
                Route::get('/subcategory/{id}', 'subcategory')->name('subcategory');
                Route::get('/view_subcategory/{id}',[UserController::class, 'viewSubcategory'])->name('viewSubcategory');
                



                Route::post('get_institution', 'viewInstitution')->name('viewInstitution');

                Route::post('get_state', 'viewState')->name('viewState');

                Route::post('institute_type', 'viewType')->name('viewType');
                // file download
                Route::get('service/order/{id}', 'serviceFileDownload')->name('service.file.download');
            });
            //master class
            Route::controller('MasterclassController')->name('masterclass.')->prefix('masterclass')->group(function () {
                Route::get('/categories', 'list')->name('categories');
                Route::get('/subcategories/{id}', 'subcategories')->name('subcategories');
                Route::get('/videos/{id}', 'videos')->name('videos');
                Route::get('/check-upgrade-status', 'check-upgrade-status')->name('check-upgrade-status');
            });

            //Entrance Exam Controller
            Route::controller('EntranceExamController')->name('entrance.')->prefix('entrance')->group(function () {
                Route::get('/all', 'all')->name('all');
                Route::post('/get_entranceexam', 'get_entranceexam')->name('get_entranceexam');
                Route::post('/get_entranceexam_by_category', 'get_entranceexam_by_category')->name('get_entranceexam_by_category');
                Route::post('/get_entranceexam_by_subcategory', 'get_entranceexam_by_subcategory')->name('get_entranceexam_by_subcategory');
            });

            //Institute Controller
            Route::controller('InstituteController')->name('institute.')->prefix('institute')->group(function () {
                Route::get('/view', 'index')->name('view');
                Route::post('/country', 'country')->name('country');
                Route::post('/state', 'state')->name('state');
                Route::post('/inst_type', 'inst_type')->name('inst_type');
            });
            //Scholarship Controller
            Route::controller('ScholarshipControler')->name('scholarship.')->prefix('scholarship')->group(function () {
                Route::get('/view', 'index')->name('view');
                Route::post('/get_type', 'getType')->name('getType');
                Route::post('/get_class', 'getClass')->name('getClass');
            });
            //Upgrade
            Route::controller('UpgradePlanController')->name('upgradeplan')->group(function () {
                Route::get('/upgrade', 'upgrade')->name('upgrade');
                Route::get('/thankyou', 'thankyou')->name('thankyou');
            });

            //Quiz Controller
            // Route::controller('QuizController')->name('quiz.')->prefix('quiz')->group(function () {
            //     Route::get('/view_quiztype', 'index_quiztype')->name('view_quiztype');
            //     Route::get('/view', 'index')->name('view');
            //     Route::get('/join/{quiz_id}', 'joinQuiz')->name('join');
            //     Route::post('/store-answer', 'store')->name('store.answer');
            // });

            //Quiz
            Route::get('/quiz-list', [QuizController::class, 'index'])->name('list.quiz');
            Route::get('/give-quiz/{id}', [QuizController::class, 'joinQuiz'])->name('join.quiz');
            Route::post('/store-answer', [AnswerController::class, 'store'])->name('store.answer');
            Route::get('/results', [ResultController::class, 'index'])->name('results');
            Route::get('/mock-results', [ResultController::class, 'mockResults'])->name('mock-results');

            Route::post('/get_question', [QuizController::class, 'getQuestion'])->name('getQuestion');

            //Mysession Controller
            Route::controller('MysessionController')->name('mysession.')->prefix('mysession')->group(function () {
                Route::get('/team', 'index')->name('view');
                Route::post('/get_team_by_category', 'get_team_by_category')->name('get_team_by_category');
                Route::post('/get_team_by_subcategory', 'get_team_by_subcategory')->name('get_team_by_subcategory');
                Route::post('/get_team', 'get_team')->name('get_team');
                Route::get('/view_team/{id}', 'viewTeam')->name('viewTeam');
                Route::post('/insert_booking', 'storeBooking')->name('storeBooking');
                Route::get('/team_pay/{id}', 'team_pay')->name('team_pay');
                Route::get('/thankyou/{id}', 'thankyou')->name('thankyou');
            });

            //Profile setting
            Route::controller('ProfileController')->group(function () {
                Route::get('profile/setting', 'profile')->name('profile.setting');
                Route::post('profile/setting', 'submitProfile');
                Route::get('change-password', 'changePassword')->name('change.password');
                Route::post('change-password', 'submitPassword');

                Route::post('profile', 'imageUpdate')->name('profile.update');
            });
        });

        // Payment
        Route::middleware('registration.complete')->controller('Gateway\PaymentController')->group(function () {
            Route::get('payment/{id}', 'payment')->name('payment');
            Route::any('/service/payment/{id}', 'servicePayment')->name('service.payment');
            Route::any('/service/payment', 'servicePlace')->name('service.place');
            Route::any('/deposit', 'deposit')->name('deposit');
            Route::post('deposit/insert', 'depositInsert')->name('deposit.insert');
            Route::get('deposit/confirm', 'depositConfirm')->name('deposit.confirm');
            Route::get('deposit/manual', 'manualDepositConfirm')->name('deposit.manual.confirm');
            Route::post('deposit/manual', 'manualDepositUpdate')->name('deposit.manual.update');
        });

        //Razorpay
        Route::post('payment', [RazorpayController::class, 'store'])->name('razorpay.store');
        Route::post('/subscriberdata/upgrade', [RazorpayController::class, 'upgrade'])->name('razorpay.upgrade');
        // Route::get('razorpay/index', [RazorpayController::class, 'index'])->name('razorpay.index');



    });
});
