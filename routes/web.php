<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\ChinthaerController;
use App\Http\Controllers\ChinthaerGalleryController;
use App\Http\Controllers\ClientSideViewsController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CommercialGalleryController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\HomesGalleryController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\InstitutionsGalleryController;
use App\Http\Controllers\ManageViewsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublicationsGalleryController;
use App\Http\Controllers\UrbanDesignController;
use App\Http\Controllers\UrbanDesignGalleryController;




// client side
Route::get('/', function () {
    return view('client.index');
});

Route::get('/homes', [ClientSideViewsController::class, 'viewHomes']);

Route::get('/urbandesign', [ClientSideViewsController::class, 'viewUrbanDesigns']);

Route::get('/institution', [ClientSideViewsController::class, 'viewInstitutions']);

Route::get('/commercial', [ClientSideViewsController::class, 'viewCommercials']);

Route::get('/aboutus', [ClientSideViewsController::class, 'viewAboutus']);

Route::get('/awards', [ClientSideViewsController::class, 'viewAwards']);

Route::get('/people', [ClientSideViewsController::class, 'viewPeople']);

Route::get('/contact', [ClientSideViewsController::class, 'viewContact']);

Route::get('/publications', [ClientSideViewsController::class, 'viewPublications']);

Route::get('/publication-details/{id}', [ClientSideViewsController::class, 'publicationDetails']);

Route::get('/chinthaer', [ClientSideViewsController::class, 'viewChinthaer']);

Route::get('/chinthaer-details/{id}', [ClientSideViewsController::class, 'chinthaerDetails']);

Route::get('/home-details/{id}', [ClientSideViewsController::class, 'homeDetails']);

Route::get('/urbandesign-details/{id}', [ClientSideViewsController::class, 'urbanDesignDetails']);

Route::get('/institution-details/{id}', [ClientSideViewsController::class, 'institutionDetails']);

Route::get('/commercial-details/{id}', [ClientSideViewsController::class, 'commercialDetails']);

Route::post('/contactus/submit', [ContactFormController::class, 'submitContactForm'])->name('contactus.submit');



// admin side
Route::get('/management', function () {
    return view('admin.login');
})->name('login');

Route::get('/management/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/management/works', [ManageViewsController::class, 'viewWorks'])->name('works')->middleware('auth');

Route::get('/management/office', [ManageViewsController::class, 'viewOffice'])->name('office')->middleware('auth');

Route::get('/management/archives', [ManageViewsController::class, 'viewArchives'])->name('archives')->middleware('auth');

Route::get('/management/change-password', function () {
    return view('admin.change_password');
})->name('change-password')->middleware('auth');

// gallery

Route::get('/management/gallery/{context}/{id}', [ManageViewsController::class, 'viewGallery'])->name('view.gallery')->middleware('auth');


// authorization

Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware('auth');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password')->middleware('auth');


// homes

Route::post('/add-homes', [HomesController::class, 'create'])->name('add.homes')->middleware('auth');
Route::post('/edit-work/home/{id}', [HomesController::class, 'edit'])->name('edit.home')->middleware('auth');
Route::post('/work-gallery/home/{id}', [HomesGalleryController::class, 'addImage'])->name('add.home.image')->middleware('auth');

Route::delete('/delete-home/{id}', [HomesController::class, 'delete'])->name('delete.home')->middleware('auth');
Route::delete('/delete-image/home/{id}', [HomesGalleryController::class, 'deleteImage'])->name('delete.home.image')->middleware('auth');


// urban designs

Route::post('/add-urbandesigns', [UrbanDesignController::class, 'create'])->name('add.urbandesigns')->middleware('auth');
Route::post('/edit-work/urbandesign/{id}', [UrbanDesignController::class, 'edit'])->name('edit.urbandesign')->middleware('auth');
Route::post('work-gallery/urbandesign/{id}', [UrbanDesignGalleryController::class, 'addImage'])->name('add.urbandesign.image')->middleware('auth');

Route::delete('/delete-urbandesign/{id}', [UrbanDesignController::class, 'delete'])->name('delete.urbandesign')->middleware('auth');
Route::delete('/delete-image/urbandesign/{id}', [UrbanDesignGalleryController::class, 'deleteImage'])->name('delete.urbandesign.image')->middleware('auth');


// institutions

