<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f6ff;
            text-align:center;
            padding-top:100px;
        }

        .box{
            background:white;
            width:400px;
            margin:auto;
            padding:30px;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.1);
        }

        h1{
            color:green;
        }

        a{
            display:block;
            margin:15px;
            padding:10px;
            text-decoration:none;
            color:white;
            border-radius:5px;
        }

        .create{
            background:green;
        }

        .view{
            background:blue;
        }

        .logout{
            background:red;
        }
    </style>
</head>

<body>

<div class="box">

<h1>Welcome <?php echo $_SESSION['username']; ?> 🎉</h1>

<h2>Blog Dashboard</h2>

<a class="create" href="create.php">
➕ Create New Post
</a>

<a class="view" href="index.php">
📖 View All Posts
</a>

<a class="logout" href="logout.php">
🚪 Logout
</a>

</div>

</body>
</html>