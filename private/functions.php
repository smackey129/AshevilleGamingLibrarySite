<?php

/**
 * Creates urls starting from the root server
 *
 * @param   String  $script_path  The url after the root server
 *
 * @return  String                The full url to be used
 */
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

/**
 * URL Encodes a given string
 *
 * @param   String  $string  The String to be encoded
 *
 * @return  Stirng           The URL Encoded String
 */
function u($string="") {
  return urlencode($string);
}

/**
 * Raw URL Encodes a given string
 *
 * @param   String  $string  The String to be encoded
 *
 * @return  Stirng           The Raw URL Encoded String
 */
function raw_u($string="") {
  return rawurlencode($string);
}

/**
 * Converts characters to html entities
 *
 * @param   String  $string  The String to be converted
 *
 * @return  String           The converted string
 */
function h($string="") {
  return htmlspecialchars($string);
}

/**
 * Sends a 404 Error
 *
 */
function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

/**
 * Sends a 500 Error
 *
 */
function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

/**
 * Redirects to a given page
 *
 * @param   String  $location  The link to be redirected to
 *
 */
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

/**
 * Checks whether the the page was reached through a POST request
 */
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Checks whether the the page was reached through a GET request
 */
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Creates a search term for a sql statement for a given field in a given database
 *
 * @param   String[]  $term       An associative array of search terms
 * @param   String  $fieldname The field to be searched
 * @param   mysqli  $database   The database to be searched
 *
 * @return  String            Search term in the format of ($fieldname ='$term[0]' OR $fieldname = '$term[1]')
 */
function createSearchTerm($term, $fieldname, $database){
  if(isset($term)){
    $searchString = "($fieldname ='" . $database->escape_string($term[0]) . "'";
    for($i = 1; sizeof($term) > $i; $i++) {
      $searchString = $searchString . " OR $fieldname ='" . $database->escape_string($term[$i]) . "'";
    }
    $searchString = $searchString . ")";
    return $searchString;
  }
}

/**
 * Creates a random String of a given length using the given characters
 *
 * @param   int     $length    The length of the generated string
 * @param   string  $keyspace  The characters to be used in the string
 *
 * @return  string             The generated string
 */
function random_str($length = 64, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
  if ($length < 1) {
      throw new \RangeException("Length must be a positive integer");
  }
  $pieces = [];
  $max = mb_strlen($keyspace, '8bit') - 1;
  for ($i = 0; $i < $length; ++$i) {
      $pieces []= $keyspace[random_int(0, $max)];
  }
  return implode('', $pieces);
}
?>
