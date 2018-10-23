<?php
class Dao
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
        $saveQuery= "SELECT EXISTS (SELECT * FROM user WHERE username = :username AND password = :password)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $result = $q->execute();

        if($result){
            return 1;
        }
            return 0;
    }
}