<?php 


function validateTopic($topic){

    $errors = array();
    if (empty($topic['name'])) {
        array_push($errors, "Name of the topic is required");
    }
  

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if($existingTopic){
        array_push($errors, "Topic aleady exists");
    }

    return $errors;
}
