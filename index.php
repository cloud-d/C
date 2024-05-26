<?php
// Connect to the SQLite database
$db = new SQLite3('database.db');

// Create the employees table if it does not exist
$query = "CREATE TABLE IF NOT EXISTS employees (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    phone TEXT NOT NULL,
    salary REAL NOT NULL
)";
$db->exec($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles (if needed) */
        .action-dropdown {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .table-hover tr:hover .action-dropdown {
            display: block;
        }
        .action-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .action-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container mt-4">
<a href="add.php" class="btn btn-primary">
Add Employee
</a>
<br>
<br>
    <h2>Employee Data</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Prepare and execute the SQL query to fetch all employees
            $result = $db->query('SELECT * FROM employees');

            // Loop through the result and create HTML table rows dynamically
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['salary'] . '</td>';
                echo '<td>
                    <div class="action-dropdown">
                        <a href="edit.php?id='.$row['id'].'" class="action-item">Edit</a>
                        <a href="delete.php?id='.$row['id'].'" class="action-item">Delete</a>
                    </div>
                    <span class="btn btn-sm btn-secondary">▼</span>
                </td>';
                echo '</tr>';
            }

            // Close the database connection
            $db->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Add the Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
