<?php
/**
 * @file
 */

namespace ControlAltKaboom\Srcre\UserModel;

use ControlAltKaboom\Srcre\UserModel\UserModelEvents;
use ControlAltKaboom\Srcre\EventManager\GenericEvent;
use ControlAltKaboom\Srcre\EventManager\EventDispatcher;

/**
 * Event Handlers for the UserModel Events. 
 * -- See the Abstract UserModelEvents class for more detailed descriptions.
 * 
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class UserModelEventSubscriber extends UserModelEvents
{

  public function onCreate(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-creation event
  }
  public function onUpdate(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-update event
  }

  public function onDelete(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-delete event
  }

  public function onStatusEnable(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-status-enable event
  }

  public function onStatusDisable(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-status-disable event
  }

  public function onStatusBlock(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-status-block event
  }

  public function onUpdateAuth(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-update-auth event
  }

  public function onUpdateMeta(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-update-meta event
  }

  public function onUpdatePassword(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher)
  {
    // Hands the user-update-password event
  }
    
  
}
