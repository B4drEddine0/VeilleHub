<?php
session_start();



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/StudentController.php';
require_once '../app/config/db.php';



$router = new Router();
Route::setRouter($router);



// Define routes
// auth routes 
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'handleRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::post('/admin/updateUserStatus', [AdminController::class, 'updateUserStatus']);
Route::post('/admin/handleSubject', [AdminController::class, 'handleSubject']);
Route::post('/admin/schedulePresentation', [AdminController::class, 'schedulePresentation']);
Route::post('/admin/deletePresentation', [AdminController::class, 'deletePresentation']);
Route::post('/admin/updatePresentationStatus', [AdminController::class, 'updatePresentationStatus']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/subject/suggest', [StudentController::class, 'suggest']);


// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);



