<?php
// $host = "sql312.infinityfree.com";
// $username = "if0_37172028";
// $password = " Tejas2003 ";
// $dbname = "if0_37172028_my_data";

// Create connection
$conn = new mysqli('sql312.infinityfree.com', 'if0_37172028', 'Tejas2003', 'if0_37172028_my_data',3306);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}


// // Collect form data using POST
$name = $_POST['fname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// // Prepare the SQL query to insert data into the table
    $sql = "INSERT INTO contactus (fname, email,phone, message) VALUES ('$name', '$email', '$phone', '$message')";

// // Execute the query
if ($conn->query($sql) === TRUE) {
    header('Location:index.php');
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "something went wrong: " ;
}


// Close the connection
$conn->close();
?>
