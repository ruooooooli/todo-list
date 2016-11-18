<?php

Route::get('/', array(
    'uses'  => 'IndexController@index',
    'as'    => 'index.index',
));
