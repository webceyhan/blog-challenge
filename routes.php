<?php

use App\Controllers\ArticleController;
use App\Controllers\AuthController;
use App\Controllers\AuthorController;

$router->get('/', function () {
    auth() || redirect('/login');

    return view('home');
});

$router->get('/login', [AuthController::class, 'show']);
$router->post('/login', [AuthController::class, 'store']);
$router->get('/logout', [AuthController::class, 'destroy']);

$router->get('/authors', [AuthorController::class, 'index']);

$router->get('/articles', [ArticleController::class, 'index']);
$router->get('/articles/show', [ArticleController::class, 'show']);
$router->get('/articles/create', [ArticleController::class, 'create']);
$router->get('/articles/edit', [ArticleController::class, 'edit']);
$router->post('/articles/store', [ArticleController::class, 'store']);
$router->get('/articles/delete', [ArticleController::class, 'destroy']);
