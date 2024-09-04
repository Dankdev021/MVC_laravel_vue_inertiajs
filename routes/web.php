<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/create-user', function () {
    return Inertia::render('CreateUser');
});
Route::get('/update-user', function () {
    return Inertia::render('UpdateUser');
});
Route::get('/', function () {
    return Inertia::render('Login');
});

Route::get('/course-create', function () {
    return Inertia::render('CreateCurso');
});
Route::get('/course-update/{id}', function ($id) {
    return Inertia::render('UpdateCurso', ['id' => (int)$id]);
});

Route::prefix('user')->group(function (){
    Route::post('/create-user', [UserController::class, 'createUser']);
    Route::put('/update-user', [UserController::class, 'updateUser']);
    Route::get('', [UserController::class, 'getUsers']);
});
Route::prefix('authentications')->group(function (){
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
Route::prefix('course')->group(function (){
    Route::post('/create-course', [CursoController::class, 'createCurso']);
    Route::post('/update-course', [CursoController::class, 'updateCurso']);
    Route::get('', [CursoController::class, 'getCursos']);
    Route::get('/show/pdf/{id}', [CursoController::class, 'showPdf']);
});
