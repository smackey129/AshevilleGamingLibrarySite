<?php 

class AgeRating extends DatabaseObject {
  static protected $table_name = "esrb_ratings_age";
  static protected $db_columns = ['id', 'esrb_rating_age', 'min_age'];

  public $id;
  public $esrb_rating_age;
  public $min_age;

  public function __construct($args=[]) {
    $this->esrb_rating_age = $args['esrb_rating_age'] ?? '';
    $this->min_age = $args['min_age'] ?? '';
  }
}