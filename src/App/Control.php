<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\App;
use ControlAltKaboom\Srcre\App\Config;

/**
 * Description of Control
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class Control {

  protected $common = NULL;

  private static $instance = NULL;

  /**
   * Singleton method - Enables a common source.
   * @return \ControlAltKaboom\Srcre\App\Config
  */    
  public static function instance() {
    $className = __CLASS__;
    if( !(self::$instance instanceof $className) ):
      self::$instance = new $className;
    endif;   
    return self::$instance;
  }
  
  private function __construct() {}
  
  public function initialize() {
    
    // Walk through the enable module
    
  }

  public function setGlobal($key, $val) {
    $this->common[$key] = $val;
    return $this;
  }

  public function getGlobal($key) {
    return $this->common[$key];
  }

  
  public function debug($var, $toString=FALSE) {
    $ret = "<pre>" . print_r($var, TRUE) . "</pre>";
    if($toString == TRUE):
      return $ret;
    else:
      print $ret;
    endif;
  }
  
  
  public function tpl($tpl, $args=NULL) {
    $args['common'] = &$this->common;
    $args['walrus'] = "inside walrus masters !";
    $path = Config::instance()->get("path", "tpl");
    include "{$path}/{$tpl}.tpl";

  }
  
  public function get_tpl($tpl, $args=NULL) {
    ob_start();
    $this->tpl($tpl, $args);
    return ob_get_clean();

    }
  
}
