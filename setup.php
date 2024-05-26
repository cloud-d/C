<?php
// Connect to the SQLite database
$db = new SQLite3('database.db');

// Check if the "employees" table exists
$tableExists = $db->querySingle("SELECT 1 FROM sqlite_master WHERE type='table' AND name='employees'");

// If the "employees" table does not exist, create it
if (!$tableExists) {
    $db->exec("CREATE TABLE employees (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        salary REAL NOT NULL
    )");

}
?>

