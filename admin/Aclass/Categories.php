<?php

namespace Aclass;

class Categories
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        return $this->conn->query("SELECT * FROM `categories`");
    }

    public function deleteCategory($category_id)
    {
        return $this->conn->query("DELETE FROM `categories` WHERE `id`='{$category_id}'");
    }
    public function updateCategory($id, $title, $show_at_index) {

        return $this->conn->query("UPDATE `categories` SET 
        `title` = '{$title}', 
        `show_at_index` = '{$show_at_index}'
         WHERE `id` = '{$id}'");
    }

    public function storeCategory($title, $show_at_index) {

        return $this->conn->query("INSERT INTO `categories` VALUES
     (NULL,  '{$title}', '{$show_at_index}', '" . date('Y-m-d H:i:s') . "')");

    }

}