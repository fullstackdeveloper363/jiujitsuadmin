<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Login Sign Up
Route::post('/sign-up',[\App\Http\Controllers\api\ApiController::class , 'signUp']);
Route::post('/login',[\App\Http\Controllers\api\ApiController::class , 'login']);

// Check Email
Route::post('/check-email',[\App\Http\Controllers\api\ApiController::class , 'check_email']);

// Verify Otp
Route::post('/verify-otp',[\App\Http\Controllers\api\ApiController::class , 'verify_otp']);

// Update Password
Route::post('/update-password',[\App\Http\Controllers\api\ApiController::class , 'update_password']);

// Get Main Assessments
Route::get('/get-main-assessments/{user_id?}',[\App\Http\Controllers\api\ApiController::class , 'get_main_assessment']);

// Get Sub Assessments
Route::get('/get-sub-assessment/{main_assessment_id}/{user_id?}',[\App\Http\Controllers\api\ApiController::class , 'get_sub_assessments']);

// Get Assessment Level 2
Route::get('/get_child_assessments/{sub_assessment_id}/{user_id?}',[\App\Http\Controllers\api\ApiController::class , 'get_child_assessments']);

// Get Assessment Level 2 Detail
Route::get('/get-assessment_level2-detail/{child_assessment_id}/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_assessment_level2_detail']);

// Apply Filter
Route::post('/apply-filters',[\App\Http\Controllers\api\ApiController::class , 'apply_filter']);

// Get CMS Data
Route::get('/get-cms-data',[\App\Http\Controllers\api\ApiController::class , 'get_cms_data']);

//Edit User Profile
Route::post('/edit-profile',[\App\Http\Controllers\api\ApiController::class , 'edit_profile']);

// Update User Password
Route::post('/update-user-password',[\App\Http\Controllers\api\ApiController::class , 'update_user_password']);

// Delete Account
Route::get('/delete-user-account/{id}',[\App\Http\Controllers\api\ApiController::class , 'delete_account']);

// Add to Bookmark
Route::post('/add-to-bookmark',[\App\Http\Controllers\api\ApiController::class , 'add_to_bookmark']);

// Get Bookmark
Route::get('/get-bookmarks/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_bookmarks']);

//Get User by ID
Route::get('/get-user/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_user_by_id']);

//Add Training
Route::post('/add-training',[\App\Http\Controllers\api\ApiController::class , 'add_trainings']);

// Get Training Data
Route::get('/get-trainings/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_logbook_training']);

// Add Competition
Route::post('/add-competition',[\App\Http\Controllers\api\ApiController::class , 'add_competition']);

// Get Competitions
Route::get('/get-competitions/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_competitions']);

// Add Promotion
Route::post('/add-promotion',[\App\Http\Controllers\api\ApiController::class , 'add_promotion']);

// Get Promotion
Route::get('/get-promotions/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'get_promotions']);

// Add View on Video
Route::get('/add-view/{id}/{user_id}',[\App\Http\Controllers\api\ApiController::class , 'add_video_view']);

// Update FCM
Route::post('/update-fcm-token',[\App\Http\Controllers\api\ApiController::class , 'update_fcm_token']);

// Update Training
Route::post('/update-training',[\App\Http\Controllers\api\ApiController::class , 'edit_trainings']);

// Delete Training
Route::post('/delete-training',[\App\Http\Controllers\api\ApiController::class , 'delete_training']);

// Update Competition
Route::post('/update-competition',[\App\Http\Controllers\api\ApiController::class , 'edit_competition']);

// Delete Competition
Route::post('/delete-competition',[\App\Http\Controllers\api\ApiController::class , 'delete_competition']);

// Update Promotion
Route::post('/update-promotion',[\App\Http\Controllers\api\ApiController::class , 'edit_promotion']);

// Delete Promotion
Route::post('/delete-promotion',[\App\Http\Controllers\api\ApiController::class , 'delete_promotion']);

// MarK Assessment
Route::post('/mark-assessment',[\App\Http\Controllers\api\ApiController::class , 'mark_assessment']);

// Get Badges
Route::get('/get-belt-ranks',[\App\Http\Controllers\api\ApiController::class , 'get_belt_ranks']);
