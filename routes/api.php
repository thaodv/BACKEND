<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SafetyMeasuresController;
use App\Http\Controllers\Api\ReminderCallController;
use App\Http\Controllers\Api\ActivitiesController;
use App\Http\Controllers\Api\ActivityListController;
use App\Http\Controllers\Api\BarController;
use App\Http\Controllers\Api\BarMenuController;
use App\Http\Controllers\Api\PointInterestController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomTypeController;
use App\Http\Controllers\Api\SwimmingPoolController;
use App\Http\Controllers\Api\SwimmingPoolListController;
use App\Models\PointInterestType;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * safety measures api
 */
Route::get('/measures', [SafetyMeasuresController::class, 'index']);
Route::post('/measures', [SafetyMeasuresController::class, 'store']);
Route::get('/measures/{_uid}', [SafetyMeasuresController::class, 'show']);
Route::patch('/measures/{_uid}', [SafetyMeasuresController::class, 'update']);
Route::delete('/measures/{_uid}', [SafetyMeasuresController::class, 'destroy']);

/**
 * reminder call api
 */
Route::get('/reception/reminder', [ReminderCallController::class, 'index']);
Route::post('/reception/reminder', [ReminderCallController::class, 'store']);
Route::get('/reception/reminder/{id}', [ReminderCallController::class, 'show']);
Route::patch('/reception/reminder/{id}', [ReminderCallController::class, 'update']);
Route::delete('/reception/reminder/{id}', [ReminderCallController::class, 'destroy']);

/**
 * types of activites and excursion call api
 */
Route::get('/excursion/activities', [ActivitiesController::class, 'index']);
Route::post('/excursion/activities', [ActivitiesController::class, 'store']);
Route::get('/excursion/activities/{id}', [ActivitiesController::class, 'show']);
Route::patch('/excursion/activities/{id}', [ActivitiesController::class, 'update']);
Route::delete('/excursion/activities/{id}', [ActivitiesController::class, 'destroy']);

/**
 * name of activities in each excursion call api
 */
Route::get('/excursion/activity', [ActivityListController::class, 'index']);
Route::post('/excursion/activity', [ActivityListController::class, 'store']);
Route::get('/excursion/activity/{id}', [ActivityListController::class, 'show']);
Route::patch('/excursion/activity/{id}', [ActivityListController::class, 'update']);
Route::delete('/excursion/activity/{id}', [ActivityListController::class, 'destroy']);
Route::get('/excursion/{id}/specific', [ActivityListController::class, 'indexFilteredList']);
Route::get('/excursion', [ActivitiesController::class, 'indexWithRelations']);

/**
 * swimming pool
 */
Route::get('/swimming-pool', [SwimmingPoolController::class, 'index']);
route::post('/swimming-pool', [SwimmingPoolController::class, 'store']);
Route::get('/swimming-pool/{id}', [SwimmingPoolController::class, 'show']);
Route::patch('/swimming-pool/{id}', [SwimmingPoolController::class, 'update']);
Route::delete('/swimming-pool/{id}', [SwimmingPoolController::class, 'destroy']);
Route::get('/pools', [SwimmingPoolListController::class, 'index']);
Route::post('/swimming-pool/pools', [SwimmingPoolListController::class, 'store']);
Route::get(('/swimming-pool/pools/type={id}'), [SwimmingPoolListController::class, 'searchByPoolType']);
Route::get('/swimming-pool/pools/{id}', [SwimmingPoolListController::class, 'show']);
Route::patch('/swimming-pool/pools/{id}', [SwimmingPoolListController::class, 'update']);
Route::delete('/swimming-pool/pools/{id}', [SwimmingPoolListController::class, 'destroy']);

/**
 * restaurant
 */
Route::get('/restaurant&status={bool}', [RestaurantController::class, 'index'])->where('bool', '1|0|-1');
Route::get('/restaurant/{id}', [RestaurantController::class, 'show']);
Route::post('/restaurant', [RestaurantController::class, 'store']);
Route::patch('/restaurant/{id}', [RestaurantController::class, 'update']);
Route::delete('/restaurant/{id}', [RestaurantController::class, 'destroy']);
// restaurant regulations
Route::post('/restaurant/regulations/{id}', [RestaurantController::class, 'addRestaurantRegulation']);

/**
 * bar
 */
Route::get('/bar&status={bool}', [BarController::class, 'index'])->where('bool', '1|0|-1');
Route::get('/bar/{id}', [BarController::class, 'show']);
Route::post('/bar', [BarController::class, 'store']);
Route::patch('/bar/{id}', [BarController::class, 'update']);
Route::delete('/bar/{id}', [BarController::class, 'destroy']);

/**
 * menu bar
 */
Route::get('/bar/menu/type={id}', [BarMenuController::class, 'index']);
Route::get('/bar/menu/{id}', [BarMenuController::class, 'show']);
Route::post('/bar/menu', [BarMenuController::class, 'store']);
Route::patch('/bar/menu/{id}', [BarMenuController::class, 'update']);
Route::delete('/bar/menu/{id}', [BarMenuController::class, 'destroy']);

/**
 * room type
 */
Route::get('/rooms/room-category', [RoomTypeController::class, 'index']);
Route::get('/rooms/room-category/{id}', [RoomTypeController::class, 'show']);
Route::post('/rooms/room-category', [RoomTypeController::class, 'store']);
Route::patch('/rooms/room-category/{id}', [RoomTypeController::class, 'update']);
Route::delete('/rooms/room-category/{id}', [RoomTypeController::class, 'destroy']);
// room listing
Route::get('/rooms&status={bool}', [RoomController::class, 'index'])->where('bool', '1|0|-1');

/**
 * point interest
 */
Route::get('/point-of-interes/type', [PointInterestType::class, 'index']);
Route::get('/point-of-interes/type/{id}', [PointInterestType::class, 'show']);
Route::post('/point-of-interes/type', [PointInterestType::class, 'store']);
Route::patch('/point-of-interes/type/{id}', [PointInterestType::class, 'update']);
Route::delete('/point-of-interes/type/{id}', [PointInterestType::class, 'destroy']);
// point of interest
Route::get('/point-of-interest&status={bool}', [PointInterestController::class, 'index'])->where('bool', '1|0|-1');
Route::get('/point-of-interes/{id}', [PointInterestController::class, 'show']);
Route::post('/point-of-interes', [PointInterestController::class, 'store']);
Route::patch('/PointInterest/{id}', [PointInterestController::class, 'update']);
Route::delete('/PointInterest/{id}', [PointInterestController::class, 'delete']);
