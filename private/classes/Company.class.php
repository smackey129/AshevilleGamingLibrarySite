<?php 

/**
 * A class that represents an object in the companies_cmp table
 */
class Company extends DatabaseObject {
  static protected $table_name = "companies_cmp";
  static protected $db_columns = ['id', 'name_cmp'];

  public $id;
  public $name_cmp;

  /**
   * A constructor function for a Company Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
  public function __construct($args=[]) {
    $this->name_cmp = $args['name_cmp'] ?? '';
  }
}