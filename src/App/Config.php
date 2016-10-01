<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\App;

use ControlAltKaboom\Srcre\App\ConfigItem;

/**
 * Enables the definition, storage and access of application-level configuration options.
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */

class Config {

  /**
   * @var array - The option-groups established in the global-collection 
   */
  protected $groups;
  
  /**
   * Singleton method - Enables a common source.
   * @return \ControlAltKaboom\Srcre\App\Config
  */    
  public static function instance() {
    static $instance;
    $className = __CLASS__;
    if( !($instance instanceof $className) ):
      $instance = new $className;
    endif;   
    return $instance;
  }

  /**
   * Creates a group, and adds the supplied options.
   * @param string $group - The group-key
   * @param array $options - An array of key-value pairs to be set on the group
  */
  public function setGroup($group, $options) {

    $this->groups[$group] = $this->factory("group", $group);
    
    foreach($options AS $key => $val):
      $this->getGroup($group)->set($key, $val);
    endforeach;
      
  } 

  /**
   * Gets the specified group
   * @param string $group
   * @return \ControlAltKaboom\Srcre\App\ConfigItem
   */
  public function getGroup($group) {
    return $this->groups[$group];
  }

  /**
   * Gets a groups config-option
   * @param string $group
   * @param string $key
   * @return mixed - The defined value of the option.
  */
  public function get($group, $key) {
    return $this->getGroup($group)->get($key);
  }

  /**
   * Sets an option on a group
   * @param string $group - an existing group
   * @param string $key - the key of the option to be set
   * @param mixed $value - the value of the option to be set
   * @return \ControlAltKaboom\Srcre\App\Config
   * @throws Exception - When the group is write-locked
  */
  public function set($group, $key, $value) {
    if($this->getGroup($group)->locked() === TRUE):
        throw new Exception("Attempt to modify a locked app-config group: {$group}");
    endif;
    $this->getGroup($group)->set($key, $value);
    return $this;
  }

  /**
   * Factory method for creating new configuration items.
   * @param string $type - item|group - the type of ConfigItem to be created.
   * @param string $name - The name to be assigned to the ConfigItem.
   * @return \ControlAltKaboom\Srcre\App\ConfigItem
  */
  public function factory($type, $name) {
    return new ConfigItem($type, $name);
  }
  
}
