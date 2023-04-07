<?php

class User extends DatabaseObject {

  static protected $table_name = "users_usr";
  static protected $db_columns = ['id', 'fname_usr', 'lname_usr', 'email_usr', 'username_usr', 'street_address_usr', 'city_usr', 'id_sta_usr', 'zip_usr', 'user_level_usr', 'hashed_password_usr', 'balance_usr'];

  
  public $id;
  public $fname_usr;
  public $lname_usr;
  public $email_usr;
  public $username_usr;
  public $street_address_usr;
  public $city_usr;
  public $id_sta_usr;
  public $zip_usr;
  public $user_level_usr;
  protected $hashed_password_usr;
  public $balance_usr;
  public $password;
  public $confirm_password;
  protected $password_required = true;

  public function __construct($args=[]) {
    $this->fname_usr = $args['fname_usr'] ?? '';
    $this->lname_usr = $args['lname_usr'] ?? '';
    $this->email_usr = $args['email_usr'] ?? '';
    $this->username_usr = $args['username_usr'] ?? '';
    $this->street_address_usr = $args['street_address_usr'] ?? '';
    $this->city_usr = $args['city_usr'] ?? '';
    $this->zip_usr = $args['zip_usr'] ?? '';
    $this->id_sta_usr = $args['id_sta_usr'] ?? '';
    $this->user_level_usr = $args['user_level_usr'] ?? 'user';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name() {
    return $this->fname_usr . " " . $this->lname_usr;
  }

  protected function set_hashed_password() {
    $this->hashed_password_usr = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password_usr);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->password != '') {
      // validate password
      $this->set_hashed_password();
    } else {
      // skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  protected function validate() {
    $this->errors = [];
  
    if(is_blank($this->fname_usr)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->fname_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->lname_usr)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->lname_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->email_usr)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email_usr, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email_usr)) {
      $this->errors[] = "Email must be a valid format.";
    }
  
    if(is_blank($this->username_usr)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username_usr, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($this->username_usr, $this->id ?? 0)) {
      $this->errors[] = "Username not allowed, try another.";
    }

    if(is_blank($this->street_address_usr)) {
      $this->errors[] = "Street Address cannot be blank.";
    } 

    if(is_blank($this->city_usr)) {
      $this->errors[] = "City cannot be blank.";
    } 

    if(is_blank($this->id_sta_usr)) {
      $this->errors[] = "Please select a state.";
    } 

    if(is_blank($this->zip_usr)) {
      $this->errors[] = "Zip Code cannot be blank";
    } 
  
    if($this->password_required) {
      if(is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }
    
      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }
    return $this->errors;
  }
  
  static public function find_by_username($username_usr) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username_usr ='" . self::$database->escape_string($username_usr) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  public function getStateAbbr() {
    $sql = "SELECT state_abbr_sta FROM states_sta WHERE id='" . $this->id_sta_usr . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['state_abbr_sta'];
  }

  public function getDonations() {
    $sql = "SELECT * FROM inventory_inv WHERE id_usrdonator_inv ='" . $this->id . "'";
    $result = InventoryItem::find_by_sql($sql);
    return $result;
  }

  public function getCheckouts() {
    $sql = "SELECT * FROM inventory_inv WHERE id_usr_inv ='" . $this->id . "'";
    $result = InventoryItem::find_by_sql($sql);
    return $result;
  }

  public function getWishList() {
    $sql = "SELECT id_inv_wsh FROM wish_list_wsh WHERE id_usr_wsh ='" . $this->id . "'";
    $result = self::$database->query($sql);
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = InventoryItem::find_by_id($record['id_inv_wsh']);
    }
    return $object_array;
  }

  public function addToWishList($item) {
    $sql = "INSERT INTO wish_list_wsh (id_usr_wsh, id_inv_wsh) VALUES ('" . $this->id . "', '" . $item->id . "')";
    $result = self::$database->query($sql);
    return $result;
  }

  public function removeFromWishList($item) {
    $sql = "DELETE FROM wish_list_wsh WHERE id_usr_wsh ='" . $this->id . "' AND id_inv_wsh ='" . $item->id . "'";
    $result = self::$database->query($sql);
    return $result;
  }

  public static function getStateNameById($id) {
    $sql = "SELECT state_name_sta FROM states_sta WHERE id='" . $id . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['state_name_sta'];
  }

}

?>
