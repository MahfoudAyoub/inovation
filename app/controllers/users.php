<?php 

include(ROOT_PATH . "/app/database/db.php");

// variable declaration
$username = "";
$email    = "";
$password = "";
$passwordConf = "";
$errors = array(); 


if (isset($_POST['register-btn'])) {

    if (empty($_POST['username'])) { 
        array_push($errors, "Uhmm...We gonna need your username"); 
    }
    if (empty($_POST['email'])) { 
        array_push($errors, "Oops.. Email is missing"); 
    }
    if (empty($_POST['password'])) { 
        array_push($errors, "uh-oh you forgot the password"); 
    }
    if ($_POST['password'] != $_POST['passwordConf']) {
    array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create('users', $_POST);
        $user = selectOne('users', ['id' => $user_id]);

    }
    else{

    }

    
}
