<?php
include "config.php";

if(isset($_POST['register'])){

    $skills = isset($_POST['skills']) ? implode(',', $_POST['skills']) : '';

    $stm = $connection->prepare("
        INSERT INTO users 
        (first_name,last_name,address,country,gender,skills,username,password,department)
        VALUES (?,?,?,?,?,?,?,?,?)
    ");

    $stm->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['address'],
        $_POST['country'],
        $_POST['gender'] ?? '',
        $skills,
        $_POST['username'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['department']
    ]);

    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-primary text-white">
<h4>Register User</h4>
</div>
<div class="card-body">

<form method="POST">

<div class="row mb-3">
<div class="col">
<input class="form-control" name="first_name" placeholder="First Name" required>
</div>
<div class="col">
<input class="form-control" name="last_name" placeholder="Last Name" required>
</div>
</div>

<div class="mb-3">
<textarea class="form-control" name="address" placeholder="Address"></textarea>
</div>

<div class="mb-3">
<input class="form-control" name="country" placeholder="Country">
</div>

<div class="mb-3">
<select class="form-select" name="gender">
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
</select>
</div>

<div class="mb-3">
<label>Skills</label><br>
<input type="checkbox" name="skills[]" value="PHP"> PHP
<input type="checkbox" name="skills[]" value="MySQL"> MySQL
<input type="checkbox" name="skills[]" value="Java"> Java
</div>

<div class="mb-3">
<input class="form-control" name="username" placeholder="Username">
</div>

<div class="mb-3">
<input type="password" class="form-control" name="password" placeholder="Password">
</div>

<div class="mb-3">
<input class="form-control" name="department" value="OpenSource">
</div>

<button class="btn btn-success" name="register">Register</button>
<a href="list.php" class="btn btn-secondary">View Users</a>

</form>
</div>
</div>
</div>
</body>
</html>
