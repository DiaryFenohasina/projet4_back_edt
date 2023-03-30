<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\professeur_controller;
use App\Http\Controllers\classe_controller;
use App\Http\Controllers\salle_controller;
use App\Http\Controllers\emploi_du_temps_controller;
use App\Http\Controllers\salle_de_classe;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/prof', [professeur_controller::class, 'index']);
// Route::put('/update/prof/{id}', [professeur_controller::class, 'update']);
// Route::post('/create/prof', [professeur_controller::class, 'create']);
// Route::delete('/destroy/prof/{id}', [professeur_controller::class, 'destroy']);


// Route::get('/classe', [classe_controller::class, 'index']);
// Route::put('/update/classe/{id}', [classe_controller::class, 'update']);
// Route::post('/create/classe', [classe_controller::class, 'create']);
// Route::delete('/destroy/classe/{id}', [classe_controller::class, 'destroy']);

// Route::get('/salle', [salle_controller::class, 'index']);
// Route::put('/update/salle/{id}', [salle_controller::class, 'update']);
// Route::post('/create/salle', [salle_controller::class, 'create']);
// Route::delete('/destroy/salle/{id}', [salle_controller::class, 'destroy']);

// Route::get('/edt', [emploi_du_temps_controller::class, 'index']);
// Route::put('/update/edt/{id}', [emploi_du_temps_controller::class, 'update']);
// Route::post('/create/edt', [emploi_du_temps_controller::class, 'create']);
// Route::delete('/destroy/edt/{id}', [emploi_du_temps_controller::class, 'destroy']);
// Route::get('/liste/edt', [emploi_du_temps_controller::class, 'listedt']);

// Route::get('salle/libre', [salle_de_classe::class, 'recherche_libre']);

?>
