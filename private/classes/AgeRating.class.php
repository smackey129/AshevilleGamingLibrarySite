<?php 

/**
 * A class that represents an object in the esrb_ratings_age table
 */
class AgeRating extends DatabaseObject {
  static protected $table_name = "esrb_ratings_age";
  static protected $db_columns = ['id', 'esrb_rating_age', 'min_age'];

  public $id;
  public $esrb_rating_age;
  public $min_age;

  /**
   * A constructor function for an Age Rating Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
  public function __construct($args=[]) {
    $this->esrb_rating_age = $args['esrb_rating_age'] ?? '';
    $this->min_age = $args['min_age'] ?? '';
  }
}