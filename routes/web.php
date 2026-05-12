<?php

use App\Http\Controllers\AdminAboutUsController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Herosection;
use App\Models\Team;
use Illuminate\Support\Facades\Route;


// backend
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {


    Route::get('/home', [AdminHomeController::class, 'index'])
            ->name('admin.home');

    Route::get('/about-us', [AdminAboutUsController::class, 'index'])
            ->name('admin.about-us');

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');

    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');

    Route::get('/company', [CompanyController::class, 'index'])->name('admin.company');



     // FAQ CRUD
    Route::post('/faq', [FAQController::class, 'store'])->name('faq.store');
    Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{id}', [FAQController::class, 'destroy'])->name('faq.delete');

    // hero section
    Route::post('/hero', [HeroSectionController::class, 'store'])->name('hero.store');
    Route::put('/hero/{id}', [HeroSectionController::class, 'update'])->name('hero.update');
    Route::delete('/hero/{id}', [HeroSectionController::class, 'destroy'])->name('hero.delete');

    // team
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.delete');

    // certificate
    Route::post('/certificate', [CertificateController::class, 'store'])->name('certificate.store');
    Route::put('/certificate/{id}', [CertificateController::class, 'update'])->name('certificate.update');
    Route::delete('/certificate/{id}', [CertificateController::class, 'destroy'])->name('certificate.delete');

    // product
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    // gallery
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');

    // blog
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    // company
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    Route::put('/company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{id}', [CompanyController::class, 'destroy'])->name('company.delete');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// frontend

Route::get('/', function () {
    $hero = Herosection::where('page','home')->first();

    $faq = Faq::limit(10)->get();

    // $company = Company::first();
    return view('pages.frontend.Homepage',compact('hero','faq'));
});

Route::get('/about-us', function () {
     $hero = Herosection::where('page','about')->first();

     $teams = Team::latest()->get();

     $certificate = Certificate::orderBy('order')->get();

    return view('pages.frontend.AboutUsPage',compact('hero','teams','certificate'));
});

Route::get('/our-trading-products', function() {
    return view('pages.frontend.ProductPage');
});

Route::get('/export', function() {
    $hero = Herosection::where('page','home')->first();

    return view('pages.frontend.ExportPage',compact('hero'));
});

Route::get('/business-activities', function() {
    $hero = Herosection::where('page','home')->first();

    return view('pages.frontend.ActivityPage',compact('hero'));
});

Route::get('/blog', function() {
    $hero = Herosection::where('page','home')->first();

    return view('pages.frontend.BlogPage',compact('hero'));
});


require __DIR__.'/auth.php';
