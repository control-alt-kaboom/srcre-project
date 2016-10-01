<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\EventManager;

/**
 * Description of EventDispatcherInterface
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
interface EventDispatcherInterface {

  public function addListener( $eventName, $listener );
  public function getListeners( $eventName );
  public function dispatch( $eventName, GenericEvent &$event );
  
  
}
