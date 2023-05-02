<?php
/**
 * A class that represents an object in the users_usr table
 */
class User extends DatabaseObject {

  static protected $table_name = "users_usr";
  static protected $db_columns = ['id', 'fname_usr', 'lname_usr', 'email_usr', 'username_usr', 'street_address_usr', 'city_usr', 'id_sta_usr', 'zip_usr', 'user_level_usr', 'hashed_password_usr'];

  
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
  public $password;
  public $confirm_password;
  protected $password_required = true;

  /**
   * A constructor function for a User Object
   *
   * @param   Array  $args  An associative array with indexes corresponding to the fields in the table
   *
   */
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

  /**
   * Returns the full name of the user
   * 
   * @return String The full name of the user
   */
  public function full_name() {
    return $this->fname_usr . " " . $this->lname_usr;
  }

  /**
   * Sets the hashed password for the user
   */
  protected function set_hashed_password() {
    $this->hashed_password_usr = password_hash($this->password, PASSWORD_BCRYPT);
  }

  /**
   * Verifies the given password for the user
   *
   * @param   String  $password  The password to check
   *
   * @return  boolean             True if the password matches, false if it doesn't
   */
  public function verify_password($password) {
    return password_verify($password, $this->hashed_password_usr);
  }

  /**
   * Creates a new user record in the database
   * 
   * @return boolean True if the operation succeeded, false if it did not
   */
  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  /**
   * Updates a user record in the database
   * 
   * @return boolean True if the operation succeeded, false if it did not
   */
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

