<?php

  /**
   * Checks to see if a string is only whitespace or not
   *
   * @param   String  $value  The string to be tested
   *
   * @return  Boolean True if the string is empty, false if is not
   */
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  /**
   * Checks to see if the value is not blank
   *
   * @param   String  $value  The String
   *
   * @return  Boolean          True if it is not blank, false if it isn't
   */
  function has_presence($value) {
    return !is_blank($value);
  }

  /**
   * Checks to see if the string has a value greater than the given value
   *
   * @param   int  $value  The String to check
   * @param   String  $min    The minimum value
   *
   * @return  Boolean          True if the length of the string is greater than the specified minimum, false if it is not
   */
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  /**
   * Checks to see if the string has a value less than the given value
   *
   * @param   int  $value  The String to check
   * @param   String  $max    The maximum value
   *
   * @return  Boolean          True if the length of the string is less than the specified maximum, false if it is not
   */
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  /**
   * Checks to see if the string has a length equal to the given value
   *
   * @param   int  $value  The String to check
   * @param   String  $exact   The value to check against
   *
   * @return  Boolean          True if the length of the string equal to the specified value, false if it is not
   */
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  /**
   * Checks to see if a string is between two given values
   *
   * @param   String  $value    The String to check
   * @param   String[]  $options  An array of options with keys "min", "max", "exact"
   *
   * @return  Boolean            Returns true if all of the conditions are satisfied
   */
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Checks to see if a value is in a set
   *
   * @param   Integer  $value  The value to check for
   * @param   Integer[]  $set    The set to check against
   *
   * @return  Boolean          True if the value is in the set, false if not
   */
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  /**
   * Checks to see if a given value is not in a set
   *
   * @param   Integer  $value  The value to check for
   * @param   Integer[]  $set    The set to check against
   *
   * @return  Boolean          True if the value is not included, false if it is
   */
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  /**
   * Checks to see if a string has a particular substring
   *
   * @param   String  $value            The string to check
   * @param   String  $required_string  The substring to check for
   *
   * @return  Boolean                    True if the substring is present, false if it isn't
   */
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  /**
   * Checks to see if the string is in a valid email format
   *
   * @param   String  $value  The string to check
   *
   * @return  Boolean          True if the string is in a valid format, false if it isn't
   */
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

  /**
   * Checks to see if a username is already taken
   *
   * @param   String  $username    The username to be checked
   * @param   Integer  $current_id  The id of the user being checked
   *
   * @return  Boolean               True if the username is unique, false if it isn't
   */
  function has_unique_username($username, $current_id="0") {
    $user = User::find_by_username($username);
    if($user === false || $user->id == $current_id) {
      // is unique
      return true;
    } else {
      return false;
    }
  }

?>
