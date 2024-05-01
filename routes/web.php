<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.pages.login');
})->name('admin_login');

Route::post('/login-process',[\App\Http\Controllers\admin\AuthController::class , 'login_request'])->name('login_request');
Route::post('/logout-request',[\App\Http\Controllers\admin\AuthController::class , 'logout'])->name('logout_request');



Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {

        Route::get('/', [\App\Http\Controllers\admin\IndexController::class , 'index'])->name('index');

        // Users
        Route::get('/users', [\App\Http\Controllers\admin\UserController::class, 'index'])->name('users');
        Route::post('/add-user', [\App\Http\Controllers\admin\UserController::class, 'add_user'])->name('add_user_request');
        Route::post('/edit-user', [\App\Http\Controllers\admin\UserController::class, 'edit_user'])->name('edit_user_request');
        Route::post('/delete-user', [\App\Http\Controllers\admin\UserController::class, 'delete_user'])->name('delete_user_request');
        Route::post('/update-user-status', [\App\Http\Controllers\admin\UserController::class, 'update_status'])->name('update_user_status');
        Route::post('/get-user-detail', [\App\Http\Controllers\admin\UserController::class, 'get_user_detail'])->name('get_user_detail');
        Route::get('/user-details/{id}', [\App\Http\Controllers\admin\UserController::class, 'user_details'])->name('view-user-details');


        // Privacy Policy
        Route::get('/privacy-policy',[\App\Http\Controllers\admin\CmsController::class , 'privacy_policy'])->name('privacy_policy');
        Route::post('/add-privacy-policy',[\App\Http\Controllers\admin\CmsController::class , 'add_privacy_policy'])->name('add_privacy_policy_request');
        Route::post('/edit-privacy-policy',[\App\Http\Controllers\admin\CmsController::class , 'edit_privacy_policy'])->name('edit_privacy_policy_request');
        Route::post('/delete-privacy-policy',[\App\Http\Controllers\admin\CmsController::class , 'delete_privacy_policy'])->name('delete_privacy_policy_request');
        Route::post('/update-privacy-policy-status',[\App\Http\Controllers\admin\CmsController::class , 'update_privacy_policy_status'])->name('update_privacy_policy_status');

        // Term & Condition
        Route::get('/terms-and-condition',[\App\Http\Controllers\admin\CmsController::class , 'term_and_condition'])->name('term_and_condition');
        Route::post('/add-term-condition',[\App\Http\Controllers\admin\CmsController::class , 'add_term_condition'])->name('add_term_condition_request');
        Route::post('/edit-term-condition',[\App\Http\Controllers\admin\CmsController::class , 'edit_term_condition'])->name('edit_term_condition_request');
        Route::post('/delete-term-condition',[\App\Http\Controllers\admin\CmsController::class , 'delete_term_condition'])->name('delete_term_condition_request');
        Route::post('/update-term-condition-status',[\App\Http\Controllers\admin\CmsController::class , 'update_term_condition_status'])->name('update_term_condition_status');

        // About Us
        Route::get('/about-us',[\App\Http\Controllers\admin\CmsController::class , 'about_us'])->name('about_us');
        Route::post('/add-about-us',[\App\Http\Controllers\admin\CmsController::class , 'add_about_us'])->name('add_about_us_request');
        Route::post('/edit-about-us',[\App\Http\Controllers\admin\CmsController::class , 'edit_about_us'])->name('edit_about_us_request');
        Route::post('/delete-about-us',[\App\Http\Controllers\admin\CmsController::class , 'delete_about_us'])->name('delete_about_us_request');
        Route::post('/update-about-us-status',[\App\Http\Controllers\admin\CmsController::class , 'update_about_us_status'])->name('update_about_us_status');
        Route::post('/get-about-us-detail',[\App\Http\Controllers\admin\CmsController::class , 'get_about_us_detail'])->name('get_about_us_detail');

        //Social Media
        Route::get('/social-media',[\App\Http\Controllers\admin\SocialMediaController::class , 'index'])->name('social_media');
        Route::post('/add-social-media',[\App\Http\Controllers\admin\SocialMediaController::class , 'add'])->name('add_social_media');
        Route::post('/edit-social-media',[\App\Http\Controllers\admin\SocialMediaController::class , 'edit'])->name('edit_social_media_request');
        Route::post('/delete',[\App\Http\Controllers\admin\SocialMediaController::class , 'delete'])->name('delete_social_media_request');


        // Main Assessment
        Route::get('/main-assessment',[\App\Http\Controllers\admin\AssessmentController::class , 'main_assessment'])->name('main_assessment');
        Route::post('/add-main-assessment-request',[\App\Http\Controllers\admin\AssessmentController::class , 'add_main_assessment'])->name('add_main_assessment_request');
        Route::post('/update-main-assessment-request',[\App\Http\Controllers\admin\AssessmentController::class , 'update_main_assessment'])->name('edit_main_assessment_request');
        Route::post('/delete-main-assessment-request',[\App\Http\Controllers\admin\AssessmentController::class , 'delete_main_assessment'])->name('delete_main_assessment_request');
        Route::post('/update-main-assessment-status',[\App\Http\Controllers\admin\AssessmentController::class , 'update_main_assessment_status'])->name('update_main_assessment_status');
        Route::post('/get-main-assessment',[\App\Http\Controllers\admin\AssessmentController::class , 'get_assessment'])->name('get.assessment');

        // Sub Assessment
        Route::get('/sub-assessments',[\App\Http\Controllers\admin\SubAssessmentController::class , 'sub_assessments'])->name('sub_assessments');
        Route::post('/add-sub-assessment',[\App\Http\Controllers\admin\SubAssessmentController::class , 'add_sub_assessment'])->name('add_sub_assessment_request');
        Route::post('/delete-sub-assessment',[\App\Http\Controllers\admin\SubAssessmentController::class , 'delete_sub_assessment'])->name('delete_sub_assessment_request');
        Route::post('/update-sub-assessment-status',[\App\Http\Controllers\admin\SubAssessmentController::class , 'update_sub_assessment_status'])->name('update_sub_assessment_status_request');
        Route::post('/delete-sub-category-video',[\App\Http\Controllers\admin\SubAssessmentController::class , 'delete_sub_category_video'])->name('delete_sub_category_video_request');
        Route::post('/update-sub-assessment',[\App\Http\Controllers\admin\SubAssessmentController::class , 'edit_sub_assessment'])->name('edit_sub_assessment_request');
        Route::post('/get-sub-assessment',[\App\Http\Controllers\admin\SubAssessmentController::class , 'get_sub_assessment'])->name('get.sub-assessment');

        // Sub Assessment Level 2
        Route::get('/child-assessments',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'index'])->name('child_assessments');
        Route::post('/add-child-assessment',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'add'])->name('add_child_assessment_request');
        Route::post('/update-child-assessment-status',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'update_child_assessment_status'])->name('update_child_assessment_status_request');
        Route::post('/delete-child-assessment',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'delete_child_assessment'])->name('delete_child_assessment_request');
        Route::post('/update-child-assessment',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'edit_child_assessment'])->name('edit_child_assessment_request');
        Route::post('/get-assessment-level-2',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'get_assessment_level_2'])->name('get.assessment_level_2');
        Route::post('/fetch-child-assessment-data',[\App\Http\Controllers\admin\ChildAssessmentController::class , 'fetch_child_data'])->name('fetch_child_assessment_data');

        //Belt Rank
        Route::get('/belt-ranks',[\App\Http\Controllers\admin\BeltRankController::class , 'index'])->name('belt_ranks');
        Route::post('/add-belt-ranks',[\App\Http\Controllers\admin\BeltRankController::class , 'add'])->name('add_belt_rank_request');
        Route::post('/edit-belt-ranks',[\App\Http\Controllers\admin\BeltRankController::class , 'edit'])->name('edit_belt_rank_request');
        Route::post('/delete-belt-ranks',[\App\Http\Controllers\admin\BeltRankController::class , 'delete'])->name('delete_belt_rank_request');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