  /**
   * Checks to see if the current properties of the object are valid.
   *
   * @return  string[]  An associative array of any validation errors
   */
  protected function validate() {
    $this->errors = [];
  
    if(is_blank($this->fname_usr)) {
      $this->errors["firstname"][] = "First name cannot be blank.";
    } elseif (!has_length($this->fname_usr, array('min' => 2, 'max' => 255))) {
      $this->errors["firstname"][] = "First name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->lname_usr)) {
      $this->errors["lastname"][] = "Last name cannot be blank.";
    } elseif (!has_length($this->lname_usr, array('min' => 2, 'max' => 255))) {
      $this->errors["lastname"][] = "Last name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->email_usr)) {
      $this->errors["email"][] = "Email cannot be blank.";
    } elseif (!has_length($this->email_usr, array('max' => 255))) {
      $this->errors["email"][] = "Email must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email_usr)) {
      $this->errors["email"][] = "Email must be a valid format.";
    }
  
    if(is_blank($this->username_usr)) {
      $this->errors["username"][] = "Username cannot be blank.";
    } elseif (!has_length($this->username_usr, array('min' => 8, 'max' => 255))) {
      $this->errors["username"][] = "Username must be between 8 and 255 characters.";
    } elseif (has_string($this->username_usr, " ")) {
      $this->errors["username"][] = "Username must not contain spaces.";
    } elseif (!has_unique_username($this->username_usr, $this->id ?? 0)) {
      $this->errors["username"][] = "Username not available, try another.";
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
        $this->errors["password"][] = "Password cannot be blank.";
      } if (!has_length($this->password, array('min' => 12))) {
        $this->errors["password"][] = "Password must contain 12 or more characters";
      } if (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors["password"][] = "Password must contain at least 1 uppercase letter";
      } if (!preg_match('/[a-z]/', $this->password)) {
        $this->errors["password"][] = "Password must contain at least 1 lowercase letter";
      } if (!preg_match('/[0-9]/', $this->password)) {
        $this->errors["password"][] = "Password must contain at least 1 number";
      } if (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors["password"][] = "Password must contain at least 1 symbol";
      }
    
      if(is_blank($this->confirm_password)) {
        $this->errors["confirm_password"][] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors["confirm_password"][] = "Password and confirm password must match.";
      }
    }
    return $this->errors;
  }
  
  /**
   * Returns a User object with the provided username
   *
   * @param   String  $username_usr  The username to search for
   *
   * @return  User                 The User object with a matching username, or false if none is found
   */
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

  /**
   * Returns the state abbreviation for the user
   *
   * @return  String  The State Abbreviation for the user
   */
  public function getStateAbbr() {
    $sql = "SELECT state_abbr_sta FROM states_sta WHERE id='" . $this->id_sta_usr . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['state_abbr_sta'];
  }

  /**
   * Returns the InventoryItem objects donated by the user
   *
   * @return  InventoryItem[]  The InvenetoryItems donated by the user
   */
  public function getDonations() {
    $sql = "SELECT * FROM inventory_inv WHERE id_usrdonator_inv ='" . $this->id . "'";
    $result = InventoryItem::find_by_sql($sql);
    return $result;
  }

  /**
   * Returns the InventoryItem objects checked out by the user
   *
   * @return  InventoryItem[]  The InvenetoryItems checked out by the user
   */
  public function getCheckouts() {
    $sql = "SELECT * FROM inventory_inv WHERE id_usr_inv ='" . $this->id . "'";
    $result = InventoryItem::find_by_sql($sql);
    return $result;
  }

  /**
   * Gets the InventoryItems on the User's Wishlist
   *
   * @return  InventoryItem[]  An array of InventoryItem objects on the user's wishlist
   */
  public function getWishList() {
    $sql = "SELECT id_inv_wsh FROM wish_list_wsh WHERE id_usr_wsh ='" . $this->id . "'";
    $result = self::$database->query($sql);
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = InventoryItem::find_by_id($record['id_inv_wsh']);
    }
    return $object_array;
  }

  /**
   * Adds an InventoryItem to the user's wishlist
   * 
   * @param InventoryItem The item to be added to the wishlist
   * 
   * @return boolean True if the item is not on the wishlist, false if it is
   */
  public function addToWishList($item) {
    if(!$item->isWishlisted($this)) {
      $sql = "INSERT INTO wish_list_wsh (id_usr_wsh, id_inv_wsh) VALUES ('" . $this->id . "', '" . $item->id . "')";
      $result = self::$database->query($sql);
      return $result;
    }
    else {
      return false;
    }
  }

  /**
   * Removes an InventoryItem from the user's wishlist
   * 
   * @param InventoryItem The item to be removed from the wishlist
   * 
   * @return boolean True if the item is on the wishlist, false if it isn't
   */
  public function removeFromWishList($item) {
    if($item->isWishListed($this)){
      $sql = "DELETE FROM wish_list_wsh WHERE id_usr_wsh ='" . $this->id . "' AND id_inv_wsh ='" . $item->id . "'";
      $result = self::$database->query($sql);
      return $result;
    }
    else {
      return false;
    }
  }

  /**
   * Returns the State name
   *
   * @param   String  $id  The id number of the state
   *
   * @return  String       The name of the state
   */
  public static function getStateNameById($id) {
    $sql = "SELECT state_name_sta FROM states_sta WHERE id='" . $id . "'";
    $result = self::$database->query($sql);
    $result = $result->fetch_assoc();
    return $result['state_name_sta'];
  }

  /**
   * Generates a password reset token for the user and enters it into the database and clears any existing tokens the user has, and returns the token
   *
   * @return  String The user's password reset token
   */
  public function generatePasswordToken() {
    if($this->hasToken()){
      $this->clearToken();
    }
    
    $token = random_str(64);
    $hashed_token = password_hash($token, PASSWORD_BCRYPT);
    $now = new DateTime();
    $expiry_date = $now->add(new DateInterval('PT3H'))->format('Y-m-d H:i:s');
    $sql = "INSERT INTO password_reset_tokens_prt (id_usr_prt, hashed_token_prt, expiration_prt) VALUES ('". $this->id . "', '". $hashed_token . "', '".$expiry_date ."')";
    $result = self::$database->query($sql);
    if($result){
      return $token;
    }
    else {
      return false;
    }
  }

  /**
   * Checks to see if the user has a token
   *
   * @return  boolean  True if the user has a token, false if they do not
   */
  public function hasToken(){
    $sql = "SELECT * FROM password_reset_tokens_prt WHERE id_usr_prt = ". $this->id . "";
    $result = self::$database->query($sql);
    if($record = $result->fetch_assoc()) {
      return true;
    }
    return false;
  }

  /**
   * Returns the id number of the user with the given token
   *
   * @param   String  $token  The user's password reset token
   *
   * @return  User          The User object of the user with the token, or false if there was no match
   */
  public static function getUserFromToken($token) {
    $now = new DateTime();
    $now = $now->format('Y-m-d H:i:s');
    $sql = "SELECT id_usr_prt, hashed_token_prt FROM password_reset_tokens_prt WHERE expiration_prt > '" . $now . "'";
    $result = self::$database->query($sql);
    while($record = $result->fetch_assoc()){
      if(password_verify($token, $record['hashed_token_prt'])){
        return self::find_by_id($record['id_usr_prt']);
      }
    }
    return false;
  }

  /**
   * Deletes the user's current token
   *
   */
  public function clearToken(){
    $sql = "DELETE FROM password_reset_tokens_prt WHERE id_usr_prt = ". $this->id . "";
    $result = self::$database->query($sql);
  }
}

?>
