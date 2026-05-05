<?php
// 1. Start the session at the VERY TOP of the file
session_start(); 

if (isset($_POST['login'])) {
    $conn = new mysqli("localhost", "root", "", "Lab_5b");
    
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT matric, password FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // SUCCESS: Set the session variables to "remember" the user
            $_SESSION['user_logged_in'] = true; 
            $_SESSION['matric'] = $user['matric'];
            
            // Redirect to the display page
            header("Location: read.php");
            exit();
        } else {
            $error = "Invalid password, please try again.";
        }
    } else {
        $error = "User not found, please try again.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Login Page</title>
</head>
<body>
<div class="logo-container">
        <a href="index.php">
            <img src="images/gambar.png" alt="Home Logo">
        </a>
    </div>
    <h1>Login</h1>
    
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form action="login.php" method="POST">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>

    <p><a href="main.php">Register</a> here if you have not.</p>
</body>
</html>