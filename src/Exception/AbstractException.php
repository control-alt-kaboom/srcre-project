<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\Exception;

/**
 * Abstract Base class for all custom-exceptions
 * 
 * @author Brian Snopek <brian.snopek@gmail.com>
*/
abstract class AbstractException extends \Exception
{
  protected $message = 'Unknown exception';     // Exception message
  private   $string;                            // Unknown
  protected $code    = 0;                       // User-defined exception code
  protected $file;                              // Source filename of exception
  protected $line;                              // Source line of exception
  private   $trace;                             // Unknown

  public function __construct($message = null, $code = 0)
  {
    if (!$message):
      throw new $this('Unknown '. get_class($this));
    endif;
    parent::__construct($message, $code);
  }
    
  public function __toString()
  {
    return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
                                . "{$this->getTraceAsString()}";
  }
}
