<?php

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
use App\Disciplina;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('aluno','AlunoController');
Route::get('aluno','AlunoController@index')->name('alunos.index');
Route::get('aluno/create','AlunoController@create')->name('alunos.create');
Route::get('aluno/edit/{id}', array('as' => 'alunos.edit', 'uses' => 'AlunoController@edit'));
Route::post('aluno/store','AlunoController@store')->name('alunos.store');
Route::get('aluno/show/{id}', 'AlunoController@show')->name('alunos.show');
Route::get('aluno/delete/{id}', 'AlunoController@delete')->name('alunos.delete');
Route::delete('aluno/destroy/{id}', 'AlunoController@destroy')->name('alunos.destroy');
Route::patch('aluno/update/{id}', 'AlunoController@update')->name('alunos.update');

Route::get('curso','CursoController@index')->name('cursos.index');
Route::get('curso/create','CursoController@create')->name('cursos.create');
Route::get('curso/edit/{id}', array('as' => 'cursos.edit', 'uses' => 'CursoController@edit'));
Route::post('curso/store','CursoController@store')->name('cursos.store');
Route::get('curso/show/{id}', 'CursoController@show')->name('cursos.show');
Route::get('curso/delete/{id}', 'CursoController@delete')->name('cursos.delete');
Route::delete('curso/destroy/{id}', 'CursoController@destroy')->name('cursos.destroy');
Route::patch('curso/update/{id}', 'CursoController@update')->name('cursos.update');

Route::get('disciplina','DisciplinaController@index')->name('disciplinas.index');
Route::get('disciplina/create','DisciplinaController@create')->name('disciplinas.create');
Route::get('disciplina/edit/{id}', array('as' => 'disciplinas.edit', 'uses' => 'DisciplinaController@edit'));
Route::post('disciplina/store','DisciplinaController@store')->name('disciplinas.store');
Route::get('disciplina/show/{id}', 'DisciplinaController@show')->name('disciplinas.show');
Route::get('disciplina/delete/{id}', 'DisciplinaController@delete')->name('disciplinas.delete');
Route::delete('disciplina/destroy/{id}', 'DisciplinaController@destroy')->name('disciplinas.destroy');
Route::patch('disciplina/update/{id}', 'DisciplinaController@update')->name('disciplinas.update');

/*Rotas para requisição Ajax*/
//Route::get('myform', 'AjaxDemoController@myform');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'AlunoController@selectAjax']);
Route::post('select-ajax-edit/{id}', ['as'=>'select-ajax-edit','uses'=>'AlunoController@selectAjaxEdit']);

//Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'DisciplinaController@selectAjax']);
//Route::post('select-ajax-edit/{id}', ['as'=>'select-ajax-edit','uses'=>'DisciplinaController@selectAjaxEdit']);

Route::post('select-ajax2/{id}', ['as'=>'select-ajax2','uses'=>'AlunoController@selectAjax2']);
Route::post('select-ajax-edit2/{id}', ['as'=>'select-ajax-edit2','uses'=>'AlunoController@selectAjaxEdit2']);

Route::get("flash","HomeController@flash");

//Route::post('select-ajax2/{id}', ['as'=>'select-ajax2','uses'=>'DisciplinaController@selectAjax2']);
//Route::post('select-ajax-edit2/{id}', ['as'=>'select-ajax-edit2','uses'=>'DisciplinaController@selectAjaxEdit2']);

/*Route::get ('disciplina', function() {
    $data = Disciplina::all();

    return view('disciplinas.index')->withData($data);
});*/

/*Route::post ( '/deleteItem', function (Request $request) {
    Data::find ( $request->id )->delete ();
    return response ()->json ();
} );
*/