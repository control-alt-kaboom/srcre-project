<?php

/*
  @file
 */

namespace ControlAltKaboom\Srcre\UserModel;

/**
 * Methods used for validation of User-Entity data points.
 * 
 * TO-DO:
 * -- Add in hooks for Events to append additional module-specific validation, 
 *    such as in the case of passwords, it should do checks to see if the new 
 *    password applies to the password-policy module
 *
 * @author Brian Snopek <brian.snopek@gmail.com>
*/
class UserValidator {
  
  
  /**
   * Wrapper - Deligates the applicable method for the given type/value.
   * @param string $type  - The type of validation to run
   * @param mixed $value  - The value to validate
   * @return boolean      - The validation result/status
   */
  public function validate($type, $value)
  {
    switch($type):
      case "id":      return $this->validateId($value);
      case "name":    return $this->validateName($value);
      case "email":   return $this->validateEmail($value);
      case "status":  return $this->validateStatus($value);
    endswitch;
    return FALSE;
  }  

  /**
   * Validate the ID.
   * @param string $id
   * @return boolean - The validation result/status
   */
  public function validateId($id)
  {
    return ( filter_var($id, FILTER_VALIDATE_INT)  === FALSE )
      ? FALSE
      : TRUE;
  }
  
  /**
   * Validates the user-name
   * @param string $name
   * @return boolean - The validation result/status
   */
  public function validateName($name)
  {
    // TO-DO
    // -- User-Names must be unique
    return TRUE;
  }

  /**
   * Validate the user-email
   * @param string $email
   * @return boolean - The validation result/status
   */
  public function validateEmail($email)
  {
    // TO-DO
    // -- User-Email-Addresses must be unique
    return ( filter_var($email, FILTER_VALIDATE_EMAIL)  === FALSE )
      ? FALSE
      : TRUE;
  }  

  /**
   * Validate the user-status
   * @param string $status
   * @return boolean - The validation result/status
   */
  public function validateStatus($status)
  {
    return (UserStatus::valid($status) === TRUE)
      ? TRUE 
      : FALSE;
  }
  
}