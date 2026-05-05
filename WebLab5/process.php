<?php
// 1. Retrieve the data from the global $_POST array
$number = $_POST['user_num'];

// 2. Perform the calculation
// Use the $number variable retrieved above
$result = $number * $number; 

// 3. Output the result back to the browser
echo "<h1>Calculation Result</h1>";
echo "<p>The square of $number is: <b>$result</b></p>";

// Replace 'index.html' with the actual name of your form page
echo '<br><a href="index.php">Go Back</a>';
?>
