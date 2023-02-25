<?php 

class Company extends DatabaseObject {
  static protected $table_name = "companies_cmp";
  static protected $db_columns = ['id', 'name_cmp'];

  public $id;
  public $name_cmp;

  public function __construct($args=[]) {
    $this->name_cmp = $args['name_cmp'] ?? '';
  }
}