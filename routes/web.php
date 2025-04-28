<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('./pages/login');
})->name('login');
Route::get('/signup',function(){
    return view('./pages/signup');
})->name('signup');;

// Route::get('/dashboard', [ProgrammeController::class, 'dashboard'])->name('dashboard');


// Route::get('/inventory', [ProgrammeController::class, 'showInventory'])->name('inventory');


// Route::get('/add_items',function(){
//     return view('./pages/add_items');
// })->name('add_items');









// //post requests
Route::post('/signup',[ProgrammeController::class,'insertuser'])->name('insertuser');
Route::post('/login',[ProgrammeController::class,'validateuser'])->name('validateuser');
// Route::post('/add_items',[ProgrammeController::class,'add_items_details'])->name('add_items_details');

// // Route to show the form for editing the item
// Route::get('/edit-items', [ProgrammeController::class, 'showEditForm'])->name('edit_items');

// // Route to handle the form submission and update the item
// Route::post('/update-item', [ProgrammeController::class, 'updateItem'])->name('update_item');


// Protected routes (require login)
Route::middleware(['auth'])->group(function () {

    // GET routes
    Route::get('/dashboard', [ProgrammeController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventory', [ProgrammeController::class, 'showInventory'])->name('inventory');
    Route::get('/add_items', function () {
        return view('./pages/add_items');
    })->name('add_items');
    Route::get('/edit-items', [ProgrammeController::class, 'showEditForm'])->name('edit_items');

    // POST routes
    Route::post('/add_items', [ProgrammeController::class, 'add_items_details'])->name('add_items_details');
    Route::post('/update-item', [ProgrammeController::class, 'updateItem'])->name('update_item');
});