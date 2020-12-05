<?php

namespace Aclass;

class Comment
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        return $this->conn->query("SELECT * FROM `comments`");
    }

    public function deleteComments($comment_id)
    {
        return $this->conn->query( "DELETE FROM `comments` WHERE `id`='{$comment_id}'");
    }

    public function updateComments($id)
    {
        return $this->conn->query( "UPDATE `comments` SET 
        `is_confirm` = '1' 
         WHERE `comments`. `id` = '{$id}'");
    }

}