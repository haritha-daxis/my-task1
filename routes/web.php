<?php



use Illuminate\Support\Facades\Route;
use App\Models\Link;

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
    return view('welcome');
});
use App\Http\Controllers\TestController;
use App\Http\Controllers\app_controller;

Route::get('app', [app_controller::class,'index']);
Route::get('cat',[TestController::class,'index']);
Route::get('subcat',[TestController::class,'subCat']);

use App\Http\Controllers\DataTableAjaxCRUDController;

Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);

use App\Http\Controllers\DepartmentsController;

Route::get('/', [DepartmentsController::class, 'index']);
Route::get('/getEmployees/{id}', [DepartmentsController::class, 'getEmployees']);

//Route::get('/get/{id}',[teachercontroller::class,'getTeacher']);
// use App\Http\Controllers\TestController;



// Route::get('get-list', [TestController::class, 'index_one']);
Route::get('form', [TestController::class,'index']);
Route::post('store-product', [TestController::class,'store']);
Route::post('edit-product', [TestController::class,'edit']);
Route::post('delete-product', [TestController::class,'destroy']);
Route::get('sales', [TestController::class,'salesReport']);
Route::get('customer', [TestController::class,'customerReport']);
Route::get('category', [TestController::class,'categoryReport']);
Route::get('product', [TestController::class,'productReport']);


////////////////////////////////////////////////
//--LOAD THE VIEW--//
// Route::get('/', function () {
//     $links = Link::all();
//     return view('laracrud')->with('links', $links);
// });

// //--CREATE a link--//
// Route::post('/links', function (Request $request) {
//     $link = Link::create($request->all());
//     return Response::json($link);
// });

// //--GET LINK TO EDIT--//
// Route::get('/links/{link_id?}', function ($link_id) {
//     $link = Link::find($link_id);
//     return Response::json($link);
// });

// //--UPDATE a link--//
// Route::put('/links/{link_id?}', function (Request $request, $link_id) {
//     $link = Link::find($link_id);
//     $link->url = $request->url;
//     $link->description = $request->description;
//     $link->save();
//     return Response::json($link);
// });

// //--DELETE a link--//
// Route::delete('/links/{link_id?}', function ($link_id) {
//     $link = Link::destroy($link_id);
//     return Response::json($link);
// });
// /////////////////
// use App\Http\Controllers\app_controller;

// Route::get('/',[app_controller::class,'index']);
// Route::post('/links',[app_controller::class,'create']);
// Route::get('/links/{link_id?}',[app_controller::class,'edit']);
// Route::post('/links/{link_id?}',[app_controller::class,'update']);
// Route::post('/links/{link_id?}',[app_controller::class,'delete']);


use App\Http\Controllers\CustomerController;

Route::resource('customers', CustomerController::class);

use App\Http\Controllers\SalesController;

Route::get('/sale', [SalesController::class, 'index']);
Route::resource('sales', SalesController::class);

use App\Http\Controllers\GroceryController;

Route::get('grocery',[GroceryController::class,'index']);
Route::post('grocery',[GroceryController::class,'store']);
Route::get('/dd',[GroceryController::class,'show']);
