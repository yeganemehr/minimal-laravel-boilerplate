<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return array(
        'status' => true,
        'message' => "It's Your First API"
    );
});
