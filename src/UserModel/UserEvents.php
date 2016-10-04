<?php


namespace ControlAltKaboom\Srcre\UserModel;
use ControlAltKaboom\Srcre\App\AbstractConfigSet;
use ControlAltKaboom\Srcre\EventManager\GenericEvent;
use ControlAltKaboom\Srcre\EventManager\EventDispatcher;

/**
 * Handles the validation and consistency of UserModel Events
 * -- Each of the constants represent an event paired with a callback 
 *    method - expecting that the method is available on the subscriber 
 *    object representing the event-handlers.
 * 
 * The events enabled for the UserModel are as follows:
 * 
 * -> ON_CREATE          = $handler->onCreate()
 *                        Hooks into the user-creation process
 * -> ON_UPDATE          = $handler->onUpdate()
 *                        Hooks into the user-update process as a general
 *                        process, which can bubble-down into the various
 *                        other update processes.
 * -> ON_DELETE          = $handler->onDelete()
 *                        Hooks into the user-deletion process. Typically
 *                        a user is never physically deleted, but rather a
 *                        deleted-status is set on the record-set. As such
 *                        an event-bubble-down into the status-update methods
 *                        should be expected.
 * -> ON_STATUS_ENABLE   = $handler->onStatusEnable()
 *                        Hooks into the status-update process, when a given
 *                        user's status is set to 'ENABLED'
 * -> ON_STATUS_DISABLE  = $handler->onStatusDisable()
 *                        Hooks into the status-update process, when a given
 *                        user's status is set to 'DISABLED'
 * -> ON_STATUS_BLOCK    = $handler->onStatusBlock()
 *                        Hooks into the status-update process, when a given
 *                        user's status is set to 'BLOCKED'
 * -> ON_UPDATE_AUTH     = $handler->onUpdateAuth()
 *                        Hooks into the user-update process, specifically when
 *                        a property of the users primary-data (auth) is updated
 * -> ON_UPDATE_META     = $handler->onUpdateMeta
 *                        Hooks into the user-update process, specifically when
 *                        a property of the users meta-data is updated
 * -> ON_UPDATE_PASSWORD = $handler->onUpdatePassword()
 *                        Hooks into the user-update process, specifically when
 *                        the users password is updated
 * 
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
abstract class UserModelEvents extends AbstractConfigSet 
{
  const ON_CREATE           = "onCreate";
  const ON_UPDATE           = "onUpdate";
  const ON_DELETE           = "onDelete";
  const ON_STATUS_ENABLE    = "onStatusEnable";
  const ON_STATUS_DISABLE   = "onStatusDisable";
  const ON_STATUS_BLOCK     = "onStatusBlock";
  const ON_UPDATE_AUTH      = "onUpdateAuth";
  const ON_UPDATE_META      = "onUpdateMeta";
  const ON_UPDATE_PASSWORD  = "onUpdatePassword";

  abstract protected function onCreate(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onUpdate(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onDelete(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onStatusEnable(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onStatusDisable(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onStatusBlock(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onUpdateAuth(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onUpdateMeta(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  abstract protected function onUpdatePassword(GenericEvent &$event, $eventName, EventDispatcher &$dispatcher);
  
}
