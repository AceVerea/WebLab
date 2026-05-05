<?php
session_start();

// If the user is NOT logged in, redirect them to the login page
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
$conn = new mysqli("localhost", "root", "", "Lab_5b");

// 1. FETCH existing data to fill the form
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

// 2. UPDATE data when form is submitted
if (isset($_POST['update'])) {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $updateSql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";
    
    if ($conn->query($updateSql) === TRUE) {
        header("Location: read.php"); // Go back to the list
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
<link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Update User</title>
</head>
<body>
<div class="logo-container">
        <a href="index.php">
            <img src="images/gambar.png" alt="Home Logo">
        </a>
    </div>
	<?php
    // Check if there is a success message in the session
    if (isset($_SESSION['success_msg'])) {
        // Print the message inside a styled div
        echo "<div class='success-banner'>" . $_SESSION['success_msg'] . "</div>";
        
        // Delete the message from the session so it doesn't show up again if you refresh the page
        unset($_SESSION['success_msg']);
    }
    ?>
    <h2>Update User Data</h2>
    <form action="update.php" method="POST">
        <label>Matric:</label>
        <!-- Matric is read-only because it is the Primary Key -->
        <input type="text" name="matric" value="<?php echo $user['matric']; ?>" readonly><br>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>

        <label>Role:</label>
        <select name="role" required>
            <option value="student" <?php if($user['role'] == 'student') echo 'selected'; ?>>Student</option>
            <option value="lecturer" <?php if($user['role'] == 'lecturer') echo 'selected'; ?>>Lecturer</option>
        </select><br>

        <input type="submit" name="update" value="Update">
        <a href="read.php">Cancel</a>
    </form>
</body>
</html>
