<?php

/**
 * A class that represents an object in the games_gme table
 */
class Game extends DatabaseObject {

  static protected $table_name = "games_gme";
  static protected $db_columns = ['id', 'name_gme', 'id_age_gme', 'id_gnr_gme', 'id_cmppub_gme'];

  public $id;
  public $name_gme;
  public $id_age_gme;
  public $id_gnr_gme;
  public $id_cmppub_gme;
  
  /**
   * A constructor function for a Game Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
  public function __construct($args=[]) {
    $this->name_gme = $args['name_gme'] ?? '';
    $this->id_age_gme = $args['id_age_gme'] ?? '';
    $this->id_gnr_gme = $args['id_gnr_gme'] ?? '';
    $this->id_cmppub_gme = $args['id_cmppub_gme'] ?? '';
  }

  /**
   * Checks to see if the current properties of the object are valid.
   *
   * @return  string[]  An associative array of any validation errors
   */
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

  /**
   * Returns the ESRB Rating of a Game object
   *
   * @return  String  The ESRB Rating of the Game object
   */
  public function getRating() {
    $sql = "SELECT esrb_rating_age FROM esrb_ratings_age WHERE id='" . $this->id_age_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['esrb_rating_age'];
  }

  /**
   * Returns the Minimum Age Rating of a Game object
   *
   * @return  String  The Minimum Age Rating of the Game object
   */
  public function getMinAge() {
    $sql = "SELECT min_age FROM esrb_ratings_age WHERE id='" . $this->id_age_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['min_age'];
  }

  /**
   * Returns the Genre of a Game object
   *
   * @return  String  The Genre of the Game object
   */
  public function getGenre() {
    $sql = "SELECT genre_gnr FROM genres_gnr WHERE id='" . $this->id_gnr_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['genre_gnr'];
  }

  /**
   * Returns the Publisher of a Game object
   *
   * @return  String  The Publisher of the Game object
   */
  public function getPublisher() {
    $sql = "SELECT name_cmp FROM companies_cmp WHERE id='" . $this->id_cmppub_gme. "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['name_cmp'];
  }

  /**
   * Returns an array of Inventory Items that correspond to a given game
   *
   * @return  InventoryItem[]  An array of InventoryItem objects that correspond to the given game
   */
  public function getInventoryItems() {
    $sql = "SELECT * FROM inventory_inv WHERE id_gme_inv='" . $this->id . "'";
    return(static::find_by_sql($sql));
  }

  /**
   * Returns an array of all games in alphabetical order
   *
   * @return  Game[]  An array of all games in alphabetical order
   */
  public static function getGamesAlphabetized() {
    $sql = "SELECT * FROM " . static::$table_name . " ORDER BY name_gme";
    return(static::find_by_sql($sql));
  }
}

?>