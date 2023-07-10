<?php

require '../vendor/autoload.php';

defined("PROJECT_ROOT") or DEFINE("PROJECT_ROOT", dirname(__DIR__));
defined('PROJECT_VIEW_DIR') or DEFINE('PROJECT_VIEW_DIR' , PROJECT_ROOT . '/resources/views');
defined('PROJECT_LAYOUT_DIR') or DEFINE('PROJECT_LAYOUT_DIR' , PROJECT_ROOT . '/resources/layouts');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Components\Session;

session_start();
Session::getInstance()->generateCsrf();

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();