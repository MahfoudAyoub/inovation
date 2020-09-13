<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/midleware.php");

// variable declaration
$id = "";
$username = "";
$uname = "";
$email    = "";
$address    = "";
$phone    = "";
$admin    = "";
$password = "";
$passwordConf = "";
$table = 'users';
$errors = array();

$admin_users = selectAll($table);

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();
}


if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {

    $errors = validateUser($_POST);

    if (count($errors) == 0) {
        unset($_POST['register-btn'], $_POST['create-admin'], $_POST['passwordConf']);
        $_POST['password'] = md5($_POST['password']);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user created successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $_POST['access'] = 2;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            // LOG USER IN
            loginUser($user);
        }
    } else {
        $uname = $_POST['uname'];
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}


if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin user created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email    = $_POST['email'];
        $address    = $_POST['address'];
        $phone    = $_POST['phone'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}


if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $uname = $user['uname'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email    = $user['email'];
    $address    = $user['address'];
    $phone    = $user['phone'];
}


if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            // LOG USER IN
            loginUser($user);
        } else {
            array_push($errors, 'wrong credentials');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}


if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
