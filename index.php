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
        /**
         * Check php version
         */
        if (version_compare(PHP_VERSION, '5.6', '<')) {
            echo "Sorry, Simple PHP Login does not run on a PHP version older than 5.6 !";
            return false;
        }
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
        $this->username = isset($_POST['username']) ? htmlentities($_POST['username']) : null;
        $this->password = isset($_POST['password']) ? htmlentities($_POST['password']) : null;

        /**
         * Logout
         */
        if (isset($this->action) && $this->action == 'Logout') {
            $this->doUserLogout();
        } elseif (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['user_logged_in']) {
            /**
             * if session exists, set user state to login
             */
            $this->user_logged_in = true;
        } elseif ($this->action == 'Login') {
            /**
             * do user login
             */
            if ($this->validateFormData()) {
                $this->doUserLogin();
            }
        }
        /**
         * Display Login/Logged out page
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
     * Check password
     * Write user session
     */
    private function doUserLogin() {
        require('UserLoginData.php');
        $userLogin = new UserLoginData;
        $result = $userLogin->getUserForLogin($this->username, $this->password);
        if ($result) {
            if (password_verify($this->password, $result->password)) {
                $_SESSION['username'] = $result->username;
                $_SESSION['user_logged_in'] = true;
                $this->user_logged_in = true;
                return true;
            } else {
                $this->message = "Wrong password.";
            }
        } else {
            $this->message = "This user does not exist.";
        }

    }

    /**
     * Perform user logout
     * Delete session variables
     */
    private function doUserLogout() {
        $_SESSION['username'] = null;
        $_SESSION['user_logged_in'] = false;
        $this->user_logged_in = false;
    }
}
//Run script
new UserLogin();