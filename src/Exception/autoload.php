<?php

/* 
@file
*/

namespace ControlAltKaboom\Srcre\Exception;

use ControlAltKabom\Srcre\Exception\AbstractException;
use ControlAltKabom\Srcre\Exception\ExceptionInterface;

function CustomExceptionHandler($e) 
{
    $_exceptionTemplate = [
      "type"      => get_class($e),
      "file"      => $e->getFile(),
      "line"      => $e->getLine(),
      "message"   => $e->getMessage(),
      "backtrace" => print_r($e->getTrace(),TRUE),
      "stack"     => print_r(debug_backtrace(),TRUE),
      "code"      => $e->getCode(),
      "previous"  => $e->getPrevious(),
      "exception" => $e
    ];
    require_once "tpl/exception.tpl";
}

set_exception_handler(__NAMESPACE__.'\\CustomExceptionHandler');
