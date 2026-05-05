<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Registration Page</title>
</head>
<body>
<div class="logo-container">
        <a href="index.php">
            <img src="images/gambar.png" alt="Home Logo">
        </a>
    </div>
    <form action="main.php" method="POST">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="">Please select</option>
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // 1. Database Connection
        $conn = new mysqli("localhost", "root", "", "Lab_5b");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 2. Get data from form
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hashing
        $role = $_POST['role'];

        // 3. Prepare and Execute SQL
        $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";

        try {
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color:green;'>Registration successful!</p>";
            }
        } catch (mysqli_sql_exception $e) {
            // Error code 1062 means "Duplicate entry"
            if ($e->getCode() == 1062) {
                echo "<p style='color:red;'>Registration failed: That Matric number is already registered!</p>";
            } else {
                echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
            }
        }
	}
    ?>
</body>
</html>
