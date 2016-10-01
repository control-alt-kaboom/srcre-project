<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\App;

/**
 * App-Configuration Item
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class ConfigItem implements \IteratorAggregate{

  /**
   * @var boolean Establishes if this item can be changed 
   */
  protected $locked;
  
  /**
   * @var string - The name of the config-item.
   */
  protected $name;

  /**
   * @var array - An array-collection of ConfigItems for group-type objects.
   */
  protected $options;

  /**
   * @var mixed - A single value used on item-type objects.
   */
  protected $value;

  /**
   * @var string - The type of ConfigItem - either group or item.
   */
  protected $type;

  /**
   * Basic constructor.
   * @param string $type - The type of ConfigItem being created.
   */
  public function __construct($type, $name) {
    switch($type):
      case "item": $this->type = "item";break;
      case "group": $this->type = "group";break;
    endswitch;

    $this->setName($name);
    
  }

  /**
   * Allows for the object to be traversed.
   * @return \ArrayIterator
   */
  public function getIterator() {
    return new \ArrayIterator($this->options);
  }

  /**
   * Sets the name of the object
   * @param string $name
   * @return \ControlAltKaboom\Srcre\App\ConfigItem
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Gets the name of the object
   * @return string
   */
  public function getName() {
    return $this->name;
  }
  
  /**
   * Gets the specified option value
   * @param string $key
   * @return mixed - the established value.
   * @throws Exception - When the requested item has not been defined.
   */
  public function get($key=NULL) {
    if($this->type == "item"):
      return $this->value;
    endif;
    if (isset($this->options[$key]) ):
      return $this->options[$key];
    endif;
    throw new Exception("Attempt to access an undefined app-config property: {$key}");
  }

  /**
   * Sets the value
   * @param string $setting
   * @param mixed $value
   * @return \ControlAltKaboom\Srcre\App\ConfigItem
   * @throws Exception - If the group has been write-locked.
   */
  public function set($setting, $value=NULL) {
 
    if($this->type == "item"):
      if($this->locked() === FALSE):
        $this->value = $setting;
        return $this;
      else:
        throw new Exception("Attempt to modify a locked app-config property: {$setting}");
      endif;
    endif;
    if( isset($this->options[$setting]) && $this->options[$setting] instanceof ConfigItem):
      $this->options[$setting]->set($value);
      return $this;
    else:
      $this->options[$setting] = Config::instance()->factory("item", $setting);
      $this->options[$setting]->set($value);
      return $this;
    endif;
  }
  
  /**
   * Sets the write-lock status.
   * @param boolean $status
   * @return \ControlAltKaboom\Srcre\App\ConfigItem
  */
  public function setLocked($status) {
    $this->locked = $status;
    return $this;
  }
 
  /**
   * @return boolean - the set locked status
   */
  public function locked() {
    return ($this->locked === TRUE) ? TRUE : FALSE;
  }

  /**
   * Returns the objects value as a string
   * @return string
   */
  public function __toString() {
    $src = ($this->type == "item") ? $this->value : $this->options;
    return (is_string($src)) ? $src : print_r($src,true);
  }

}  
