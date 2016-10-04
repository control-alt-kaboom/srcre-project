<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\App;

/**
 * Methods used with the abstract classes that define module properties. 
 * -- This allows for classes to be created with constants that define params used within
 *    the application that can be called via a static context, but since declared as as
 *    abstract constants, cannot be instantiated or overwritten.
 * -- These config-sets require a few methods to be usefull though, and as such extend
 *    this class to inherrit them.
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
abstract class AbstractConfigSet {

  /**
   * Return an array of the defined class-constants
   * @return array
   */
  public static function getAvailable() {
    $oClass = new \ReflectionClass(get_called_class());
    return $oClass->getConstants();    
  }

  /**
   * Check if the supplied argument is a value present in the defined constants.
   * @param   string  - The value to check for.
   * @returns boolean - If the value exists or not.
  */
  public static function valid($status) {
    return (in_array($status, self::getAvailable(), TRUE))
      ? TRUE
      : FALSE;
  }  

  /**
   * Return the constant-name of the passed value.
   * @param   mixed   - The value to get the reverse of
   * @returns string  - The name of the matching constant
   */
  public static function reverse($status) {
    $avail = array_flip(self::getAvailable());
    return $avail[$status];
  }

}
