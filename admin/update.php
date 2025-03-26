<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    // Get the form data
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('sql312.infinityfree.com', 'if0_37172028', 'Tejas2003', 'if0_37172028_my_data', 3306);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to update the record
    $sql = "UPDATE contactus SET fname = ?, email = ?, phone = ?, message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind the parameters and execute the query
    $stmt->bind_param("ssssi", $fname, $email, $phone, $message, $id);  // 's' for string, 'i' for integer
    if ($stmt->execute()) {
        // Redirect back to the admin page after updating
        header("Location: admin.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
