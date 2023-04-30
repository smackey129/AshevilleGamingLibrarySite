<?php

/**
 * Connects to the database outlined in the db_credentials file
 *
 * @return  mysqli  The mysqli connection outlined in the db_credentials file
 */
function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}

/**
 * Confirms that the database connection works and prints an error if it doesn't and exits the program
 *
 * @param   mysqli  $connection  The connection to be tested
 *
 */
function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

/**
 * Closes the database connection
 *
 * @param   mysqli  $connection  The connection to be disconnected
 */
function db_disconnect($connection) {
  if(isset($connection)) {
    $connection->close();
  }
}

?>
