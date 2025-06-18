<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Category2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\IButtonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CareerImageController;

Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('/', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
    });

    // Admin Password Reset
    Route::controller('ForgotPasswordController')->group(function () {
        Route::get('password/reset', 'showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'sendResetCodeEmail');
        Route::get('password/code-verify', 'codeVerify')->name('password.code.verify');
        Route::post('password/verify-code', 'verifyCode')->name('password.verify.code');
    });

    Route::controller('ResetPasswordController')->group(function () {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'reset')->name('password.change');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile', 'profileUpdate')->name('profile.update');
        Route::post('password', 'passwordUpdate')->name('password.update');

        //Notification
        Route::get('notifications', 'notifications')->name('notifications');
        Route::get('notification/read/{id}', 'notificationRead')->name('notification.read');
        Route::get('notifications/read-all', 'readAll')->name('notifications.readAll');

        //Report Bugs
        Route::get('request/report', 'requestReport')->name('request.report');
        Route::post('request/report', 'reportSubmit');

        Route::get('download/attachments/{file_hash}', 'downloadAttachment')->name('download.attachment');
    });

    // Users Manager
    Route::controller('ManageUsersController')->name('users.')->prefix('manage/users')->group(function () {
        Route::get('/', 'allUsers')->name('all');
        Route::get('active', 'activeUsers')->name('active');
        Route::get('banned', 'bannedUsers')->name('banned');
        Route::get('email/verified', 'emailVerifiedUsers')->name('email.verified');
        Route::get('email/unverified', 'emailUnverifiedUsers')->name('email.unverified');
        Route::get('mobile/unverified', 'mobileUnverifiedUsers')->name('mobile.unverified');
        Route::get('mobile/verified', 'mobileVerifiedUsers')->name('mobile.verified');
        Route::get('mobile/verified', 'mobileVerifiedUsers')->name('mobile.verified');
        Route::get('with/balance', 'usersWithBalance')->name('with.balance');

        Route::get('detail/{id}', 'detail')->name('detail');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('add/sub/balance/{id}', 'addSubBalance')->name('add.sub.balance');
        Route::get('send/notification/{id}', 'showNotificationSingleForm')->name('notification.single');
        Route::post('send/notification/{id}', 'sendNotificationSingle')->name('notification.single');
        Route::get('login/{id}', 'login')->name('login');
        Route::post('status/{id}', 'status')->name('status');

        Route::get('send/notification', 'showNotificationAllForm')->name('notification.all');
        Route::post('send/notification', 'sendNotificationAll')->name('notification.all.send');
        Route::get('notification/log/{id}', 'notificationLog')->name('notification.log');
    });

    //Modules
    Route::controller('ModuleController')->name('module.')->prefix('module')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Stream
    Route::controller('StreamController')->name('stream.')->prefix('stream')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Salary Range
    Route::controller('SalaryRangeController')->name('salaryrange.')->prefix('salaryrange')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Job Scope
    Route::controller('JobScopeController')->name('jobscope.')->prefix('jobscope')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });
    //Category
    Route::controller('CategoryController')->name('category.')->prefix('category')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });
    //Category
    Route::controller('Category2Controller')->name('category2.')->prefix('category2')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Subcategory
    Route::controller('SubcategoryController')->name('subcategory.')->prefix('subcategory')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
        Route::post('/get_subcategory', 'getSubcategory')->name('getSubcategory');
    });

    //Path Type
    Route::controller('PathtypeController')->name('pathtype.')->prefix('pathtype')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Career Path
    Route::controller('PathController')->name('path.')->prefix('path')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Entrance Exam
    Route::controller('EntranceController')->name('entrance.')->prefix('entrance')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Institution
    Route::controller('InstitutionController')->name('institution.')->prefix('institution')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('add', 'add')->name('add');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //MasterClass
    Route::controller('MasterClassController')->name('Masterclass.')->prefix('Masterclass')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    //Scholarship
    Route::controller('ScholarshipController')->name('scholarship.')->prefix('scholarship')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });
    //Teams
    Route::controller('TeamController')->name('team.')->prefix('team')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');

        //Bookings

        Route::get('/bookings', 'bookings')->name('bookings');
        Route::get('/editbookings{id}', 'editbooking')->name('editbooking');
        Route::post('/updatebookings', 'updatebookings')->name('updatebookings');
        Route::post('/updatetime', 'updatetime')->name('updatetime');
        Route::post('/member_approve', 'member_approve')->name('member_approve');
    });

    //Brand Logo
    Route::controller('BrandController')->name('brand.')->prefix('brand')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'Store')->name('Store');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    //I Button Controller
    Route::controller('IButtonController')->name('ibutton.')->prefix('ibutton')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::post('/delete', 'delete')->name('delete');
    });

    //Banner Slider Controller
    Route::controller('BannersliderController')->name('bannerslider.')->prefix('bannerslider')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    //CareerPlan Controller
    Route::controller('CareerplanController')->name('careerplan.')->prefix('careerplan')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });

    //UpgradePlan Controller
    Route::controller('UpgradePlanController')->name('upgradeplan.')->prefix('upgradeplan')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/add', 'Add')->name('add');
        Route::post('/store', 'Store')->name('Store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/delete', 'delete')->name('delete');
    });


    //Countries
    Route::controller('CountryController')->name('countries.')->prefix('countries')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //States
    Route::controller('StateController')->name('states.')->prefix('states')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    //Districts
    Route::controller('DistrictController')->name('districts.')->prefix('districts')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    // plan
    Route::controller('PlanController')->name('plan.')->prefix('plan')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');

        Route::get('subscriptions', 'subscriptions')->name('subscription');
    });


    // service
    Route::controller('ServiceController')->name('service.')->prefix('service')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('store', 'store')->name('store');
        Route::post('update', 'update')->name('update');
        Route::get('delete', 'delete')->name('delete');

        Route::get('approved/orders', 'getApprovedorders')->name('approved.orders');
        Route::get('pending/orders', 'getPendingdorders')->name('pending.orders');
    });


    // portfolio
    Route::controller('PortfolioController')->name('portfolio.')->prefix('portfolio')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('store', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::post('delete', 'delete')->name('delete');
    });

    // Subscriber
    Route::controller('SubscriberController')->group(function () {
        Route::get('subscriber', 'index')->name('subscriber.index');
        Route::get('subscriber/send/email', 'sendEmailForm')->name('subscriber.send.email');
        Route::post('subscriber/remove/{id}', 'remove')->name('subscriber.remove');
        Route::post('subscriber/send/email', 'sendEmail')->name('subscriber.send.email');
    });


    // Deposit Gateway
    Route::name('gateway.')->prefix('payment/gateways')->group(function () {

        // Automatic Gateway
        Route::controller('AutomaticGatewayController')->group(function () {
            Route::get('automatic', 'index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'update')->name('automatic.update');
            Route::post('automatic/remove/{id}', 'remove')->name('automatic.remove');
            Route::post('automatic/activate/{code}', 'activate')->name('automatic.activate');
            Route::post('automatic/deactivate/{code}', 'deactivate')->name('automatic.deactivate');
        });


        // Manual Methods
        Route::controller('ManualGatewayController')->group(function () {
            Route::get('manual', 'index')->name('manual.index');
            Route::get('manual/new', 'create')->name('manual.create');
            Route::post('manual/new', 'store')->name('manual.store');
            Route::get('manual/edit/{alias}', 'edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'update')->name('manual.update');
            Route::post('manual/activate/{code}', 'activate')->name('manual.activate');
            Route::post('manual/deactivate/{code}', 'deactivate')->name('manual.deactivate');
        });
    });


    // DEPOSIT SYSTEM
    Route::name('deposit.')->controller('DepositController')->prefix('manage/deposits')->group(function () {
        Route::get('/', 'deposit')->name('list');
        Route::get('pending', 'pending')->name('pending');
        Route::get('rejected', 'rejected')->name('rejected');
        Route::get('approved', 'approved')->name('approved');
        Route::get('successful', 'successful')->name('successful');
        Route::get('initiated', 'initiated')->name('initiated');
        Route::get('details/{id}', 'details')->name('details');

        Route::post('reject', 'reject')->name('reject');
        Route::post('approve/{id}', 'approve')->name('approve');
    });



    // Report
    Route::controller('ReportController')->group(function () {
        Route::get('report/transaction', 'transaction')->name('report.transaction');
        Route::get('report/login/history', 'loginHistory')->name('report.login.history');
        Route::get('report/login/ipHistory/{ip}', 'loginIpHistory')->name('report.login.ipHistory');
        Route::get('report/notification/history', 'notificationHistory')->name('report.notification.history');
        Route::get('report/email/detail/{id}', 'emailDetails')->name('report.email.details');
    });


    // Admin Support
    Route::controller('SupportTicketController')->prefix('support')->group(function () {
        Route::get('tickets', 'tickets')->name('ticket');
        Route::get('tickets/pending', 'pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'replyTicket')->name('ticket.reply');
        Route::post('ticket/close/{id}', 'closeTicket')->name('ticket.close');
        Route::get('ticket/download/{ticket}', 'ticketDownload')->name('ticket.download');
        Route::post('ticket/delete/{id}', 'ticketDelete')->name('ticket.delete');
    });


    // Language Manager
    Route::controller('LanguageController')->prefix('manage')->group(function () {
        Route::get('languages', 'langManage')->name('language.manage');
        Route::post('language', 'langStore')->name('language.manage.store');
        Route::post('language/delete/{id}', 'langDelete')->name('language.manage.delete');
        Route::post('language/update/{id}', 'langUpdate')->name('language.manage.update');
        Route::get('language/edit/{id}', 'langEdit')->name('language.key');
        Route::post('language/import', 'langImport')->name('language.import.lang');
        Route::post('language/store/key/{id}', 'storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'updateLanguageJson')->name('language.update.key');
    });

    Route::controller('GeneralSettingController')->group(function () {
        // General Setting
        Route::get('global/settings', 'index')->name('setting.index');
        Route::post('global/settings', 'update')->name('setting.update');

        //configuration
        Route::post('setting/system-configuration', 'systemConfigurationSubmit');

        // Logo-Icon
        Route::get('setting/logo', 'logoIcon')->name('setting.logo.icon');
        Route::post('setting/logo', 'logoIconUpdate')->name('setting.logo.icon');

        //Cookie
        Route::get('cookie', 'cookie')->name('setting.cookie');
        Route::post('cookie', 'cookieSubmit');

        //socialite credentials
        Route::get('setting/social/credentials', 'socialiteCredentials')->name('setting.socialite.credentials');
        Route::post('setting/social/credentials/update/{key}', 'updateSocialiteCredential')->name('setting.socialite.credentials.update');
        Route::post('setting/social/credentials/status/{key}', 'updateSocialiteCredentialStatus')->name('setting.socialite.credentials.status.update');
    });

    //Notification Setting
    Route::name('setting.notification.')->controller('NotificationController')->prefix('notifications')->group(function () {
        //Template Setting
        Route::get('global', 'global')->name('global');
        Route::post('global/update', 'globalUpdate')->name('global.update');
        Route::get('templates', 'templates')->name('templates');
        Route::get('template/edit/{id}', 'templateEdit')->name('template.edit');
        Route::post('template/update/{id}', 'templateUpdate')->name('template.update');

        //Email Setting
        Route::get('email/setting', 'emailSetting')->name('email');
        Route::post('email/setting', 'emailSettingUpdate');
        Route::post('email/test', 'emailTest')->name('email.test');

        //SMS Setting
        Route::get('sms/setting', 'smsSetting')->name('sms');
        Route::post('sms/setting', 'smsSettingUpdate');
        Route::post('sms/test', 'smsTest')->name('sms.test');
    });

    // Plugin
    Route::controller('ExtensionController')->group(function () {
        Route::get('extensions', 'index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'update')->name('extensions.update');
        Route::post('extensions/status/{id}', 'status')->name('extensions.status');
    });

    // SEO
    Route::get('seo', 'FrontendController@seoEdit')->name('seo');


    // Frontend
    Route::name('frontend.')->prefix('frontend')->group(function () {

        Route::controller('FrontendController')->group(function () {
            Route::get('themes', 'templates')->name('templates');
            Route::post('themes', 'templatesActive')->name('templates.active');
            Route::get('frontend-sections/{key}', 'frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'frontendElement')->name('sections.element');
            Route::post('remove/{id}', 'remove')->name('remove');
        });

        Route::controller('TestimonialController')->group(function () {
            Route::get('testimonial', 'TestimonialList')->name('TestimonialList');
            Route::get('testimonial/add', 'TestimonialAdd')->name('TestimonialAdd');
            Route::post('testimonial/store', 'TestimonialStore')->name('TestimonialStore');
            Route::get('testimonial/edit/{id}', 'TestimonialEdit')->name('TestimonialEdit');
            Route::post('testimonial/update/{id}', 'TestimonialUpdate')->name('TestimonialUpdate');
            Route::get('testimonial/delete/{id}', 'TestimonialDelete')->name('TestimonialDelete');
        });
        Route::controller('CareerImageController')->group(function () {
            Route::get('careerimage', 'careerImageList')->name('CareerImageList');
            Route::get('careerimage/add', 'careerImageAdd')->name('CareerImageAdd');
            Route::post('careerimage/store', 'careerImageStore')->name('CareerImageStore');
            Route::get('careerimage/edit/{id}', 'careerImageEdit')->name('CareerImageEdit');
            Route::post('careerimage/update/{id}', 'careerImageUpdate')->name('CareerImageUpdate');
            Route::get('careerimage/delete/{id}', 'careerImageDelete')->name('CareerImageDelete');
        });
       

        // Page Builder
        Route::controller('PageBuilderController')->prefix('manage')->group(function () {
            Route::get('pages', 'managePages')->name('manage.pages');
            Route::post('pages', 'managePagesSave')->name('manage.pages.save');
            Route::post('pages/update', 'managePagesUpdate')->name('manage.pages.update');
            Route::post('pages/delete/{id}', 'managePagesDelete')->name('manage.pages.delete');
            Route::get('section/{id}', 'manageSection')->name('manage.section');
            Route::post('section/{id}', 'manageSectionUpdate')->name('manage.section.update');
        });
    });

    //Quiz
    Route::get('/add-quiz', [QuizController::class, 'addQuiz'])->name('add.quiz');

    Route::get('/add-question/{id}', [QuestionController::class, 'addQuestion'])->name('add.question');

    Route::post('/store-quiz', [QuizController::class, 'storeQuiz'])->name('store.quiz');
    Route::get('/edit-quiz/{id}', [QuizController::class, 'editQuiz'])->name('edit.quiz');
    Route::post('/update-quiz', [QuizController::class, 'updateQuiz'])->name('update.quiz');
    Route::get('/delete-quiz/{id}', [QuizController::class, 'deleteQuiz'])->name('delete.quiz');

    Route::post('/store-question', [QuestionController::class, 'storeQuestion'])->name('store.question');
    Route::get('/edit-question/{id}', [QuestionController::class, 'editQuestion'])->name('edit.question');
    Route::post('/update-question', [QuestionController::class, 'updateQuestion'])->name('update.question');
    Route::get('/delete-question/{id}', [QuestionController::class, 'deleteQuestion'])->name('delete.question');
    //  Route::get('/results', [ResultController::class, 'index'])->name('results');

    Route::controller('EventController')->group(function () {
        //event title
        Route::get('event_title', 'event_title')->name('event_title.list');
        Route::get('event_title/add', 'addEvent_title')->name('event_title.add');
        Route::post('event_title/store', 'storeEvent_title')->name('event_title.store');
        Route::get('event_title/edit/{id}', 'editEvent_title')->name('event_title.edit');
        Route::post('event_title/update', 'updateEvent_title')->name('event_title.update');
        Route::post('event_title/delete', 'deleteEvent_title')->name('event_title.delete');

        //events
        Route::get('events', 'list')->name('event.list');
        Route::get('events/add', 'add')->name('event.add');
        Route::post('events/store', 'store')->name('event.store');
        Route::get('events/edit/{id}', 'edit')->name('event.edit');
        Route::post('events/update', 'update')->name('event.update');
        Route::post('events/delete', 'delete')->name('event.delete');
    });

    //clientele
    Route::controller('ClienteleController')->group(function () {
        Route::get('/clientele', 'index')->name('clientele.index');
        Route::get('/clientele/add', 'add')->name('clientele.add');
        Route::post('/clientele/store', 'store')->name('clientele.store');
        Route::get('/clientele/edit/{id}', 'edit')->name('clientele.edit');
        Route::post('/clientele/update', 'update')->name('clientele.update');
        Route::post('/clientele/delete', 'delete')->name('clientele.delete');
    });
});

Route::post('/get_state', [StateController::class, 'getState'])->name('getState');
Route::post('/get_district', [DistrictController::class, 'getDistrict'])->name('getDistrict');
Route::post('/ibutton/store', [IButtonController::class, 'store'])->name('ibutton.store');
Route::post('/fetch_category', [CategoryController::class, 'fetchCategory'])->name('fetchCategory');
Route::post('/fetch_2ndcategory', [CategoryController::class, 'fetch2ndCategory'])->name('fetch2ndCategory');
Route::post('/fetch_subcategory', [CategoryController::class, 'fetchSubcategory'])->name('fetchSubcategory');
// Route::post('/get_district','getDistrict')->name('getDistrict');
