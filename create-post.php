<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $connection = new mysqli($host, $username, $password, $database);
    
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");
    echo "<p>Title: $title</p>";
    echo "<p>Post: $post</p>";
    
    if($query) {
        echo "<p>Successfully inserted post: </p>";
    } 
    else {
         echo "<p>$connection->error</p>";
         //this echoes if the post doesn't work
    }
        
    $connection->close();