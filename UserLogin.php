<?php

/** 
 * UserLogin class
 * Stores methods related to user login/logout
 */
class UserLogin {

    /**
     * @var string - Store user logged in state
     */
    private $user_logged_in = false;

    /**
     * @var string - Store messages
     */
    private $message = null;

    /**
     * @var string - Store username
     */
    private $username = null;

    /**
     * @var string - Store password
     */
    private $password = null;

    /**
     * @var string - Store action
     */
    private $action = null;

    public function __construct() {
        $this->doUserActions();
    }

    /**
     * Check action type
     * 
     */
    public function doUserActions() {

        //Start session
        session_start();

        $this->action = isset($_POST['action']) ? $_POST['action'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
        $this->password = isset($_POST['password']) ? $_POST['password'] : null;

        /**
         * Logout
         */
        if (isset($this->action) && $this->action == 'logout') {
            $this->doUserLogout();
        } elseif ($_SESSION['username'] && $_SESSION['user_logged_in']) {
            /**
             * if session exists, set user state to login
             */
            $this->user_logged_in = true;
        } elseif ($this->action == 'login') {
            /**
             * do user login
             */
            if ($this->validateFormData()) {
                $this->doUserLogin();
            }
        }
        /**
         * Display views
         */
        if ($this->user_logged_in) {
            include('views/userProfile.php');
        } else {
            include('views/loginForm.php');
        }
    }

    /**
     * Validate Form Data
     */
    private function validateFormData() {
        if (!empty($this->username) && !empty( $this->password)) {
            return true;
        } elseif (empty($this->username)) {
            $this->message = 'Username cannot be empty';
            return false;
        } elseif (empty($this->password)) {
            $this->message = 'Password cannot be empty';
            return false;
        }
    }

    /**
     * Perform user login
     */
    private function doUserLogin() {
        $userLoginData = new UserLoginData;
        $result = $userLoginData->getUserForLogin(
            array('username'=>$this->username, 'password' => $this->password)
        );
        if ($result) {
            if (password_verify($this->password, $result->user_password)) {
                // write user data into PHP SESSION [a file on your server]
                $_SESSION['username'] = $result_row->user_name;
                $_SESSION['user_logged_in'] = true;
                $this->user_logged_in = true;
                return true;
            } else {
                $this->feedback = "Wrong password.";
            }
        } else {
            $this->feedback = "This user does not exist.";
        }

    }

    /**
     * Perform user logout
     */
    private function doUserLogout() {
        $_SESSION = array();
        session_destroy();
        $this->user_logged_in = false;
    }
}