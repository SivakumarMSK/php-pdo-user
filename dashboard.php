<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <div>
        <h2>Welcome, <?= $_SESSION["user"]["name"] ?>!</h2>
        <p>You are Now Logged in.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>