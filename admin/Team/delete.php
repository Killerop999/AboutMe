<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['id'])) {
    // Get the ID of the record to delete
    $id = $_GET['id'];

    // Database connection
    $conn = new mysqli('sql312.infinityfree.com', 'if0_37172028', 'Tejas2003', 'if0_37172028_my_data', 3306);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to delete the record
    $sql = "DELETE FROM team_data WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind the parameters and execute the query
    $stmt->bind_param("i", $id);  // 'i' for integer
    if ($stmt->execute()) {
        // Redirect back to the admin panel after deletion
        header("Location: ../admin.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID specified.";
}
?>
