<?php
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

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
    $plants = DB::table('plant')->get();
    return view('home', compact('plants'));
})->name('home');

Route::get('/resources/views/catalog', function () {
    return view('catalog/index');
});

Route::get('/catalog', function () {
    $plants = DB::table('plant')->get();
    return view('cat/index', compact('plants'));
});

Route::get('/resources/views/admin', function () {
    return view('admin/index');
});

Route::get('/resources/views/add', function () {
    return view('add/index');
});

Route::get('/resources/views/add/foo.php', [PlantController::class, 'create']);

//Route::get('/resources/views/add/foo.php', function () {
//    return view('add/foo');
//});


Route::get('/create/', [PlantController::class, 'create']);
Route::get('/delete/', [PlantController::class, 'delete']);

