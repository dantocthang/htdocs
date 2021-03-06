<?php
//session_start();

define("BASE_PATH",__DIR__);
define('ENCRYPTION_KEY','!@@#%_my_secret_key_for_encryption_@#$!&');

require "../vendor/autoload.php";

use Illuminate\Config\Repository;

$configPath= BASE_PATH . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;

$config = new Repository();

foreach (glob($configPath."*.php") as $phpFile){
    $config->set(
        basename($phpFile,'.php'),
        require_once "$phpFile"
    );
}

$dbConfig = $config->get("app.db");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Start request handler
$request=\App\Http\Request::createFromGlobals();

// Start Symfony Session Manager
$session=new \App\Http\Session\Session();
$session->start();

// Them sau khi them route
$routesPath = BASE_PATH . DIRECTORY_SEPARATOR . "routes" .DIRECTORY_SEPARATOR;
foreach (glob($routesPath . "*.php") as $phpFile){
    require_once "$phpFile";
}