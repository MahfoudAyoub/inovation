<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");



$table = 'posts';
$errors = array();
$title = "";
$body = "";
$topic_id = "";
$published = "";

$topics = selectAll('topics');
$posts = selectAll($table);

if (isset($_POST['add-post'])) {
    $errors = validatePost($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-post'], $_POST['topic_id']);
        $_POST['user_id'] = 1;
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
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