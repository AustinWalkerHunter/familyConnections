<?php
class login_Dao
{
    private $host = "us-cdbr-iron-east-01.cleardb.net";
    private $db = "heroku_e0406c39d6368ec";
    private $user = "b663b02221aaf3";
    private $pass = "9f6c1c10";

    public function getConnection()
    {
        $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);

        return $conn;
    }

    public function checkCredentials($username, $password)
    {
        $conn = $this->getConnection();
        $getQuery= "SELECT 1 FROM user WHERE username = BINARY :username AND password = BINARY :password";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->execute();
        return reset($q->fetchAll());
    }
    public function getUserData($username)
    {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM user WHERE username = BINARY :username";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":username", $username);
        $q->execute();
        return reset($q->fetchAll());
    }

    public function createNewAccount($displayname, $username, $email, $password)
    {
        $conn = $this->getConnection();
        $saveQuery= "INSERT INTO user (displayname, username, email, password) VALUES (:displayname, :username, :email, :password)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":displayname", $displayname);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->bindParam(":email", $email);
        $q->execute();
    }

    public function checkAvailability($username)
    {
        $conn = $this->getConnection();
        $getQuery= "SELECT * FROM user WHERE username = BINARY :username";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":username", $username);
        $q->execute();
        return reset($q->fetchAll());
    }
}