<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PortfolioController::class)->group(function(){
    Route::get('/', 'index')->name('portfolio');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::controller(ProjectController::class)->group(function(){
        Route::get('/projects', 'index')->name('projects.index');
        Route::get('/project/create', 'createProject')->name('project.create');
        Route::post('/projects/addProject', 'addProject')->name('addProject');
        Route::get('/projects/edit/{id}', 'edit')->name('projects.edit');
        Route::post('/projects/update/{id}', 'update')->name('projects.update');
        Route::get('/projects/delete/{id}', 'delete')->name('projects.delete');

        Route::controller(SkillController::class)->group(function(){
            Route::get('/skills', 'index')->name('skills.index');
            Route::post('/skills/addSkill', 'addSkill')->name('skills.addSkill');
            Route::delete('/skills/delete/{id}', 'delete')->name('skills.delete');
        });
        Route::controller(EducationController::class)->group(function(){
            Route::get('/education', 'index')->name('education.index');
            Route::post('/education/addEdu', 'addEdu')->name('education.addEdu');
            Route::delete('/education/delete/{id}', 'delete')->name('education.delete');
        });
        Route::controller(ExperienceController::class)->group(function(){
            Route::get('/experience', 'index')->name('experience.index');
            Route::post('/experience/add', 'addExperience')->name('experience.add');
            Route::delete('/experience/delete/{id}', 'delete')->name('experience.delete');
        });

        Route::controller(AdminContactController::class)->group(function () {
            Route::get('/contacts', 'index')->name('contacts.index');
            Route::get('/contacts/create', 'create')->name('contacts.create');
            Route::post('/contacts', 'store')->name('contacts.save');
            Route::delete('/contacts/delete/{id}', 'delete')->name('contacts.delete');
        });
    });
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
