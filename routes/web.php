<?php
/**
 *  routes/web.php
 *
 * Date-Time: 03.06.21
 * Time: 15:41
 * @author suspended values
 */

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\AboutUsController;
use App\Http\Controllers\Client\ServiceController;
use Illuminate\Support\Facades\Route;

Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');

Route::redirect('', config('translatable.fallback_locale'));
Route::prefix('{locale?}')
    ->middleware(['setlocale'])
    ->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('login', [LoginController::class, 'loginView'])->name('loginView');
            Route::post('login', [LoginController::class, 'login'])->name('login');


            Route::middleware('auth')->group(function () {
                Route::get('logout', [LoginController::class, 'logout'])->name('logout');

                Route::get('', function () {
                    if (auth()->user() && (auth()->user()->is_admin || auth()->user()->is_moderator)) {
                        return redirect(locale_route('user.index'));
                    } else {
                        return redirect()->route('client.home.index');
                    }
                });

                // Language
                Route::resource('language', LanguageController::class);
                Route::get('language/{language}/destroy', [LanguageController::class, 'destroy'])->name('language.destroy');

                // Translation
                Route::resource('translation', TranslationController::class);

//                // Category
//                Route::resource('category', CategoryController::class);
//                Route::get('category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
//
//                // Project
//                Route::resource('project', ProjectController::class);
//                Route::get('project/{project}/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');

//                // Blog
//                Route::resource('blog', BlogController::class);
//                Route::get('blog/{blog}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');

                // Blog
                Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
                Route::get('user/{user}/destroy', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');

                Route::resource('moderator', \App\Http\Controllers\Admin\ModeratorController::class);
                Route::get('moderator/{moderator}/destroy', [\App\Http\Controllers\Admin\ModeratorController::class, 'destroy'])->name('moderator.destroy');

                Route::get('change-password', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('change-password')->middleware('isAdmin');
                Route::post('store-password', [\App\Http\Controllers\Admin\UserController::class, 'storePassword'])->name('store-password')->middleware('isAdmin');
                //                // Team
//                Route::resource('team', TeamController::class);
//                Route::get('team/{team}/destroy', [TeamController::class, 'destroy'])->name('team.destroy');
//
//                // Company
//                Route::resource('company', CompanyController::class);
//                Route::get('company/{company}/destroy', [CompanyController::class, 'destroy'])->name('company.destroy');
//
//                // Slider
//                Route::resource('slider', SliderController::class);
//                Route::get('slider/{slider}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');

                // Page
                Route::resource('page', PageController::class);
                Route::get('page/{page}/destroy', [PageController::class, 'destroy'])->name('page.destroy');

                // Setting
//                Route::resource('setting', SettingController::class);
//                Route::get('setting/{setting}/destroy', [SettingController::class, 'destroy'])->name('setting.destroy');


            });
        });
        Route::middleware(['active'])->name("client.")->group(function () {

            // Home Page
            Route::get('', [HomeController::class, 'index'])->name('home.index');
            Route::get('/gallery', [\App\Http\Controllers\Client\GalleryController::class, 'index'])->name('gallery.index');
//            Route::get('/doctors', [HomeController::class, 'doctors'])->name('client.doctors.index');
//            Route::get('/choosefloor', [HomeController::class, 'choosefloor'])->name('client.choosefloor.index');
            Route::get('/apartment/{apartment?}', [\App\Http\Controllers\Client\ApartmentController::class, 'show'])->name('apartment.index');
            Route::get('/choose-floor', [\App\Http\Controllers\Client\ApartmentController::class, 'index'])->name('choosefloor.index');

            // Floor Plan
            Route::get('/choose-apartment/{floor?}', [\App\Http\Controllers\Client\ApartmentController::class, 'showFloor'])->name('showFloor.index');


            // Contact Page
            Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
            Route::post('/contact-us', [ContactController::class, 'mail'])->name('contact.mail');


            // About Page
            Route::get('about', [AboutUsController::class, 'index'])->name('about.index');


            // Service Page
            Route::get('/service', [ServiceController::class, "index"])->name('service.index');
            Route::get('/service/{service?}', [ServiceController::class, "show"])->name('service.show');
            Route::prefix("fraud")->name('fraud.')->group(function(){
                Route::get("/recovery", function (){
                    return \Inertia\Inertia::render("FinanceFraud/Recovery");
                })->name('recovery.index');
                Route::get("/detection", function (){
                    return \Inertia\Inertia::render("FinanceFraud/Detection");
                })->name('detection.index');
                Route::get("/expertise", function (){
                    return \Inertia\Inertia::render("FinanceFraud/Expertise");
                })->name('expertise.index');
            });
            Route::get("/blockchain", function (){
                return \Inertia\Inertia::render("FinanceFraud/Blockchain");
            })->name('blockchain.index');
            Route::get("/regulating-entities", function (){
                return \Inertia\Inertia::render("FinanceFraud/RegulatingEntities");
            })->name('entities.index');
            Route::get("/framework", function (){
                return \Inertia\Inertia::render("FinanceFraud/Framework");
            })->name('framework.index');
            Route::get("/organization", function (){
                return \Inertia\Inertia::render("Organization/Organization");
            })->name('organization.index');
            Route::get("/efforts", function (){
                return \Inertia\Inertia::render("Organization/Efforts");
            })->name('efforts.index');
            Route::get("/report-incident", function (){
                return \Inertia\Inertia::render("ReportIncident/ReportIncident");
            })->name('incident.index');
            Route::get("/sign-up", function (){
                return \Inertia\Inertia::render("Login/SignUp");
            })->name('signup.index');
            Route::middleware(['authFront'])->group(function () {

                Route::get('/dashboard', [\App\Http\Controllers\Client\UserController::class, 'index'])->name('account.index');
                Route::get('/settings', [\App\Http\Controllers\Client\UserController::class, 'settings'])->name('settings');

                Route::post('/change-account', [\App\Http\Controllers\Client\UserController::class, 'saveAccount'])->name('changeAccount');

                Route::get('/change-password', [\App\Http\Controllers\Client\UserController::class, 'changePasswordView'])->name('changePassword');
                Route::post('change-password', [\App\Http\Controllers\Client\UserController::class, 'changePassword'])->name('changePassword');
//                Route::post('upload-document', [\App\Http\Controllers\Client\UserController::class, 'uploadUserDoc'])->name('uploadDocument');
                Route::post('upload-document', [\App\Http\Controllers\Client\UserController::class, 'uploadDocuments'])->name('uploadDocument');
                Route::get('log-out', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

            });
            Route::get("/log-in", [\App\Http\Controllers\Auth\LoginController::class, 'loginView'])->name('login.index');
            Route::post('/log-in', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
            Route::post('/sign-up', [\App\Http\Controllers\Auth\LoginController::class, 'signup'])->name('signup');

//            Route::get("/account", function (){
//                return \Inertia\Inertia::render("Account/Account");
//            })->name('account.index');


        });
    });


