<?php
include "config.php";

$id = $_GET['id'];

$user = $connection->prepare("SELECT * FROM users WHERE id=?");
$user->execute([$id]);
$user = $user->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $skills = isset($_POST['skills']) ? implode(',', $_POST['skills']) : '';

    $stm = $connection->prepare("
        UPDATE users SET
        first_name=?, last_name=?, address=?, country=?, gender=?, skills=?, username=?, department=?
        WHERE id=?
    ");

    $stm->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['address'],
        $_POST['country'],
        $_POST['gender'],
        $skills,
        $_POST['username'],
        $_POST['department'],
        $id
    ]);

    header("Location: list.php");
    exit();
}
?>
