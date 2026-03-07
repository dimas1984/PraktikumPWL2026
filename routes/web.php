<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// saat dijalankan serve maka akan langsung ke halaman admin
Route::redirect('/', '/admin');