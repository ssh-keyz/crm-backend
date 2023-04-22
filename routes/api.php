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

Route::resource('customers', 'Api\Customer\CustomerController');

Route::resource('customers.addresses', 'Api\Customer\CustomerAddressController');

Route::resource('customers.contacts', 'Api\Customer\CustomerContactController');

Route::resource('customers.notes', 'Api\Customer\CustomerNoteController');

Route::resource('projects', 'Api\Project\ProjectController');

Route::resource('projects.addresses', 'Api\Project\ProjectAddressController');

Route::resource('projects.notes', 'Api\Project\ProjectNoteController');

Route::resource('projects.contacts', 'Api\Project\ProjectContactController');

Route::resource('projects.statuses', 'Api\Project\ProjectStatusController');

Route::resource('project-statuses', 'Api\Project\ProjectStatusController');

Route::resource('projects.milestones', 'Api\Project\ProjectMilestoneController');

Route::resource('project-milestones', 'Api\Project\ProjectMilestoneController');

Route::resource('calendar-events', 'Api\Project\ProjectEventController');

Route::resource('calendar-events.notes', 'Api\Project\ProjectEventNoteController');

Route::resource('calendar-events.contacts', 'Api\Project\ProjectEventContactController');

//Route::resource('projects.required-contacts', 'Api\Project\RequiredContactController');

Route::resource('products', 'Api\Project\ProductController');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', function (Request $request) {
    $api_token = App\User::firstOrFail()->api_token;
    return compact('api_token');
});

Route::options('/auth/login', function (Request $request) {
    $response = response([]);
    return $response
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type');
});
