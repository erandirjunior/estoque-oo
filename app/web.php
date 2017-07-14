<?php


use Core\ServiceRoutes\Route;

Route::get(['/', 'Hello', 'index']);
Route::get(['/cadastro', 'Hello', 'cadastro']);
Route::post(['/cadastrar', 'Hello', 'cadastrar']);