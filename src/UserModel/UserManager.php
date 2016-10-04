<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\UserModel;

use ControlAltKaboom\Srcre\UserModel\UserEntity;
use ControlAltKaboom\Srcre\UserModel\UserModelException;
use ControlAltKaboom\Srcre\App\Helper;

/**
 * Manages the population and persistance of User-Entity data.
 * 
 * TO-DO:
 * -- Abstract storage types to allow for multiple modes of persistance, for
 *    example, we could store only in memory, or as XML, or a different database
 *    type.
 * -- Explore how we can reduce the coupling with the UserEntity class itself.
 *    For example - When getting/setting entity data from a row/array, we currently
 *    have the properties hard coded in this object - Therefore if we change the
 *    required properties of the UserEntity object, it would need to be reflected.
 *    -- We need to look at how to reduce this coupling, without over-engineering 
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class UserManager {
  
  protected $db = NULL;     // The enable database-abstraction layer
 
  public function getEntityFromRow($row)
  {
    // Format the output based on db-storage formatting
  }
 
  public function create( UserEntity $user )
  {
    // Create a new user
  }

  public function update( UserEntity $user )
  {
    // Update an existing user
  }

  public function updateStatus( UserEntity $user )
  {
    // Update the user-status
  }
  
  public function updatePassword( UserEntity $user )
  {
    // Update the user-password
  }
  
  
}