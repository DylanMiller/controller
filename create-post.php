<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $connection = new mysqli($host, $username, $password, $database);
    
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
    $date = new DateTime('today');
    $time = new DateTime('America/Los_Angeles');
    
    
    $query = $connection->query("INSERT INTO posts SET title = '$title', post = '$post'");
    echo "<p>Title: $title</p>";
    echo "<p>Post: $post</p>";
    
    if($query) {
        echo "<p>Successfully inserted post: </p>";
        echo "Posted on: " . $date->format('M/D' . " " . 'd/Y') . " at " . $time->format("G:i");
    } 
    else {
         echo "<p>$connection->error</p>";
         //this echoes if the post doesn't work
    }
        
    $connection->close();