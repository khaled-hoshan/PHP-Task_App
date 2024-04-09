<?php

use App\Core\App;
use App\Database\QuaryBuilder;
use App\Database\DBConnection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


require 'vendor/autoload.php';


App::set('config', require 'config.php');

$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('queries.log', Logger::INFO));

QuaryBuilder::make(
    DBConnection::make(App::get('config')['database']),
    $log
);
