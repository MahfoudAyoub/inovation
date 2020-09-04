<?php 


function validateUser($user){

    $errors = array();
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
    if(isset($existingUser)){
        array_push($errors, "Email aleady exists");
    }

    return $errors;
}


?>