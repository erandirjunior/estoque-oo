<?php


use Core\ServiceRoutes\Route;

Route::get(['/', 'Hellos', 'index']);
Route::get(['/cadastro', 'Hello', 'cadastro']);
Route::post(['/cadastrar', 'Hello', 'cadastrar']);