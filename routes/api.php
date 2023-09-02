<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\ChinthaerController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CommercialGalleryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\HomesGalleryController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\InstitutionsGalleryController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UrbanDesignController;
use App\Http\Controllers\UrbanDesignGalleryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/add', [CommercialController::class, 'create']);
Route::post('/edit/{id}', [CommercialController::class, 'edit']);
Route::delete('/delete/{id}', [CommercialController::class, 'delete']);

Route::post('/addimage/{id}', [CommercialGalleryController::class, 'addImage']);
Route::delete('/deleteimage/{id}', [CommercialGalleryController::class, 'deleteImage']);

// aboutus

Route::post('/add-aboutus', [AboutUsController::class, 'add']);
Route::post('/edit-aboutus/{id}', [AboutUsController::class, 'update']);
Route::delete('/delete-aboutus/{id}', [AboutUsController::class, 'delete']);

// awards

Route::post('/add-awards', [AwardsController::class, 'add']);
Route::post('/edit-awards/{id}', [AwardsController::class, 'update']);
Route::delete('delete-awards/{id}', [AwardsController::class, 'delete']);

// people

Route::post('/add-people', [PeopleController::class, 'add']);
Route::post('/edit-people/{id}', [PeopleController::class, 'update']);
Route::delete('/delete-people/{id}', [PeopleController::class, 'delete']);

// contact

Route::post('/add-contact', [ContactsController::class, 'add']);
Route::post('/edit-contact/{id}', [ContactsController::class, 'update']);
Route::delete('/delete-contact/{id}', [ContactsController::class, 'delete']);

// publications

Route::post('/add-publication', [PublicationController::class, 'add']);
Route::post('/edit-publication/{id}', [PublicationController::class, 'update']);
Route::delete('/delete-publication/{id}', [PublicationController::class, 'delete']);

// chinthaer

Route::post('/add-chinthaer', [ChinthaerController::class, 'add']);
Route::post('/edit-chinthaer/{id}', [ChinthaerController::class, 'update']);
Route::delete('/delete-chinthaer/{id}', [ChinthaerController::class, 'delete']);
