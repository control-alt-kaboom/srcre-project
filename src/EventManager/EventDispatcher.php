<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\EventManager;

use ControlAltKaboom\Srcre\EventManager\EventDispatcher;
use ControlAltKaboom\Srcre\EventManager\GenericEvent;

/**
 * Description of EventDispatcher
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class EventDispatcher implements EventDispatcherInterface {

  protected $listeners;
  
  public function addListener($eventName, $listener) {
    $this->listeners[$eventName][] = $listener;
  }
  
  public function getListeners($eventName = NULL) {

    if ($eventName !== NULL):
      return (isset($this->listeners[$eventName])) 
        ? $this->listeners[$eventName]
        : array();
    endif;
    
  }

  public function dispatch($eventName, GenericEvent &$event) {

    if (null === $event):
      $event = new GenericEvent();
    endif;
    
    if ($listeners = $this->getListeners($eventName)):

      foreach ($listeners as $listener):
//        if ($event->isPropagationStopped()):
//          break;
//        endif;
        call_user_func($listener, $event, $eventName, $this);
      endforeach;

    endif;
      
    return $event;

    }
  
  
}
