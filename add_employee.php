<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    // Prepare the SQL statement to insert data into the employees table
    $stmt = $db->prepare('INSERT INTO employees (name, email, phone, salary) VALUES (:name, :email, :phone, :salary)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':salary', $salary);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo '<script>alert("Employee added successfully."); window.location.href = "add.php";</script>';
    } else {
        // Error occurred while inserting data
        echo '<script>alert("Error: Unable to add employee."); window.location.href = "add.php";</script>';
    }

    // Close the database connection
    $db->close();
}
?>
