<?php

Route::get('tasks/create', function(){
								return view('tasks.view_create');
						   })
	 ->name('tasks.view.create');

Route::post('tasks/create', "TaskController@create")
	 ->name('tasks.create');

Route::get('tasks/fetch', "TaskController@fetch")
	 ->name('tasks.fetch');

Route::update('tasks/finish', "TaskController@finish")
	 ->name('tasks.finish');
