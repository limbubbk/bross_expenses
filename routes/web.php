<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SearchController;


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

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category
Route::get('/category.index', [CategoryController::class, 'create'])->name('category.index');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/upate/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


//Expenses
Route::post('/expenses/store', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/expenses/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
Route::post('/expenses/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
Route::get('/expenses/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');


//Search 
Route::get('/Search',[SearchController::Class,'search'])->name('search');

});

