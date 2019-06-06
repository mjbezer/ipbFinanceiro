<?php

Auth::routes();

/// Rotas tipo get
$this->get('/membro/aniver','MembroController@aniver')->name('membro.aniver');
$this->get('/membro/{t03_idMembro}/{t03_situacao}/destroy','MembroController@destroy')->name('membro.destroy');
$this->post('/evento/store','EventoController@store')->name('evento.store');
$this->get('/evento/{t05_idHistorico}/destroy','EventoController@destroy')->name('evento.destroy');
$this->get('membresia/{t04_idStatus}/destroy','MembresiaController@destroy')->name('membresia.destroy');
$this->get('/evento/{t03_idMembro}/show','EventoController@show');
$this->get('/contas/create','ContasController@create');
$this->post('/contas/store','ContasController@store');
$this->get('/contas/list','ContasController@index')->name('contas.list');
$this->get('/contas/edit/{t07_idContaBancaria}','ContasController@edit');
$this->get('/contas/destroy/{t07_idContaBancaria}','ContasController@destroy');
$this->put('/contas/update/{t07_idContaBancaria}','ContasController@update');
$this->get('/fornecedores/create','FornecedorController@create');
$this->post('/fornecedores/store','FornecedorController@store');
$this->get('/fornecedores/list','FornecedorController@index');
$this->get('/fornecedores/tipo', 'FornecedorController@createTipo');
$this->post('/fornecedor/tipo/store','FornecedorController@storeTipo');





//Rotas resource
Route::resource('/membro','MembroController');
Route::resource('/membresia','MembresiaController');


Route::get('/', 'HomeController@index')->name('home');
