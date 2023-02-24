<?php 

class Console extends DatabaseObject {
  static protected $table_name = "consoles_con";
  static protected $db_columns = ['id', 'name_con'];

  public $id;
  public $name_con;

  public function __construct($args=[]) {
    $this->name_con = $args['name_con'] ?? '';
  }
}