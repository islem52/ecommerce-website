<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=university_ecommerce', 'root', '');
    // var_dump($pdo); uncomment for debugging purposes

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
