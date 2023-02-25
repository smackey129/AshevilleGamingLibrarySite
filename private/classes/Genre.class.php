<?php 

class Genre extends DatabaseObject {
  static protected $table_name = "genres_gnr";
  static protected $db_columns = ['id', 'genre_gnr'];

  public $id;
  public $genre_gnr;

  public function __construct($args=[]) {
    $this->genre_gnr = $args['genre_gnr'] ?? '';
  }
}