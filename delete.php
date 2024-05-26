<?php
// Check if the employee ID is provided
if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];

    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    // Prepare and execute the SQL query to delete the employee with the given ID
    $stmt = $db->prepare('DELETE FROM employees WHERE id = :id');
    $stmt->bindParam(':id', $employeeId);

    if ($stmt->execute()) {
        // Employee deleted successfully
        echo '<script>alert("Employee deleted successfully."); window.location.href = "index.php";</script>';
    } else {
        // Error occurred while deleting the employee
        echo '<script>alert("Error: Unable to delete employee."); window.location.href = "index.php";</script>';
    }

    // Close the database connection
    $db->close();
} else {
    // Redirect back to index.php if the employee ID is not provided
    header('Location: index.php');
    exit();
}
?>
