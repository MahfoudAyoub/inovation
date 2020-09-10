<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");
include(ROOT_PATH . "/app/helpers/midleware.php");



$table = 'comments';
$errors = array();
$id = "";
$comment = "";
$userID = "";
$postID = "";

$posts = selectAll($table);



if (isset($_POST['addComment'])) {
    
    $errors = validatePost($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-post']);
        $_POST['userID'] = $_SESSION['id'];
        $post_id = create($table, $_POST);

        $_SESSION['message'] = 'Post created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

