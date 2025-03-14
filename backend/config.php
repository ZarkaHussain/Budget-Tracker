<?php
// config.php
try {
    $db = new PDO('sqlite:' . __DIR__ . '/BudgetTracker.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($db);
    echo 'Database connection established.';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
