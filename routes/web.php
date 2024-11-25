<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)
    ->name('home')
->lazy();

Route::get('/login', \App\Livewire\Login::class)
    ->middleware('guest')
    ->name('login')
;

Route::get('/otp/{mobile}', \App\Livewire\OTP::class)
    ->middleware('guest')
    ->name('otp')
   ;

Route::get('/update-username', \App\Livewire\UserName::class)
    ->middleware('auth:web')
    ->name('update.username')
    ;

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})
    ->middleware('auth:web')
    ->name('logout');

Route::get('/chat', \App\Livewire\Chat::class)
//    ->middleware('auth:web')
->name('chat');

Route::get('/users', function () {
    return \App\Models\User::all();
})->middleware('isAdmin')
;

//**************************************************
//ADMIN **************************************************
//**************************************************
Route::prefix('panel')->middleware('isAdmin')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    //USER **************************************************

    Route::prefix('users')->group(function () {
        Route::get('/' , \App\Livewire\Admin\Users::class)
            ->name('admin.users.index');
    });

    //COURSE **************************************************
    Route::prefix('courses')->group(function () {
        Route::get('/' , \App\Livewire\Admin\Courses::class)
            ->name('admin.courses.index');

        Route::get('/create' , \App\Livewire\Admin\CourseCreate::class)
            ->name('admin.courses.create');

        Route::get('/edit/{course}' , \App\Livewire\Admin\CourseUpdate::class)
            ->name('admin.courses.update');

        Route::delete('/delete/{course}', [\App\Http\Controllers\Admin\CourseController::class , 'delete'])->name('admin.courses.delete');
    });

    //TICKET **************************************************
    Route::prefix('chats')->group(function () {
        Route::get('/' , \App\Livewire\Admin\Tickets::class)
            ->name('admin.ticket.index');

        Route::get('/messages{chat}' , \App\Livewire\Admin\Ticket::class)
        ->name('admin.ticket.messages');

    });

    //SERVICE **************************************************
    Route::prefix('services')->group(function () {
        Route::get('/' , \App\Livewire\Admin\Services::class)
            ->name('admin.services.index');

        Route::get('/create' , \App\Livewire\Admin\ServiceCreate::class)
            ->name('admin.services.create');


        Route::get('/edit/{service}', \App\Livewire\Admin\ServiceUpdate::class)->name('admin.services.edit');
    });
//    SETTING###########
    Route::prefix('settings')->group(function () {
        Route::get('/', \App\Livewire\Admin\Settings::class)->name('admin.settings');
    });
});
