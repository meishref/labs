<?php
include "config.php";
$users = $connection->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">
<h3>Users List</h3>
<a href="register.php" class="btn btn-primary">Add User</a>
</div>

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Country</th>
<th>Gender</th>
<th>Skills</th>
<th>Username</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php foreach($users as $user): ?>
<tr>
<td><?= $user['id'] ?></td>
<td><?= $user['first_name'] . " " . $user['last_name'] ?></td>
<td><?= $user['country'] ?></td>
<td><?= $user['gender'] ?></td>
<td><?= $user['skills'] ?></td>
<td><?= $user['username'] ?></td>
<td>
<a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $user['id'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

</div>
</div>
</div>
</body>
</html>