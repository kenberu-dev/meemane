<?php

use App\Http\Controllers\MeetingLogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))
        ->name('dashboard');

    Route::get('/meetinglog', [MeetingLogController::class, 'index'])
        ->name('meetinglog.index');

    Route::get('/meetinglog/show/{meetingLog}', [MeetingLogController::class, 'show'])
        ->name('meetinglog.show');

    Route::get('/meetinglog/create', [MeetingLogController::class, 'create'])
        ->name('meetinglog.create');

    Route::post('/meetinglog', [MeetingLogController::class, 'store'])
        ->name('meetinglog.store');

    Route::delete('/meetinglog/destroy/{meetingLog}', [MeetingLogController::class, 'destroy'])
        ->name('meetinglog.destroy');

    Route::get('/meetinglog/edit/{meetingLog}', [MeetingLogController::class, 'edit'])
        ->name('meetinglog.edit');

    Route::put('/meetinglog/update/{meetingLog}', [MeetingLogController::class, 'update'])
        ->name('meetinglog.update');

    Route::patch('/meetinglog/update/{meetingLog}', [MeetingLogController::class, 'update'])
        ->name('meetinglog.update');

    Route::post('/message', [MessageController::class, 'store'])
        ->name('message.store');

    Route::delete('message/{message}', [MessageController::class, 'destroy'])
        ->name('message.destroy');

    Route::get('/message/older/{message}', [MessageController::class, 'loadOlder'])
        ->name('message.loadOlder');

    Route::get('/member', [MemberController::class, 'index'])
        ->name('member.index');

    Route::get('/member/show/{member}', [MemberController::class, 'show'])
        ->name('member.show');

    Route::get('/member/create', [MemberController::class, 'create'])
        ->name('meetinglog.create');

    Route::post('/member', [MemberController::class, 'store'])
        ->name('member.store');

    Route::delete('/member/destroy/{member}', [MemberController::class, 'destroy'])
        ->name('member.destroy');

    Route::get('/member/edit/{member}', [MemberController::class, 'edit'])
        ->name('member.edit');

    Route::put('/member/update/{member}', [MemberController::class, 'update'])
        ->name('member.update');

    Route::patch('/member/update/{member}', [MemberController::class, 'update'])
        ->name('memeber.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
