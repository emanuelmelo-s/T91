<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Models\Aluno;

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
    // return view('welcome');
    return redirect()->route('alunos.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('alunos')
->middleware(['auth'])
->controller(AlunoController::class)
->group(function () {
    Route::get('/' , 'index')->name('alunos.index');
    Route::get('/novo', 'create')->name('alunos.create');
    Route::get('/editar/{id}', 'edit')->name('alunos.edit');
    Route::get('/mostrar/{id}', 'show')->name('alunos.show');
    Route::post('/cadastrar', 'store')->name('alunos.store');
    Route::post('/atualizar/{id}', 'update')->name('alunos.update');
    Route::post('/deletar/{id}', 'destroy')->name('alunos.destroy');

});


//Route::resource('alunos', AlunoController::class);



require __DIR__.'/auth.php';
