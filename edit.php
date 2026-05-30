<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "db.php";

// Get post ID
$id = $_GET['id'];

// Fetch existing data
$sql = "SELECT * FROM posts WHERE id=$id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

// Update post
if(isset($_POST['update'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $update_sql = "UPDATE posts
                   SET title='$title',
                       content='$content'
                   WHERE id=$id";

    if($conn->query($update_sql) === TRUE) {

        header("Location: index.php");

    } else {
        echo "Error updating post";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>

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
            background:blue;
            color:white;
            border:none;
            cursor:pointer;
        }

        button:hover{
            background:darkblue;
        }
    </style>
</head>

<body>

<div class="box">

<h2>Edit Blog Post</h2>

<form method="POST">

<input type="text"
name="title"
value="<?php echo $row['title']; ?>"
required>

<textarea name="content"
required><?php echo $row['content']; ?></textarea>

<button type="submit" name="update">
Update Post
</button>

</form>

</div>

</body>
</html>