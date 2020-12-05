<?php

namespace Aclass;

class Post

{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        return $this->conn->query("SELECT * FROM `posts`");
    }

    public function edit($id, $title, $short_description, $description, $category_id)
    {
        return $this->conn->query("UPDATE `posts` SET
        `category_id` = '{$category_id}', 
        `title` = '{$title}', 
        `short_description` = '{$short_description}',
        `description` = '{$description}'
         WHERE `id` = '{$id}'");

    }

    public function deletePost($post_id)
    {
        return $this->conn->query("DELETE FROM `posts` WHERE `id`='{$post_id}'");
    }

    public function storePost($title, $short_description, $description, $category_id)
    {
        return $this->conn->query("INSERT INTO `posts`  VALUES
        (NULL, '{$category_id}', '{$title}', '{$short_description}', '{$description}', '0', '', '" . date('Y-m-d H:i:s') . "')");

    }


}