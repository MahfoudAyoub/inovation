<?php


function validateUser($user)
{

    $errors = array();
    if (empty($user['uname'])) {
        array_push($errors, "name is required");
    }
    if (empty($user['username'])) {
        array_push($errors, "Username is required");
    }
    if (empty($user['email'])) {
        array_push($errors, "Email is required");
    }
    if (empty($user['password'])) {
        array_push($errors, "password is required");
    }
    if ($user['password'] != $user['passwordConf']) {
        array_push($errors, "The two passwords do not match");
    }


    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, "Email aleady exists");
        }
        if (isset($user['create-admin'])) {
            array_push($errors, "Email aleady exists");
        }
    }

    return $errors;
}

function validateLogin($user)
{

    $errors = array();
    if (empty($user['username'])) {
        array_push($errors, "Username is required");
    }

    if (empty($user['password'])) {
        array_push($errors, "password is required");
    }

    return $errors;
}
