<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MbkmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Resources\ProgramResource;
use App\Models\Program;

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

Route::get('/programs/{id}', function ($id) {
    return new ProgramResource(Program::findOrFail($id));
});
Route::resource('packages', PackageController::class);
Route::resource('programs', ProgramController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('sections', SectionController::class);
Route::resource('semesters', SemesterController::class);
Route::post('/mbkm/{$id}', [App\Http\Controllers\MbkmController::class,'store']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);

});
