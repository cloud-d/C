<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
       <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<a href="index.php" class="btn btn-primary" >
 Employee List
</a>
<br>
<br>
    <h2>Add Employee</h2>
    <form action="add_employee.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
</div>

<!-- Add the Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
