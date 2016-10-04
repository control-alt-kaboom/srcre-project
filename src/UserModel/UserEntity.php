<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\UserModel;

use ControlAltKaboom\Srcre\UserModel\UserValidator;
use ControlAltKaboom\Srcre\UserModel\UserManager;
use ControlAltKaboom\Srcre\UserModel\UserModelException;
use ControlAltKaboom\Srcre\App\Helper;

/**
 * Representation of a User Entity
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
 */
class UserEntity 
{
  /**
   * @var array   - Primary user data-points
   */
  protected $data = NULL;

  /**
   * @var array   - Custom user data-points (unserialized)
   */
  protected $meta = NULL;
  
  /**
   * @var object  - \ControlAltKaboom\Srcre\UserModel\UserValidator 
   */
  protected $validator = NULL;
  
  /**
   * @var object  - \ControlAltKaboom\Srcre\UserModel\UserManager
   */
  protected $manager = NULL;

  /**
   * General Constructor - Initialize the data-points with any that are passed
   * @param array $data - An array of user data-points.
   */
  public function __construct( $data = NULL ) 
  {
    (isset($data['id']))      ? $this->setId($data['id'])         : NULL;
    (isset($data['name']))    ? $this->setName($data['name'])     : NULL;
    (isset($data['email']))   ? $this->setEmail($data['email'])   : NULL;
    (isset($data['status']))  ? $this->setStatus($data['status']) : NULL;
  }

  /**
   * Sets the UserValidator object.
   * @param  \ControlAltKaboom\Srcre\UserModel\UserValidator $validator
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity (self)
   */
  public function setValidator($validator = NULL) 
  {
    if ( is_null($validator) ):
      $validator = new UserValidator;
    endif;
    $this->validator = $validator;
    return $this;
  }

  /**
   * Gets the UserValidator object, setting if not already present
   * @return \ControlAltKaboom\Srcre\UserModel\UserValidator
   */
  public function validator()
  {
    if ( is_null($this->validator) ):
      $this->setValidator();
    endif;
    return $this->validator;
  }

  /**
   * Sets the UserManager object.
   * @param  \ControlAltKaboom\Srcre\UserModel\UserManager $manager
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity (self)
   */
  public function setManager($manager = NULL)
  {
    if ( is_null($manager) ):
      $manager = new UserManager;
    endif;
    $this->manager = $manager;
    return $this;
  }

  /**
   * Gets the UserManager object, setting if not already present
   * @return \ControlAltKaboom\Srcre\UserModel\UserValidator
   */
  public function manager() 
  {
    if ( is_null($this->manager) ):
      $this->setManager();
    endif;
    return $this->manager;
  }
 
  /**
   * Magic-Method for getting primary entity properies.
   * @param  string $key  - The name of the property requested
   * @return mixed        - The value of the property requested
   */
  public function __get($key) 
  {
    if ( isset($data[$key]) ):
      return $this->data[$key];
    endif;
  }

  /**
   * Magic-Method used mainly for protecting primary entity data-points.
   * @param string $key - The name of the property to set
   * @param mixed  $val - The value of the property to set
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity
   * @throws UserModelException - When attempting to set a property defined as as a primary
   */
  public function __set($key, $val)
  {
    if ( isset($this->data[$key]) ):
      throw new UserModelException("Cannot mutate UserEntity properties directly. Use the applicable (and explicit) management method.");
    endif;
    $this->{$key} = $val;
    return $this;
  }

  /**
   * Sets the ID of the User
   * @param mixed $value  - The ID to set
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity
   * @throws UserModelException - When the ID is not of a valid format/type.
   */
  public function setId($value)
  {
    $valid = $this->validator()->validate("id", $value);
    if ($valid === TRUE):
      $this->data['id'] = $value;
      return $this;
    endif;
    throw new UserModelException(sprintf(
      "UserEntity Data Validation Error: '<b><i>%s</i></b>' is of incorrect format/type.", 
      "User-ID"
      ));
  }

  /**
   * Sets the name of the User
   * @param string $value - The name to set on the user
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity
   * @throws UserModelException - When the name is not of valid type/format.
   */
  public function setName($value)
  {
    $valid = $this->validator()->validate("name", $value);
    if ($valid === TRUE):
      $this->data['name'] = $value;
      return $this;
    endif;
    throw new UserModelException(sprintf(
      "UserEntity Data Validation Error: '<b><i>%s</i></b>' is of incorrect format/type.", 
      "User-Name"
      ));
  }
  
  /**
   * Sets the email address of the user
   * @param string $value - The email to set on the user.
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity
   * @throws UserModelException - When the email is not of valid type/format.
   */
  public function setEmail($value)
  {
    $valid = $this->validator()->validate("email", $value);
    if ($valid === TRUE):
      $this->data['email'] = $value;
      return $this;
    endif;
    throw new UserModelException(sprintf(
      "UserEntity Data Validation Error: '<b><i>%s</i></b>' is of incorrect format/type.", 
      "User-Email"
      ));
  }

  /**
   * Sets the status of the user
   * @param string $value - The status to set on the user
   * @return \ControlAltKaboom\Srcre\UserModel\UserEntity
   * @throws UserModelException - When the status is not of valid type/format.
   */
  public function setStatus($value)
  {
    $valid = $this->validator()->validate("status", $value);
    if ($valid === TRUE):
      $this->data['status'] = $value;
      return $this;
    endif;
    throw new UserModelException(sprintf(
      "UserEntity Data Validation Error: '<b><i>%s</i></b>' is of incorrect format/type.", 
      "User-Status"
      ));
  }
  
}
