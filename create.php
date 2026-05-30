<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "db.php";

$message = "";

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO posts(title, content, user_id)
        VALUES('$title', '$content', '$user_id')";

    if($conn->query($sql) === TRUE) {
        $message = "✅ Post Created Successfully!";
    } else {
        $message = "❌ Error Creating Post!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f6ff;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            background:white;
            padding:30px;
            width:400px;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
        }

        input, textarea{
            width:100%;
            padding:10px;
            margin:10px 0;
        }

        textarea{
            height:120px;
        }

        button{
            width:100%;
            padding:10px;
            background:green;
            color:white;
            border:none;
            cursor:pointer;
        }

        button:hover{
            background:darkgreen;
        }

        .message{
            color:green;
            text-align:center;
            margin-bottom:10px;
            font-weight:bold;
        }

        a{
            text-decoration:none;
            display:block;
            margin-top:15px;
            text-align:center;
            color:blue;
        }
    </style>
</head>

<body>

<div class="box">

<h2>Create Blog Post</h2>

<?php
if($message != "") {
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="title"
placeholder="Enter Post Title" required>

<textarea name="content"
placeholder="Enter Post Content" required></textarea>

<button type="submit" name="submit">
Create Post
</button>

</form>

<a href="index.php">View All Posts</a>

</div>

</body>
</html>