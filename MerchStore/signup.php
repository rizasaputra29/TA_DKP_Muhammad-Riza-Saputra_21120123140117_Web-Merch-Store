<?php
session_start();
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        $message = "Registration successful for user : $username";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
</head>
<body>
<div class="auth-container">
    <div class="img-container">
        <img src="assets/img/logo dewa 1.png" alt="Dewa19 Logo">
    </div>
    <h2>Sign Up Dewa19 Page</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required placeholder="Masukkan username Anda">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Konfirmasi password Anda">
        <input type="submit" value="Sign Up">
    </form>
    <?php if (!empty($message)) { ?>
        <p class="<?php echo ($message === 'Passwords do not match.') ? 'error-message' : 'success-message'; ?>">
            <?php echo $message; ?>
        </p>
    <?php } ?>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>