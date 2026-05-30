<?php
session_start();
include "db.php";

$message = "";

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])) {

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id'];

            header("Location: dashboard.php");

        } else {
            $message = "❌ Wrong Password!";
        }

    } else {
        $message = "❌ User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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
            width:300px;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.1);
            text-align:center;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
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

        .message{
            color:red;
            margin-bottom:15px;
            font-weight:bold;
        }

        a{
            text-decoration:none;
            display:block;
            margin-top:15px;
            color:green;
        }
    </style>
</head>

<body>

<div class="box">

<h2>User Login</h2>

<?php
if($message != "") {
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="login">Login</button>

</form>

<a href="register.php">Create New Account</a>

</div>

</body>
</html>