<?php
include "config.php";

$id = $_GET['id'];

$stm = $connection->prepare("DELETE FROM users WHERE id=?");
$stm->execute([$id]);

header("Location: list.php");
exit();