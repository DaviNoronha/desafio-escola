<?php

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

Route::get('/catalogo', 'CatalogoController@index')->name('catalogo'); 

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::get('dados', 'UserController@dados')->name('users.dados');
    Route::post('salvar-dados', 'UserController@salvarDados')->name('users.salvarDados');
    Route::resource('cursos', 'CursoController');
    Route::resource('professores', 'ProfessorController');
    Route::get('alunos/matricula/{aluno}', 'AlunoController@matricula')->name('alunos.matricula');
});

Auth::routes();


