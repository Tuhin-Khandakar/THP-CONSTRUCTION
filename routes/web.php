<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms');

// Sitemap & Robots
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);
Route::get('/robots.txt', [HomeController::class, 'robots']);

// Storage Link Utility (for cPanel without terminal)
Route::get('/link-storage', function () {
    $target = storage_path('app/public');
    $shortcut = public_path('storage');
    if (file_exists($shortcut)) {
        return "Storage link already exists.";
    }
    app('files')->link($target, $shortcut);
    return "Storage link created successfully.";
});

// Migration Utility (for cPanel without terminal)
Route::get('/run-migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Migrations completed successfully: " . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        return "Error running migrations: " . $e->getMessage();
    }
});

// Redirect standard dashboard to admin dashboard if authenticated
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('projects', AdminProjectController::class);
    Route::resource('blogs', AdminBlogController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class);
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);
    
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');
    Route::post('/inquiries/{inquiry}/read', [AdminInquiryController::class, 'markAsRead'])->name('inquiries.mark-as-read');

    // Settings
    Route::resource('products', App\Http\Controllers\Admin\AdminProductController::class);
    Route::resource('product-categories', App\Http\Controllers\Admin\ProductCategoryController::class);

    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::patch('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    Route::get('/popup', [App\Http\Controllers\Admin\PopupController::class, 'index'])->name('popup.index');
    Route::patch('/popup', [App\Http\Controllers\Admin\PopupController::class, 'update'])->name('popup.update');

    // Profile routes (standard Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
