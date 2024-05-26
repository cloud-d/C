<?php
if (isset($_GET['id'])) {
    // Connect to the SQLite database
    $db = new SQLite3('database.db');

    $id = $_GET['id'];

    // Prepare and execute the SQL query to fetch the employee by their ID
    $stmt = $db->prepare('SELECT * FROM employees WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    // Check if the employee with the provided ID exists
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // Employee exists, display the edit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission and update employee data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $salary = $_POST['salary'];

            // Prepare and execute the SQL query to update employee data
            $stmt = $db->prepare('UPDATE employees SET name = :name, email = :email, phone = :phone, salary = :salary WHERE id = :id');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':salary', $salary);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                // Employee data updated successfully
                echo '<script>alert("Employee data updated successfully."); window.location.href = "index.php";</script>';
                exit;
            } else {
                // Error occurred while updating employee data
                echo '<script>alert("Error: Unable to update employee data.");</script>';
            }
        }
    } else {
        // Employee with the provided ID doesn't exist
        echo '<script>alert("Error: Employee ID not found."); window.location.href = "index.php";</script>';
    }

    // Close the database connection
    $db->close();
} else {
    // No ID provided
    echo '<script>alert("Error: Employee ID not provided."); window.location.href = "index.php";</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<a href="index.php" class="btn btn-primary" >
 Back
</a>
<br>
<br>
    <h2>Edit Employee</h2>
    <form method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $row['salary']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>

<!-- Add the Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
