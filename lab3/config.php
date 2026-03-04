
    <?php

$dsn = "mysql:host=localhost;dbname=lab_PHP_db;charset=utf8mb4";
$user = "root"; 
$pass = "123";          

try {
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}
