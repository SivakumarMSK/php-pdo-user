<?php
require 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    try{
        $insert = "insert into users(name,email,password) values(?,?,?)";
        $stmt=$conn->prepare($insert);
        $stmt->execute([$username,$email,$password]);
        header("Location: login.php");
        exit;    
    }
    catch(PDOException $e){
        echo "failed".$e->getMessage();
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        h2{
            text-align:center;
        }
        p{
            text-align:center;
        }
        form{
            position:absolute;  
            left:600px;
            top:150px;
            font-size:20px;
            border:1px solid black;
            padding:5px;
            width:300px
        }
        input{
            margin-bottom:10px;
            font-size:20px;
            display:block;
            margin:0 auto;
        }
        button{
            font-size:20px;
            position:relative;
            display:block;
            margin:0 auto;
            margin-top:5px;
            
        }
    </style>
</head>
<body>
    
    <form method="post">
    <h2>Register</h2>
    <input type="text" placeholder="Enter Name" name="name" required><br>
    <input type="email" placeholder="Enter Email" name="email" required><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>
    <button type="submit">Register</button>
    <p>Already Register? <a href="login.php">Login</a></p>
    </form>
</body>
</html>