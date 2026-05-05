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

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Delete the user based on the matric received from the URL
    $sql = "DELETE FROM users WHERE matric = '$matric'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_msg'] = "User successfully deleted!"; // Create the message
        header("Location: read.php"); 
        exit();
    
    }
}

$conn->close();
?>
