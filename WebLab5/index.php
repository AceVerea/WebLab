<?php
session_start(); // Start session to check if user is logged in
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/favicon.ico">
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<div class="logo-container">
        <a href="index.php">
            <img src="images/gambar.png" alt="Home Logo">
        </a>
    </div>
    <h1>Welcome to the User Management System</h1>

    <?php if (isset($_SESSION['user_logged_in'])): ?>
        <!-- What logged-in users see -->
        <p>Welcome back! You are logged in with Matric ID: <strong><?php echo $_SESSION['matric']; ?></strong></p>
        
        <a href="read.php" class="btn">View User List</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>

    <?php else: ?>
        <!-- What guests (not logged in) see -->
        <p>Please log in or register a new account to continue.</p>
        
        <a href="login.php" class="btn">Login</a>
        <a href="main.php" class="btn btn-secondary">Register New User</a>

    <?php endif; ?>

</body>
</html>