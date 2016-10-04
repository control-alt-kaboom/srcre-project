<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\UserModel;
use ControlAltKaboom\Srcre\App\AbstractConfigSet;

/**
 * Handles the validation and consistency of User Status types
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
abstract class UserStatus extends AbstractConfigSet {

  const DELETED   = -1;
  const DISABLED  = 0;
  const ACTIVE    = 1;
  const ENABLED   = 1;
  const BLOCKED   = 2;
  
}
