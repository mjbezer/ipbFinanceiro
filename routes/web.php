<?php

Auth::routes();

/// Rotas tipo get
$this->get('/membro/aniver','MembroController@aniver')->name('membro.aniver');
$this->get('/membro/api','MembroController@api');
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
$this->get('/fornecedores/edit/{t0/contaContabil/update/8_idFornecedor}','FornecedorController@edit');
$this->put('/fornecedores/update/{t08_idFornecedor}','FornecedorController@update');
$this->get('/fornecedores/destroy/{t08_idFornecedor}','FornecedorController@destroy');
$this->get('/fornecedores/destroytipo/{t09_idcategoriaFornecedores}','FornecedorController@destroyTipo');
$this->get('/departamentos/create', 'DepartamentosController@create');
$this->post('/departamentos/store', 'DepartamentosController@store');
$this->get('/departamentos/destroy/{t10_idDepartamento}', 'DepartamentosController@destroy');
$this->get('/contaContabil/create', 'ContasContabeisController@create');
$this->post('/contaContabil/store','ContasContabeisController@store');
$this->get('/contaContabil/edit/{t13_idContaContabil}', 'ContasContabeisController@edit');
$this->put('/contaContabil/update/{t13_idContaContabil}','ContasContabeisController@update');
$this->get('/contaContabil/destroy/{t13_idContaContabil}', 'ContasContabeisController@destroy');
$this->get('/orcamento/create', 'OrcamentoController@create');
$this->post('/orcamento/store', 'OrcamentoController@store');












//Rotas resource
Route::resource('/membro','MembroController');
Route::resource('/membresia','MembresiaController');


Route::get('/', 'HomeController@index')->name('home');
