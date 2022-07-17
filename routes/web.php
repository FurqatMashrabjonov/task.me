<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchUserController;
use App\Http\Controllers\TableController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

});
Route::controller(MainController::class)
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');

        Route::prefix('/notifications')->group(function () {
            Route::get('/', 'showNotifications')->name('notifications');
            Route::post('/', 'getNotificationsCount')->name('notifications');

            Route::get('/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
            Route::get('/{notification}/accept', [NotificationController::class, 'accept'])->name('notifications.accept');
        });

    });


Route::controller(TableController::class)
    ->middleware(['auth', 'verified'])
    ->prefix('/tables')
    ->as('table.')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{table}', 'show')->name('show');
    });

require __DIR__ . '/auth.php';

Route::get('/image', function (\Illuminate\Http\Request $request) {
    $img = Image::make(storage_path('app/backgrounds/' . $request->number . '/main.jpg'));
    $img->resize(400, null, function ($const) {
        $const->aspectRatio();
    })->save(storage_path('app/backgrounds/' . $request->number . '/small.jpg'));

});


Route::get('/find', [SearchUserController::class, 'search']);


