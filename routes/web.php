<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;
use App\Http\Controllers\professeur_controller;
use App\Http\Controllers\classe_controller;
use App\Http\Controllers\salle_controller;
use App\Http\Controllers\emploi_du_temps_controller;
use App\Http\Controllers\salle_de_classe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.header');
});

Route::get('/acc', function () {
    return view('Acceuil');
})->name('acceuil');


Route::get('/editProf', function () {
    return view('EditProf');
})->name('editProf');

Route::get('/editClasse', function () {
    return view('EditClasse');
})->name('editClasse');

Route::get('/editSalle', function () {
    return view('EditSalle');
})->name('editSalle');

Route::get('/editEdt', function () {
    return view('EditEdt');
})->name('editEdt');

Route::get('salle/libre', [salle_de_classe::class, 'recherche_libre'])->name('SalleLibre');

Route::get('/prof', [professeur_controller::class, 'index'])->name('professeurs');
Route::get('/classe', [classe_controller::class, 'index'])->name('classe');
Route::get('/salle', [salle_controller::class, 'index'])->name('salle');
Route::get('/edt', [emploi_du_temps_controller::class, 'index'])->name('edt');


Route::post('/create/prof', [professeur_controller::class, 'create'])->name('ProfCreate');
Route::post('update/prof',  [professeur_controller::class, 'update'])->name('profUpdate');
Route::get('/destroy/prof', [professeur_controller::class, 'destroy'])->name('ProfDelete');

Route::post('/create/classe', [classe_controller::class, 'create'])->name('ClasseCreate');
Route::post('/update/classe', [classe_controller::class, 'update'])->name('ClasseUpdate');
Route::get('/destroy/classe', [classe_controller::class, 'destroy'])->name('ClasseDelete');

Route::post('/create/salle', [salle_controller::class, 'create'])->name('SalleCreate');
Route::post('/update/salle', [salle_controller::class, 'update'])->name('SalleUpdate');
Route::get('/destroy/salle', [salle_controller::class, 'destroy'])->name('SalleDelete');

Route::post('/create/edt', [emploi_du_temps_controller::class, 'create'])->name('EdtCreate');
Route::post('/update/edt', [emploi_du_temps_controller::class, 'update'])->name('EdtUpdate');
Route::get('/destroy/edt', [emploi_du_temps_controller::class, 'destroy'])->name('EdtDelete');


Route::get('/resume', [PdfGeneratorController::class, 'index']);