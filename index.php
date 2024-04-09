<?php

use App\Core\Router;
use App\Controllers\TaskController;
use App\Core\Request;

require '_init.php';

// $uri = trim($_SERVER['REQUEST_URI'], '/');


Router::make()
    ->get('', [TaskController::class, 'index'])
    ->post('task/create', [TaskController::class, 'create'])
    ->get('task/delete', [TaskController::class, 'delete'])
    ->get('task/update', [TaskController::class, 'update'])
    ->resolve(Request::uri(), Request::method());
