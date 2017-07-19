<?php


use Core\ServiceRoutes\Route;

Route::get(['/', 'Hello', 'indexs']);
Route::get(['/cadastro', 'Hello', 'cadastro']);
Route::post(['/cadastrar', 'Hello', 'cadastrar']);