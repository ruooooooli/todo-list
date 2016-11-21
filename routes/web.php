<?php

Route::get('/', array(
    'uses'  => 'IndexController@index',
    'as'    => 'index.index',
));

Route::group(array(
    'middleware' => 'cors',
), function () {
    Route::resource('todo', 'TodoController');
});
