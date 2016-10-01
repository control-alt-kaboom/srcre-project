<?php

/* 
@file
 */

namespace ControlAltKaboom;

error_reporting(E_ALL ^E_NOTICE);
ini_set('display_errors', 1);

# Load in Dependencies
require_once __DIR__ ."/vendor/autoload.php";


use ControlAltKaboom\Srcre\App\Config;
use ControlAltKaboom\Srcre\App\Control;
use ControlAltKaboom\Srcre\EventManager\EventDispatcher;

// Set the app-paths
Config::instance()->setGroup("path",
  [ "libs" => __DIR__."/src",
    "tpl"  => __DIR__."/app/tpl",
  ]);


// Initialize the EventManager
$eventManager = new EventDispatcher();




// Initialize the app
Control::initialize();

