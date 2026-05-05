<?php
session_start();

// If the user is NOT logged in, redirect them to the login page
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Users List</title>
</head>
<body>
<div class="logo-container">
        <a href="index.php">
            <img src="images/gambar.png" alt="Home Logo">
        </a>
    </div>
    <table border="1">
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th>Action</th> <!-- New Column -->
        </tr>

        <?php
        $conn = new mysqli("localhost", "root", "", "Lab_5b");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT matric, name, role FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["matric"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                // Adding the Update and Delete links with the matric ID
               echo "<td>
        <a href='update.php?matric=" . $row["matric"] . "'>Update</a> 
        <a href='delete.php?matric=" . $row["matric"] . "' onclick=\"return confirm('Are you sure you want to delete this user? This cannot be undone.');\">Delete</a>
      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>
