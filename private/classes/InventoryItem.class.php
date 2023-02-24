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
    $this->available_after_inv = $args['available_after_inv'] ?? '';
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
}
?>