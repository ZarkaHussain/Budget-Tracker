<?php

// Define PDO - tell about the database file
$pdo = new PDO('sqlite:BudgetTracker.db');

// Write SQL
$statement = $pdo->query('SELECT * FROM "Budget Category"');

// Run the SQL
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

// Show it on screen
var_dump($rows);
?>
