<?php
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $message = "Registration successful for user: $username";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="assets/css/signup.css" >
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
</head>
<body>
    <div class="auth-container">
    <div class="img-container" >
            <img src="assets/img/logo dewa 1.png" >
        </div>
        <h2>Sign Up Dewa19 Page</h2>
        <form method="post" action="signup.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Sign Up">
        </form>
        <p><?php echo $message; ?></p>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>