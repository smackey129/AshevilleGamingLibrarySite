<?php 

class InventoryItem extends DatabaseObject {

  static protected $table_name = "inventory_inv";
  static protected $db_columns = ["id", "id_gme_inv", "id_con_inv", "condition_inv", "id_usr_inv", "id_usrdonator_inv", "available_inv", "available_after_inv"];
  static public $conditions = ['Like New','Great','Good','Acceptable','Poor'];

  public $id;
  public $id_gme_inv;
  public $id_con_inv;
  public $condition_inv;
  public $id_usr_inv;
  public $id_usrdonator_inv;
  public $available_inv;
  public $available_after_inv;

  public function __construct($args=[]) {
    $this->id_gme_inv = $args['id_gme_inv'] ?? '';
    $this->id_con_inv = $args['id_con_inv'] ?? '';
    $this->condition_inv = $args['condition_inv'] ?? '';
    $this->id_usr_inv = $args['id_usr_inv'] ?? NULL;
    $this->id_usrdonator_inv = $args['id_usrdonator_inv'] ?? '';
    $this->available_inv = $args['available_inv'] ?? '0';
    $this->available_after_inv = $args['available_after_inv'] ?? date("Y/m/d");
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->id_gme_inv)) {
      $this->errors["game"][] = "Game cannot be blank.";
    } elseif(!(Game::find_by_id($this->id_gme_inv))) {
      $this->errors["game"][] = "Game not found";
    }

    if(is_blank($this->id_con_inv)) {
      $this->errors["console"][] = "Console cannot be blank.";
    } elseif(!(Console::find_by_id($this->id_gme_inv))) {
      $this->errors["console"][] = "Console not found";
    }

    if(is_blank($this->condition_inv)) {
      $this->errors["condition"][] = "Condition cannot be blank.";
    } 
  }

  public function getGame() {
    $sql = "SELECT name_gme FROM games_gme WHERE id='" . $this->id_gme_inv . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['name_gme'];
  }

  public function getConsole() {
    $sql = "SELECT name_con FROM consoles_con WHERE id='" . $this->id_con_inv . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['name_con'];
  }

  public function getCurrentUser() {
    $sql = "SELECT username_usr FROM users_usr WHERE id='" . $this->id_usr_inv . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    if(isset($result['username_usr'])) {
      return $result['username_usr'];
    }
    else {
      return "Not Currently Checked Out";
    }
  }

  public function getDonator() {
    $sql = "SELECT username_usr FROM users_usr WHERE id='" . $this->id_usrdonator_inv . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['username_usr'];
  }

  public function getAvailability() {
    if($this->available_inv) {
      return "Yes";
    }
    else {
      return "No";
    }
  }

  public static function getItemsAlphabetized() {
    $sql = "SELECT inventory_inv.* FROM inventory_inv INNER JOIN games_gme ON games_gme.id = inventory_inv.id_gme_inv ORDER BY name_gme";
    return(static::find_by_sql($sql));
  }

  public static function search($terms){
    $sql = "SELECT inventory_inv.* FROM inventory_inv INNER JOIN games_gme ON games_gme.id = inventory_inv.id_gme_inv INNER JOIN companies_cmp ON games_gme.id_cmppub_gme = companies_cmp.id INNER JOIN consoles_con ON inventory_inv.id_con_inv = consoles_con.id WHERE ";

    //Check the name field
    $namestring = "name_gme LIKE '%" . self::$database->escape_string($terms["name"]). "%'";
    $sql = $sql . $namestring;

    //Check the genre field
    if(isset($terms["genre"])){
      $sql = $sql . createSearchTerm($terms["genre"], "id_gnr_gme", self::$database);
    }
    
    //Check the console field
    if(isset($terms["console"])){
      $sql = $sql . createSearchTerm($terms["console"], "id_con_inv", self::$database);
    }

    //Check the publisher field
    $pubString = " AND name_cmp LIKE '%" . self::$database->escape_string($terms["company"]). "%'";
    $sql = $sql . $pubString;

    //Check rating field
    if(isset($terms["rating"])) {
      $sql = $sql . createSearchTerm($terms["rating"], "id_age_gme", self::$database);
    }

    //Check condition field
    if($terms["condition"] != ""){
      $condString = " AND (";

      switch($terms["condition"]) {
        case "Poor":
          $condString = $condString . " condition_inv = 'Poor' OR";
        case "Acceptable":
          $condString = $condString . " condition_inv = 'Acceptable' OR";
        case "Good":
          $condString = $condString . " condition_inv = 'Good' OR";
        case "Great":
          $condString = $condString . " condition_inv = 'Great' OR";
        case "Like New":
          $condString = $condString . " condition_inv = 'Like New')";
      }
      $sql = $sql . $condString;
    }

    //Check Availability
    if($terms["availability"] != ""){
      $availabilityString = " AND available_inv = ";
      if($terms["availability"] == 'available') {
        $availabilityString = $availabilityString . "1";
      }
      else{
        $availabilityString = $availabilityString . "0";
      }
      $sql = $sql . $availabilityString;
    }

    //Sort By
    $sql = $sql . " ORDER BY " . $terms["sort"] . " " . $terms["order"];
    return static::find_by_sql($sql);
  }

  public function checkout($user) {
    echo "<p><strong>" . $this->getGame() . "</strong> has been checked out for <strong>" . $user->username_usr ."</strong>. Come pick up the item at our location at *insert address here*</p>";
    $this->id_usr_inv = $user->id;
    $this->available_inv = "0";
    $now = new DateTime();
    $return_date = $now->add(new DateInterval('P1W'))->format('Y-m-d');
    $this->available_after_inv = $return_date;
    $this->update();
    return true;
  }

  public function return($user) {
    if($user->id != $this->id_usr_inv) {
      return false;
    }
    $this->id_usr_inv = NULL;
    $this->available_inv = "1";
    $this->available_after_inv = date("Y-m-d");
    $this->update();
    return true;
  }

  public function isWishlisted($user) {
    $sql = "SELECT * FROM wish_list_wsh WHERE id_usr_wsh ='" . $user->id . "' AND id_inv_wsh ='" . $this->id . "'";
    $result = self::$database->query($sql);
    $object_array = [];
    $wishlisted = false;
    while($record = $result->fetch_assoc()) {
      $object_array[] = $record;
      $wishlisted = true;
    }
    return $wishlisted;
  }
}
?>