Route::post('/add-institutions', [InstitutionsController::class, 'create'])->name('add.institutions')->middleware('auth');
Route::post('/edit-work/institution/{id}', [InstitutionsController::class, 'edit'])->name('edit.institution')->middleware('auth');
Route::post('/work-gallery/institution/{id}', [InstitutionsGalleryController::class, 'addImage'])->name('add.institution.image')->middleware('auth');

Route::delete('/delete-institution/{id}', [InstitutionsController::class, 'delete'])->name('delete.institution')->middleware('auth');
Route::delete('/delete-image/institution/{id}', [InstitutionsGalleryController::class, 'deleteImage'])->name('delete.institution.image')->middleware('auth');


// commercial

Route::post('/add-commercials', [CommercialController::class, 'create'])->name('add.commercials')->middleware('auth');
Route::post('/edit-work/commercial/{id}', [CommercialController::class, 'edit'])->name('edit.commercial')->middleware('auth');
Route::post('/work-gallery/commercial/{id}', [CommercialGalleryController::class, 'addImage'])->name('add.commercial.image')->middleware('auth');

Route::delete('/delete-commercial/{id}', [CommercialController::class, 'delete'])->name('delete.commercial')->middleware('auth');
Route::delete('/delete-image/commercial/{id}', [CommercialGalleryController::class, 'deleteImage'])->name('delete.commercial.image')->middleware('auth');



// office
// aboutus

Route::post('/aboutus/add', [AboutUsController::class, 'add'])->name('add.aboutus')->middleware('auth');
Route::post('/aboutus/edit/{id}', [AboutUsController::class, 'update'])->name('edit.aboutus')->middleware('auth');
Route::delete('/aboutus/delete/{id}', [AboutUsController::class, 'delete'])->name('delete.aboutus')->middleware('auth');


// awards

Route::post('/awards/add', [AwardsController::class, 'add'])->name('add.awards')->middleware('auth');
Route::post('/awards/edit/{id}', [AwardsController::class, 'update'])->name('edit.award')->middleware('auth');
Route::delete('/awards/delete/{id}', [AwardsController::class, 'delete'])->name('delete.award')->middleware('auth');


// people

Route::post('/people/add', [PeopleController::class, 'add'])->name('add.people')->middleware('auth');
Route::post('/people/edit/{id}' ,[PeopleController::class, 'update'])->name('edit.people')->middleware('auth');
Route::delete('/people/edit/{id}', [PeopleController::class, 'delete'])->name('delete.people')->middleware('auth');


// contact

Route::post('/contact/add', [ContactsController::class, 'add'])->name('add.contact')->middleware('auth');
Route::post('/contact/edit/{id}', [ContactsController::class, 'update'])->name('edit.contact')->middleware('auth');
Route::delete('/contact/delete/{id}', [ContactsController::class, 'delete'])->name('delete.contact')->middleware('auth');


// publications

Route::post('/publication/add', [PublicationController::class, 'add'])->name('add.publication')->middleware('auth');
Route::post('/publication/edit/{id}', [PublicationController::class, 'update'])->name('edit.publication')->middleware('auth');
Route::post('/publications/image-gallery/{id}', [PublicationsGalleryController::class, 'addImage'])->name('add.publications.image')->middleware('auth');

Route::delete('/publication/delete/{id}', [PublicationController::class, 'delete'])->name('delete.publication')->middleware('auth');
Route::delete('/delete-image/publications/{id}', [PublicationsGalleryController::class, 'deleteImage'])->name('delete.publications.image')->middleware('auth');


// chinthaer

Route::post('/chinthaer/add', [ChinthaerController::class, 'add'])->name('add.chinthaer')->middleware('auth');
Route::post('/chinthaer/edit/{id}', [ChinthaerController::class, 'update'])->name('edit.chinthaer')->middleware('auth');
Route::post('/chinthaer/image-gallery/{id}', [ChinthaerGalleryController::class, 'addImage'])->name('add.chinthaer.image')->middleware('auth');

Route::delete('/chinthaer/delete/{id}', [ChinthaerController::class, 'delete'])->name('delete.chinthaer')->middleware('auth');
Route::delete('/delete-image/publications/{id}', [ChinthaerGalleryController::class, 'deleteImage'])->name('delete.chinthaer.image')->middleware('auth');