<?php

use Jwalbeli\Crudapi\Crudapi;

Route::get('demo', function() {
    echo 'Hello from the demo package!';
});

Route::group(['prefix' => 'api'], function() {
    Route::get('/', [Crudapi::class, 'index']);
    Route::post('/posts', [Crudapi::class, 'store']);
    Route::patch('/posts/{id}', [Crudapi::class, 'update']);
    Route::delete('/posts/{id}', [Crudapi::class, 'destroy']);
});
