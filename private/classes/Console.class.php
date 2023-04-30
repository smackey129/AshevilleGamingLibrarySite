<?php 

/**
 * A class that represents an object in the consoles_con table
 */
class Console extends DatabaseObject {
  static protected $table_name = "consoles_con";
  static protected $db_columns = ['id', 'name_con'];

  public $id;
  public $name_con;

  /**
   * A constructor function for a Console Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
  public function __construct($args=[]) {
    $this->name_con = $args['name_con'] ?? '';
  }
}