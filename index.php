<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include "db.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM posts
        WHERE user_id='$user_id'
        ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Blog Posts</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f6ff;
            padding:20px;
        }

        h1{
            text-align:center;
        }

        .top-buttons{
            text-align:center;
            margin-bottom:20px;
        }

        .top-buttons a{
            text-decoration:none;
            background:green;
            color:white;
            padding:10px 15px;
            margin:5px;
            border-radius:5px;
        }

        .post{
            background:white;
            padding:20px;
            margin:20px auto;
            width:70%;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.1);
        }

        .post h2{
            color:#333;
        }

        .date{
            color:gray;
            font-size:14px;
        }

        .actions{
            margin-top:15px;
        }

        .actions a{
            text-decoration:none;
            padding:8px 12px;
            border-radius:5px;
            color:white;
            margin-right:10px;
        }

        .edit{
            background:blue;
        }

        .delete{
            background:red;
        }
    </style>
</head>

<body>

<h1>📖 Blog Posts</h1>

<div class="top-buttons">
    <a href="create.php">➕ Create New Post</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<?php
if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        echo "
        <div class='post'>

            <h2>".$row['title']."</h2>

            <p>".$row['content']."</p>

            <p class='date'>
            Posted on: ".$row['created_at']."
            </p>

            <div class='actions'>
                <a class='edit'
                href='edit.php?id=".$row['id']."'>
                Edit
                </a>

                <a class='delete'
                href='delete.php?id=".$row['id']."'>
                Delete
                </a>
            </div>

        </div>
        ";
    }

} else {

    echo "<h3 style='text-align:center;'>
    No Posts Available
    </h3>";
}
?>

</body>
</html>