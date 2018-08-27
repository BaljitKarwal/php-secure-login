<?php
/**
 * Database Installation Script
 */
error_reporting(E_ALL);
// config
$dbType = "sqlite";
$dbPath = "users.db";
//create PDO connection
 $dbConnection = new PDO($dbType . ':' . $dbPath);

// create new empty table inside the database (if table does not already exist)
 $sql = 'CREATE TABLE IF NOT EXISTS `users` (
     `ID` INTEGER PRIMARY KEY,
     `username` VARCHAR(20) NOT NULL,
     `password` VARCHAR(255) NOT NULL
 )';

// execute the above query
$query = $dbConnection->prepare($sql);
$query->execute();

$sql = 'INSERT INTO users (ID,username,password) 
    VALUES (:ID, :username, :password)';

// execute the above query
$insert_query = $dbConnection->prepare($sql);
$insert_query->bindValue(':ID', 1, PDO::PARAM_STR);
$insert_query->bindValue(':username', "test", PDO::PARAM_STR);
$insert_query->bindValue(':password', password_hash("test123", PASSWORD_DEFAULT), PDO::PARAM_STR);
$insert_query->execute();

 // check for success
if (file_exists($dbPath)) {
    echo "Database $dbPath was created, installation was successful.";
} else {
    echo "Database $dbPath was not created, installation was NOT successful.";
}
