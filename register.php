<?php
include "db.php";

$message = "";

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username, password)
            VALUES('$username', '$password')";

    if($conn->query($sql) === TRUE) {
        $message = "✅ Registration Successful!";
    } else {
        $message = "❌ Error occurred!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

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
            margin-bottom:15px;
            font-weight:bold;
        }

        a{
            text-decoration:none;
            display:block;
            margin-top:15px;
            color:blue;
        }
    </style>
</head>

<body>

<div class="box">

<h2>User Registration</h2>

<?php
if($message != "") {
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="register">Register</button>

</form>

<a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>