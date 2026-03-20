<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    // Protected routes (require admin auth)
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Teachers
        Route::get('/teachers', [AdminController::class, 'teachersList'])->name('teachers.index');
        Route::post('/teachers', [AdminController::class, 'teacherStore'])->name('teachers.store');
        Route::put('/teachers/{teacher}', [AdminController::class, 'teacherUpdate'])->name('teachers.update');
        Route::delete('/teachers/{teacher}', [AdminController::class, 'teacherDelete'])->name('teachers.delete');

        // Toppers
        Route::get('/toppers', [AdminController::class, 'toppersList'])->name('toppers.index');
        Route::post('/toppers', [AdminController::class, 'topperStore'])->name('toppers.store');
        Route::put('/toppers/{topper}', [AdminController::class, 'topperUpdate'])->name('toppers.update');
        Route::delete('/toppers/{topper}', [AdminController::class, 'topperDelete'])->name('toppers.delete');

        // Gallery
        Route::get('gallery/category', [AdminController::class, 'galleryCategoryList'])->name('gallery.category.index');
        Route::post('gallery/category/store', [AdminController::class, 'galleryCategoryStore'])->name('gallery.category.store');
        Route::put('gallery/category/{id}/update', [AdminController::class, 'galleryCategoryUpdate'])->name('gallery.category.update');
        Route::delete('gallery/category/{id}/delete', [AdminController::class, 'galleryCategoryDelete'])->name('gallery.category.delete');

        Route::get('/gallery', [AdminController::class, 'galleryList'])->name('gallery.index');
        Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('gallery.store');
        Route::put('/gallery/{galary}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');
        Route::delete('/gallery/{galary}', [AdminController::class, 'galleryDelete'])->name('gallery.delete');
        Route::delete('/gallery/image/{galleryImage}', [AdminController::class, 'galleryImageDelete'])->name('gallery.image.delete');

        // Notice Board
        Route::get('/noticeboard', [AdminController::class, 'noticeBoardList'])->name('noticeboard.index');
        Route::post('/noticeboard', [AdminController::class, 'noticeBoardStore'])->name('noticeboard.store');
        Route::put('/noticeboard/{noticeBoard}', [AdminController::class, 'noticeBoardUpdate'])->name('noticeboard.update');
        Route::delete('/noticeboard/{noticeBoard}', [AdminController::class, 'noticeBoardDelete'])->name('noticeboard.delete');

        // Events
        Route::get('/events', [AdminController::class, 'eventsList'])->name('events.index');
        Route::post('/events', [AdminController::class, 'eventStore'])->name('events.store');
        Route::put('/events/{event}', [AdminController::class, 'eventUpdate'])->name('events.update');
        Route::delete('/events/{event}', [AdminController::class, 'eventDelete'])->name('events.delete');

        // Syllabus
        Route::get('/syllabus', [AdminController::class, 'syllabusList'])->name('syllabus.index');
        Route::post('/syllabus', [AdminController::class, 'syllabusStore'])->name('syllabus.store');
        Route::put('/syllabus/{syllabus}', [AdminController::class, 'syllabusUpdate'])->name('syllabus.update');
        Route::delete('/syllabus/{syllabus}', [AdminController::class, 'syllabusDelete'])->name('syllabus.delete');

        // Results
        Route::get('/results', [AdminController::class, 'resultsList'])->name('results.index');
        Route::post('/results', [AdminController::class, 'resultStore'])->name('results.store');
        Route::put('/results/{result}', [AdminController::class, 'resultUpdate'])->name('results.update');
        Route::delete('/results/{result}', [AdminController::class, 'resultDelete'])->name('results.delete');

        // Latest News
        Route::get('/latest-news', [AdminController::class, 'latestNewsList'])->name('latest-news.index');
        Route::post('/latest-news', [AdminController::class, 'latestNewsStore'])->name('latest-news.store');
        Route::put('/latest-news/{latestNews}', [AdminController::class, 'latestNewsUpdate'])->name('latest-news.update');
        Route::patch('/latest-news/{latestNews}/toggle', [AdminController::class, 'latestNewsToggle'])->name('latest-news.toggle');
        Route::delete('/latest-news/{latestNews}', [AdminController::class, 'latestNewsDelete'])->name('latest-news.delete');

        // Careers
        Route::get('/careers', [AdminController::class, 'careersList'])->name('careers.index');
        Route::post('/careers', [AdminController::class, 'careerStore'])->name('careers.store');
        Route::put('/careers/{career}', [AdminController::class, 'careerUpdate'])->name('careers.update');
        Route::delete('/careers/{career}', [AdminController::class, 'careerDelete'])->name('careers.delete');
    });
});
