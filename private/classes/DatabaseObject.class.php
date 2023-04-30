<?php

/**
 * A class that represents an object in a database
 */
class DatabaseObject {

  static protected $database;
  static protected $table_name = "";
  static protected $db_columns = [];
  public $errors = [];
  public $id;

  /**
   * Sets the database connection to be used by the DatabaseObject class and any subclasses
   *
   * @param   mysqli  $database  The database connection to be used by the DatabaseObject Class and any subclasses
   */
  static public function set_database($database) {
    self::$database = $database;
  }

  /**
   * Finds an array of DatabaseObjects (or subclasses) using the provided SQL Statement
   *
   * @param   String  $sql  The SQL Statement to be used by the function
   *
   * @return  DatabaseObject[] An array of DatabaseObjects (or subclasses) corresponding to the given SQL Statement or an empty array if nothing is found
   */
  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed!!");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  /**
   * Returns an array of all DatabaseObjects (or subclasses) in the given classes table
   *
   * @return  DatabaseObject[]  an array of all DatabaseObjects (or subclasses) in the given classes table
   */
  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  /**
   * Creates an object based on the table record with the given id
   *
   * @param   string  $id  The value in the "id" field of the classes table
   *
   * @return  DatabaseObject An object that matches with the provided id, or false if none is found.
   */
  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  /**
   * Creates an object based on a an associative array
   *
   * @param   array  $record  An associative array with indexes that match with the properties of a class
   *
   * @return  DatabaseObject  A DatabaseObject with properties that match up with the record's fields
   */
  static protected function instantiate($record) {
    $object = new static;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }


  /**
   * Checks for errors and returns an array with errors depending on the subclass
   *
   * @return  String[]  An array of errors
   */
  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

  /**
   * Creates a record in the database based on the DatabaseObject
   *
   * @return  array  Result of the record creation query. False if it did not work.
   */
  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $sql = str_replace("''", "NULL", $sql);
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;

    }
    return $result;
  }

  /**
   * Updates an existing record based on the DatabaseObject
   *
   * @return  array  Result of the record update query. False if it did not work.
   */
  protected function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
       $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $sql = str_replace("''", "NULL", $sql);
    $result = self::$database->query($sql);
    return $result;
  }

  /**
   * Either creates or updates a record in the database. 
   *
   * @return  array  Returns the result of the save query if the operation succeeds, or false if the operation fails
   */
  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  /**
   * Assigns values in an associative array to their associated properties
   *
   * @param   array  $args  An associative array with keys that correspond to an object's properties
   *
   */
  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        // if($value == "") {
        //   $value = "NULL";
        // }
        $this->$key = $value;
      }
    }
  }

  /**
   * Returns an array of all columns associated with a DatabaseObject class
   *
   * @return  String[]  An array of all columns for a given DatabaseObject class (excluding the id)
   */
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  /**
   * Sanatizes attributes to prevent sql injection
   *
   * @return array  An array of sanatized values
   */
  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  /**
   * Deletes the record associated with this object from the database
   *
   * @return  array Result of the record delete query. False if it did not work.
   */
  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;

    // After deleting, the instance of the object will still
    // exist, even though the database record does not.
    // This can be useful, as in:
    //   echo $user->first_name . " was deleted.";
    // but, for example, we can't call $user->update() after
    // calling $user->delete().
  }

}

?>
