<?php

# Init the app
require_once "../config.php";
use ControlAltKaboom\Srcre\App\Config;
use ControlAltKaboom\Srcre\App\Control;

use ControlAltKaboom\Srcre\EventManager;
use ControlAltKaboom\Srcre\EventManager\GenericEvent;

Control::instance()->setGlobal("site.name", "ControlAltKaboom - The Source-RE Project")
    ->setGlobal("site.random", "foobar")
    ->setGlobal("walrus", "Our Overload Masters")
    ->setGlobal("foobar", "All Hail The Hypno-Walri!");

Control::instance()->debug($eventManager);


class LayoutEvents {

  
  
}

Control::instance()->tpl("header");
Control::instance()->tpl("navbar");
Control::instance()->tpl("footer");

