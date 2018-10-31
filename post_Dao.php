<?php
class post_Dao
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

    public function savePost($content){
        $conn = $this->getConnection();
        $saveQuery= "INSERT INTO posts (content, date_entered) VALUE (:content, CURRENT_TIMESTAMP)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":content", $content);
        $q->execute();
    }

    public function getPosts(){
        $conn = $this->getConnection();
        return $conn->query("select user_id, content, date_entered from posts order by date_entered desc", PDO::FETCH_ASSOC);
    }
}