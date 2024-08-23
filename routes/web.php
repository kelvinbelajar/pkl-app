<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Models\Publication;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dashboard', DashboardController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('projects', ProjectController::class)->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakProject', [PDFController::class, 'cetakProjects'])->name('cetakProject')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);;
    Route::get('/cetakProjectById/{id}', [PDFController::class, 'cetakProjectById'])->name('cetakProjectById')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);;
    Route::get('/cetakMonthlyProjects', [PDFController::class, 'cetakMonthlyProjects'])->name('cetakMonthlyProjects')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);

    Route::resource('managers', ManagerController::class)->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakManager', [PDFController::class, 'cetakManagers'])->name('cetakManager')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakManagerById/{id}', [PDFController::class, 'cetakManagerById'])->name('cetakManagerById')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakMonthlyManagers', [PDFController::class, 'cetakMonthlyManagers'])->name('cetakMonthlyManagers')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);

    Route::resource('sources', SourceController::class)->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakSource', [PDFController::class, 'cetakSources'])->name('cetakSource')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakSourceById/{id}', [PDFController::class, 'cetakSourceById'])->name('cetakSourceById')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakMonthlySources', [PDFController::class, 'cetakMonthlySources'])->name('cetakMonthlySources')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);

    Route::resource('dates', DateController::class)->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakDate', [PDFController::class, 'cetakDates'])->name('cetakDate')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakDateById/{id}', [PDFController::class, 'cetakDateById'])->name('cetakDateById')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakMonthlyDates', [PDFController::class, 'cetakMonthlyDates'])->name('cetakMonthlyDates')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);

    Route::resource('employees', EmployeeController::class);


    Route::resource('locations', LocationController::class)->middleware(['auth', 'role:Admin|Bidang Geospasial']);
    Route::get('/cetakLocation', [PDFController::class, 'cetakLocations'])->name('cetakLocation')->middleware(['auth', 'role:Admin|Bidang Geospasial']);
    Route::get('/cetakLocationById/{id}', [PDFController::class, 'cetakLocationById'])->name('cetakLocationById')->middleware(['auth', 'role:Admin|Bidang Geospasial']);
    Route::get('/cetakMonthlyLocations', [PDFController::class, 'cetakMonthlyLocations'])->name('cetakMonthlyLocations')->middleware(['auth', 'role:Admin|Bidang Geospasial']);

    Route::resource('budgets', BudgetController::class)->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakBudget', [PDFController::class, 'cetakBudgets'])->name('cetakBudget')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakBudgetById/{id}', [PDFController::class, 'cetakBudgetById'])->name('cetakBudgetById')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);
    Route::get('/cetakMonthlyBudgets', [PDFController::class, 'cetakMonthlyBudgets'])->name('cetakMonthlyBudgets')->middleware(['auth', 'role:Admin|Bidang Ekonomi']);

    Route::resource('publications', PublicationController::class)->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakPublication', [PDFController::class, 'cetakPublications'])->name('cetakPublication')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakPublicationById/{id}', [PDFController::class, 'cetakPublicationById'])->name('cetakPublicationById')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    Route::get('/cetakMonthlyPublications', [PDFController::class, 'cetakMonthlyPublications'])->name('cetakMonthlyPublications')->middleware(['auth', 'role:Admin|Bidang Infrastruktur dan Kewilayahan']);
    
    Route::resource('users', userController::class)->middleware(['auth', 'role:Admin']);
    Route::patch('/users/{id}/makeInfrastruktur', [userController::class, 'makeInfrastruktur'])->name('users.makeInfrastruktur')->middleware(['auth', 'role:Admin']);
    Route::patch('/users/{id}/makeEkonomi', [userController::class, 'makeEkonomi'])->name('users.makeEkonomi')->middleware(['auth', 'role:Admin']);
    Route::patch('/users/{id}/makeGeospasial', [userController::class, '`makeGeospasial'])->name('users.makeGeospasial')->middleware(['auth', 'role:Admin']);

    
});
require __DIR__ . '/auth.php';
