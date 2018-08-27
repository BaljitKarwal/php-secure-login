<?php
/**
 * Data layer class to run sql queries
 */
class UserLoginData {

    /**
     * @var string - DB Connection
     */
    private $dbConnection = null;

    private $dbType = "sqlite";

    private $dbPath = "users.db";

    public $message = null;

    public function __construct() {
        try {
            $this->dbConnection = new PDO($this->dbType . ':' . $this->dbPath);
            return true;
        } catch (PDOException $e) {
            $this->message = "PDO database connection error: " . $e->getMessage();
        } catch (Exception $e) {
            $this->message = "Error: " . $e->getMessage();
        }
        return false;
    }

    /**
     * Get user details
     */
    public function getUserForLogin($username, $password) {
        $sql = 'SELECT username,password
                FROM users
                WHERE username = :username
                LIMIT 1';
        $query = $this->dbConnection->prepare($sql);
        $query->bindValue(':username', $username);
        $query->execute();
        return $result_row = $query->fetchObject();
    }
}