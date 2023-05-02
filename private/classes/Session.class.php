<?php

/**
 * A class that represents the users session
 */
class Session {
    private $user_id;
    public $username;
    private $last_login;
    public $user_level;
    public const MAX_LOGIN_AGE = 60*60*24;

    /**
     * Creates a Session Object
     *
     */
    public function __construct() {
        session_start();
        $this->check_stored_login();
    }

    /**
     * Logs in a user from the given user object
     *
     * @param   User  $user  The User to be logged in
     *
     * @return  boolean         Returns true
     */
    public function login($user) {
        if($user) {
            // prevent session fixation attacks
            session_regenerate_id();
            $_SESSION['user_id'] = $user->id;
            $this->user_id = $user->id;
            $_SESSION['username'] = $user->username_usr;
            $this->username = $user->username_usr;
            $this->last_login = time();
            $_SESSION['last_login'] = $this->last_login;
            $_SESSION['user_level'] = $user->user_level_usr;
            $this->user_level = $user->user_level_usr;
        } return true;
    }

    /**
     * Checks to see if the user is logged in
     *
     * @return  boolean  True if the user is logged in, false if they are not
     */
    public function is_logged_in() {
        return isset($this->user_id) && $this->last_login_is_recent();

    }

    /**
     * Logs out the user
     *
     * @return  boolean  Returns true
     */
    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id); 
        unset($_SESSION['username']);
        unset($this->username); 
        unset($_SESSION['last_login']);
        unset($this->last_login); 
        unset($_SESSION['user_level']);
        unset($this->user_level); 
        return true;
    }

    /**
     * Refreshes the stored login information
     *
     */
    private function check_stored_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
            $this->user_level = $_SESSION['user_level'];
        }
    }

    /**
     * Checks to see if the login is recent
     *
     * @return  boolean  True if the last login was less than a day ago, false if it wasn't
     */
    private function last_login_is_recent() {
      if(!isset($this->last_login)){
        return false;
      } elseif($this->last_login + self::MAX_LOGIN_AGE < time() || !User::find_by_id($this->user_id)) {
        $this->logout();
        return false;
      } else {
        return true;
      }
    }

    /**
     * Sets the session Message
     *
     * @param   String  $msg  The message to be stored
     *
     * @return  Returns The session message        
     */
    public function message($msg=""){
      if(!empty($msg)){
        $_SESSION['message'] = $msg;
        return true;
      } else {
        return $_SESSION['message'] ?? '';
      }
    }

    /**
     * Clears the session message
     */
    public function clear_message() {
      unset($_SESSION['message']);
    }

    public function check_id($user) {
      return $this->user_id == $user->id;
    }
}