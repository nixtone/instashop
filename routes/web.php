<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Отдельные страницы
Route::name('page.')->controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

// Категории
Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
    Route::get('/{category:slug}', 'show')->name('show');
});

// Товары
Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
    Route::get('/{product:slug}', 'show')->name('show');
});

// Корзина
Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

// Админка
Route::prefix('/k2/admin')->name('admin.')->group(function () {

    // Вход
    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::post('/auth', [UserController::class, 'auth'])->name('auth');

    // Секретная часть
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Пользователи
    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/logout', 'logout')->name('logout');
    });
    // Файлы
    Route::prefix('file')->name('file.')->controller(FileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // Заказы
    Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{order}', 'show')->name('show');
    });

    // Товары
    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // Категории
    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::patch('/update/{category}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{category}', 'destroy')->name('delete');
        Route::delete('/delete-force/{category}', 'destroyForce')->name('delete.force');
        Route::get('/restore/{category}', 'restore')->name('restore');
        // Route::get('/deletehard/{category}', 'destroyHard')->name('delete.hard');
        // Route::post('/deletepreview/{category}/{id}', 'destroyPreview')->name('delete.preview');
    });

    // Теги
    Route::prefix('tag')->name('tag.')->controller(TagController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    /*
    Route::middleware(['Admin'])->group(function () {











    });
    */

});
