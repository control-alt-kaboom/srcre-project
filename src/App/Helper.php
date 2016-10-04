<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\App;

/**
 * A class-based library of helper functions. Intended to be called within a
 * static context, but includes a singleton/instance method for unit-testing.
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class Helper {


private static $instance = NULL;

  /**
   * Singleton method - Enables a common source.
   * @return \ControlAltKaboom\Srcre\App\Helper
  */    
  public static function instance() {
    $className = __CLASS__;
    if( !(self::$instance instanceof $className) ):
      self::$instance = new $className;
    endif;   
    return self::$instance;
  }

  /**
   * Test if the supplied var is a serialized string, optionally unserializing it for validity
   * @param mixed $data
   * @param boolean $valid
   * @return boolean
   */
  public function isSerialized($data, $valid=FALSE) {

    // If its not a string, its not serialized
    if (is_string($data) === FALSE):
      return FALSE;
    endif;

    // Do a regex match for expected serialized patterns
    $test = preg_match("#^((N;)|((a|O|s):[0-9]+:.*[;}])|((b|i|d):[0-9.E-]+;))$#um", $data);
    
    // if try to unserialize and the objects dont exists in our scope, then it can fail 
    // - so we allow the option to just test if it looks serialized
    // - unless $valid is set to TRUE - return the result of the regex-test
    if($valid === TRUE):
      return $test;
    endif;

    try {
      
      $status = @unserialize($data);
      return ($status !== FALSE) ? TRUE : FALSE;
      
    } catch(Exception $e) {

      // Ooops - failed to unserialize ? 
      print "Exception on unserialize:";
      print "Status is: {$status}<br/>";;
      print "<pre>" . print_r($e,TRUE) . "</pre>";
     
    }
  }

  public function debug($data, $strMode = FALSE) {
    
    if($strMode == TRUE):
      return print_r($data);
    endif;

    print "<pre>" . print_r($data,TRUE) . "</pre>";
    
  }


  
}
