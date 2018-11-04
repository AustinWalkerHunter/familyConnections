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

    public function getUsers(){
        $conn = $this->getConnection();
        return $conn->query("select * from user order by displayname", PDO::FETCH_ASSOC);
    }

        public function savePost($user_id, $content){
        $conn = $this->getConnection();
        $saveQuery= "INSERT INTO posts (user_id, content, date_entered) VALUE ($user_id, :content, CURRENT_TIMESTAMP)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":content", $content);
        $q->execute();
    }

    public function getPosts(){
        $conn = $this->getConnection();
        return $conn->query("select displayname, content, date_entered, content_id, user_id from posts JOIN USER ON posts.user_id = user.id order by date_entered desc", PDO::FETCH_ASSOC);
    }

    public function deletePost($id){
        $conn = $this->getConnection();
        $saveQuery = "DELETE FROM posts WHERE content_id = :content_id";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":content_id", $id);
        $q->execute();
    }
}