<?php

Route::get('/email', 'EnviarLembreteController@enviarEmail');
Route::get('/email/hora', 'EnviarLembreteController@enviarEmailHora');

Route::get('/', 'LembreteController@index')->name('lembrete.index');
Route::post('lembrete/store', 'LembreteController@store')->name('lembrete.store');
Route::get('/lembrete/edit/{id}', 'LembreteController@edit')->name('lembrete.edit');
Route::get('/lembrete/create', 'LembreteController@create')->name('lembrete.create');
Route::post('/lembrete/update/{id}', 'LembreteController@update')->name('lembrete.update');
Route::get('/lembrete/destroy/{id}', 'LembreteController@destroy')->name('lembrete.destroy');
