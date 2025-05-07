<?php
require 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "select * from users where email=?";
    $stmt=$conn->prepare($select);
    $stmt->execute([$email]);
    $user=$stmt->fetch();
    if($user && password_verify($password,$user["password"]))
    {
        $_SESSION["user"] = $user;
        header("Location: dashboard.php");
        exit;
    }
    else{
        echo "invalid Email or password";
        
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        h2{
            text-align:center;
            
        }
        p{
            text-align:center;
        }
        form{
            position:absolute;
            margin-left:600px;
            top:150px;
            border:1px solid black;
            font-size:20px;
            padding:5px;
            width:300px;
        }
        input{
            margin-bottom:10px;
            font-size:20px;
            display:block;
            margin:0 auto;
        }
        button{
            position:relative;
            display:block;
            margin:0 auto;
            margin-top:5px;
            font-size:20px;
        }
    </style>
</head>
<body>
    
    <form method="post">
    <h2>Login</h2>
    <input type="text" placeholder="Enter email" name="email" required><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>
    <button type="submit">Login</button><p>Don't Register?<a href="register.php">Register</a></p>
    </form>
</body>
</html>