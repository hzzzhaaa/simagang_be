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
use App\Models\Mbkm;
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
Route::resource('mbkms', MbkmController::class);
Route::get('/mbkm/show2/{mbkm}', [App\Http\Controllers\MbkmController::class, 'show2']);
Route::get('/mbkm/show3/{mbkm}/{section}', [App\Http\Controllers\MbkmController::class, 'show3']);
Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/student/show/{id}', [App\Http\Controllers\StudentController::class, 'show']);
// Route::post('/mbkm/store', [App\Http\Controllers\MbkmController::class,'store']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);

});
