<?php



Route::any('/proxy','Elfo404\LaravelCORSProxy\Http\CORSController@index')->name('cors-proxy');