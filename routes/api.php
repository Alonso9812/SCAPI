<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoluntariosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReservacionesController;
use App\Http\Controllers\CampanasController;
use App\Http\Controllers\NuevosPuntosController;
use App\Http\Controllers\TiposVolCampController;
use App\Http\Controllers\VOluntariadosController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\UsuarioCampañaController;
use App\Http\Controllers\UsuarioVoluntariadoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Http\Middleware\CheckResponseForModifications;
use Tymon\JWTAuth\Contracts\Providers\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization'); 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' => ["auth:api", CheckAdminRole::class]], function(){

    
    Route::get('usuario-profile',[UsuariosController::class, 'usuarioProfile']);
    Route::get('logout',[UsuariosController::class, 'logout']);
    

Route::get('showU', [AuthController::class, 'showUsers']);

Route::delete('deleteUser/{id}', [AuthController::class, 'destroy']);

Route::put('user-update/{id}',[AuthController::class,'updateUser']);

Route::get('usuarios/{id}', [AuthController::class, 'showID']);


Route::put('usuario-status/{id}',[AuthController::class,'editStatus']);


//Reservaciones

Route::post('create-reservacion',[ReservacionesController::class, 'createReservacion']);

Route::get('reservaciones',[ReservacionesController::class, 'show']);

Route::get('reservaciones/{id}',[ReservacionesController::class, 'showID']);

Route::delete('reservaciones-delete/{id}',[ReservacionesController::class,'destroy']);

Route::put('reservaciones-update/{id}',[ReservacionesController::class,'updatereserva']);

Route::put('reservacion-status/{id}',[ReservacionesController::class,'editStatus']);

// Route::get('voluntarios',[VoluntariosController::class, 'show']);

// Route::get('create-voluntarios',[VoluntariosController::class, 'create']);


//Roles

Route::get('roles',[RolesController::class, 'show']);


//Campañas

Route::get('mostrar-campanas',[CampanasController::class, 'show']);
    
Route::post('create-campana',[CampanasController::class,'store']);
                                                        
Route::put('campana-update/{id}',[CampanasController::class,'updateCampanas']);

Route::delete('campana-delete/{id}',[CampanasController::class,'destroy']);

Route::get('campana/{id}', [CampanasController::class, 'showID']);

Route::put('Status-update/{id}', [CampanasController::class, 'editStatus']);



//Tipo VolCamp
Route::post('create-tipoVolCamp',[TiposVolCampController::class, 'createTipo']);

Route::get('ver-tipo',[TiposVolCampController::class,'show']);

Route::delete('/delete-tipo/{id}',[TiposVolCampController::class,'destroy']);

Route::put('update-tipo/{id}',[TiposVolCampController::class,'updateTipoVC']);

Route::get('ver-tipo/{id}',[TiposVolCampController::class,'showID']);

Route::put('tipo-status/{id}',[TiposVolCampController::class,'editStatus']);


//NuevosPuntosDeInteresSostenible
Route::post('nuevo-punto', [NuevosPuntosController::class, 'store']);

Route::get('Puntos',[NuevosPuntosController::class, 'show']);

Route::get('ContadorPuntos',[NuevosPuntosController::class, 'showCount']);

Route::delete('/delete-punto/{id}',[NuevosPuntosController::class,'destroy']);

Route::put('update-punto/{id}', [NuevosPuntosController::class, 'update']);

Route::get('Puntos/{id}',[NuevosPuntosController::class, 'showID']);

Route::put('Punto-status/{id}',[NuevosPuntosController::class,'editStatus']);

Route::get('/storage/galeria/{nombreImagen}',[NuevosPuntosController::class, 'showImage']);

////Voluntariados
Route::put('voluntariado-update/{id}', [VOluntariadosController::class, 'updateVOluntariados']);

Route::post('create-voluntariado',[VOluntariadosController::class,'createVOluntariados']);
                                                        
Route::put('voluntariado-updateStatus/{id}',[VOluntariadosController::class,'editStatus']);

Route::delete('voluntariado-delete/{id}',[VOluntariadosController::class,'destroy']);

Route::get('voluntariado/{id}', [VOluntariadosController::class, 'showID']);

Route::get('mostrar-voluntariado',[VOluntariadosController::class,'show']);


//Solicitudes
Route::post('crear-solicitud', [SolicitudesController::class, 'createSolicitud']);

Route::get('mostrar-solicitudes', [SolicitudesController::class, 'show']);

Route::delete('solicitud-delete/{id}', [SolicitudesController::class, 'destroy']);

Route::post('crear-UsuVol', [UsuarioVoluntariadoController::class, 'create']);


});




Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);




//Login
Route::post('create-usuario',[UsuariosController::class,'createUsuarios']);


Route::post('loginAdmin',[UsuariosController::class,'loginAdmin']); 
Route::post('loginVoluntario',[UsuariosController::class,'loginVoluntario']); 

//UserCamp
Route::post('crear-UsuCamp', [UsuarioCampañaController::class, 'create']);

Route::get('mostrar-UsuCamp', [UsuarioCampañaController::class, 'show']);

Route::delete('participacion-delete/{id}', [UsuarioCampañaController::class, 'destroy']);

Route::get('mostrar-campanasVol',[CampanasController::class, 'show']);



//UserVol


Route::get('mostrar-UsuVol', [UsuarioVoluntariadoController::class, 'show']);

Route::delete('participacionVol-delete/{id}', [UsuarioVoluntariadoController::class, 'destroy']);

Route::get('usuarios',[UsuariosController::class, 'show']);