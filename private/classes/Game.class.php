<?php

class Game extends DatabaseObject {

  static protected $table_name = "games_gme";
  static protected $db_columns = ['id', 'name_gme', 'id_age_gme', 'id_gnr_gme', 'id_cmppub_gme'];

  public $id;
  public $name_gme;
  public $id_age_gme;
  public $id_gnr_gme;
  public $id_cmppub_gme;
  
  public function __construct($args=[]) {
    $this->name_gme = $args['name_gme'] ?? '';
    $this->id_age_gme = $args['id_age_gme'] ?? '';
    $this->id_gnr_gme = $args['id_gnr_gme'] ?? '';
    $this->id_cmppub_gme = $args['id_cmppub_gme'] ?? '';
  }

  protected function validate() {
    $this->errors = [];
  
    if(is_blank($this->name_gme)) {
      $this->errors["name"][] = "Game Name cannot be blank";
    }

    if(is_blank($this->id_age_gme)) {
      $this->errors["age"][] = "Please select an age rating";
    }

    if(is_blank($this->id_gnr_gme)) {
      $this->errors["genre"][] = "Please select a genre";
    }

    if(is_blank($this->id_cmppub_gme)) {
      $this->errors["publisher"][] = "Please select a publisher";
    }

    return $this->errors;
  }

  public function getRating() {
    $sql = "SELECT esrb_rating_age FROM esrb_ratings_age WHERE id='" . $this->id_age_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['esrb_rating_age'];
  }

  public function getMinAge() {
    $sql = "SELECT min_age FROM esrb_ratings_age WHERE id='" . $this->id_age_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['min_age'];
  }

  public function getGenre() {
    $sql = "SELECT genre_gnr FROM genres_gnr WHERE id='" . $this->id_gnr_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['genre_gnr'];
  }

  public function getPublisher() {
    $sql = "SELECT name_cmp FROM companies_cmp WHERE id='" . $this->id_cmppub_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['name_cmp'];
  }

  public function getInventoryItems() {
    $sql = "SELECT * FROM inventory_inv WHERE id_gme_inv='" . $this->id . "'";
    return(static::find_by_sql($sql));
  }

  public static function getGamesAlphabetized() {
    $sql = "SELECT * FROM " . static::$table_name . " ORDER BY name_gme";
    return(static::find_by_sql($sql));
  }
}

?>