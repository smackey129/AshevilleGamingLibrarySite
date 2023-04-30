<?php 

/**
 * A class that represents an object in the genres_gnr table
 */
class Genre extends DatabaseObject {
  static protected $table_name = "genres_gnr";
  static protected $db_columns = ['id', 'genre_gnr'];

  public $id;
  public $genre_gnr;

  /**
   * A constructor function for a Genre Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
  public function __construct($args=[]) {
    $this->genre_gnr = $args['genre_gnr'] ?? '';
  }
}