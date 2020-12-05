<?php
require_once 'db.php';


function storePost($title, $short_description, $description, $category_id) {
    global $link;
    $query = "INSERT INTO `posts`  VALUES
     (NULL, '{$category_id}', '{$title}', '{$short_description}', '{$description}', '0', '', '" . date('Y-m-d H:i:s') . "')";

    $result = mysqli_query($link, $query);
}

function updatePost($id, $title, $short_description, $description, $category_id) {
    global $link;
    $query = "UPDATE `posts` SET
        `category_id` = '{$category_id}', 
        `title` = '{$title}', 
        `short_description` = '{$short_description}',
        `description` = '{$description}'
         WHERE `id` = '{$id}'";

    $result = mysqli_query($link, $query);
}

function getPosts($post_id = null, $limit = null, $orderBy = null, $orderType = 'ASC') {
    global $link;

    $query = "SELECT * FROM `posts`";
    if(!is_null($post_id)) {
        $query .= " WHERE `id`='{$post_id}'";
    }
    if(!is_null($orderBy)) {
        $query .= " ORDER BY `" . $orderBy . "` " . $orderType;
    }
    if(!is_null($limit)){
        $query .= " LIMIT " . $limit;
    }

//    echo $query; exit;
    $result = mysqli_query($link, $query);
    return $result;
}

function deletePost($post_id) {
    global $link;

    $query = "DELETE FROM `posts` WHERE `id`='{$post_id}'";
    $result = mysqli_query($link, $query);
    return $result;
}

function storeCategory($title, $show_at_index) {
    global $link;
    $query = "INSERT INTO `categories` VALUES
     (NULL,  '{$title}', '{$show_at_index}', '" . date('Y-m-d H:i:s') . "')";

    $result = mysqli_query($link, $query);
}

function getCategories($category_id = null) {
    global $link;
    $query = "SELECT * FROM `categories`";
    if(! is_null($category_id)) {
        $query .= " WHERE `id`='{$category_id}'";
    }
    $result = mysqli_query($link, $query);
    return $result;
}


function deleteCategory($category_id) {
    global $link;

    $query = "DELETE FROM `categories` WHERE `id`='{$category_id}'";
    $result = mysqli_query($link, $query);
    return $result;
}


function updateCategory($id, $title, $show_at_index) {
    global $link;
    $query = "UPDATE `categories` SET 
        `title` = '{$title}', 
        `show_at_index` = '{$show_at_index}'
         WHERE `id` = '{$id}'";

    $result = mysqli_query($link, $query);
}

function calculateCountViews($post_id) {
    if(isset($_COOKIE['view']))
    {
        die;
    }
else{
    global $link;
    $query = "UPDATE `posts` SET 
        `count_views` = `count_views` + 1
         WHERE `id` = '{$post_id}'";
        $result = mysqli_query($link, $query);
}

}
function getPostsForIndex( $limit = null, $orderBy = null, $orderType = 'ASC') {
    global $link;

    $query = "SELECT P.* FROM `posts` P 
                JOIN `categories` C 
                ON P.category_id=C.id
                WHERE
                    C.show_at_index = '1'
";

    if(!is_null($orderBy)) {
        $query .= " ORDER BY `" . $orderBy . "` " . $orderType;
    }
    if(!is_null($limit)){
        $query .= " LIMIT " . $limit;
    }

//    echo $query; exit;
    $result = mysqli_query($link, $query);
    return $result;
}


// comments function

function storeComments($post_id,$name, $mobile, $email , $description) {
    global $link;
    $query = " INSERT INTO `comments`(`id`, `post_id`, `name`, `mobile`, `email`, `description`, `is_confirm`, `created_at`) VALUES 
                            (NULL,'{$post_id}','{$name}','{$mobile}','{$email}','{$description}','' , '" . date('Y-m-d H:i:s') . "')";
    $result = mysqli_query($link, $query);

}


function getComments() {
    global $link;

    $query = "SELECT * FROM `comments`";
    $result = mysqli_query($link, $query);
    return $result;
}

function deleteComments($comment_id) {
    global $link;

    $query = "DELETE FROM `comments` WHERE `id`='{$comment_id}'";
    $result = mysqli_query($link, $query);
    return $result;
}

function updateComments($id) {
    global $link;
    $query = "UPDATE `comments` SET 
        `is_confirm` = '1' 
         WHERE `comments`. `id` = '{$id}'";
    $result = mysqli_query($link, $query);
    return $result;
}


//function getCommentsCountByPostId($post_id)
//{
//    global $link;
//    $result = mysqli_query($link, "SELECT COUNT(*) AS total FROM comments");
//    $data = mysqli_fetch_assoc($result);
//    return $data['total'];
//}




