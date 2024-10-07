<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);
    return 'done';
});

//show the home page
Route::view('/', 'home');
//show the contact
Route::view('/contact', 'contact');

//show all jobs page
Route::get('/jobs',  [JobController::class, 'index']);
//show the job form only if user is logged in
Route::get('/jobs/create',  [JobController::class, 'create'])->middleware('auth');
//show a single job
Route::get('/jobs/{job}',  [JobController::class, 'show']);
//add a job only if user is signed in
Route::post('/jobs',  [JobController::class, 'store'])->middleware('auth');
//show edit job form only if user is signed in. If not, show login page
Route::get('/jobs/{job}/edit',  [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}',  [JobController::class, 'update']);
Route::delete('/jobs/{job}',  [JobController::class, 'destroy']);


// Route::resource('jobs', JobController::class);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
