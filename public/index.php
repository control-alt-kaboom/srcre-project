<?php

# Init the app
require_once "../config.php";
use ControlAltKaboom\Srcre\App\Config;
use ControlAltKaboom\Srcre\App\Control;
use ControlAltKaboom\Srcre\App\Helper;

use ControlAltKaboom\Srcre\EventManager;
use ControlAltKaboom\Srcre\EventManager\GenericEvent;

use ControlAltKaboom\Srcre\UserModel\UserStatus;
use ControlAltKaboom\Srcre\UserModel\UserEntity;

Control::instance()->setGlobal("site.name", "ControlAltKaboom - The Source-RE Project")
    ->setGlobal("site.random", "foobar")
    ->setGlobal("walrus", "Our Overload Masters")
    ->setGlobal("foobar", "All Hail The Hypno-Walri!");


//
//$user = new UserEntity([
//  "id" => 666,
//  "name" => "Hypno-Walrus",
//  "email" => "overlord@warli-gods.gov",
//  "status" => UserStatus::ENABLED,
//  
//]);
//


abstract class TestStatus
{
  abstract protected function TestMethod($testParam);
  
}

class ConcreteStatus extends TestStatus {
  
  public function TestMethod( UserEntity $testParam) {
    //do something
    $testReturn = $testParam;
    return $testReturn;
  }

  
  }




ob_start();
print "<h1>Sandbox:</h1>";

$user->setId("420");


print "EmailStatus: {$status}<br/>";





Helper::instance()->debug($user);


$content = ob_get_clean();
Control::instance()->tpl("header");
Control::instance()->tpl("navbar");
print $content;
Control::instance()->tpl("footer");

