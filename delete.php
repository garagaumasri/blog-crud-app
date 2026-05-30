<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "db.php";

// Get post ID
$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM posts WHERE id=$id";

if($conn->query($sql) === TRUE) {

    header("Location: index.php");

} else {

    echo "Error deleting post";
}
?>