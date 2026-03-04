<?php

$file = "file.txt";


if(isset($_POST["add"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];

    $data = "$fname|$lname|$country|$gender|$username\n";
    file_put_contents($file, $data, FILE_APPEND);

}


if(isset($_GET["delete"])){

    $id = $_GET["delete"];
    $lines = file($file);
    unset($lines[$id]);
    file_put_contents($file, implode("", $lines));
    header("Location: list.php");
}


if(isset($_POST["update"])){

    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];

    $lines = file($file);
    $lines[$id] = "$fname|$lname|$country|$gender|$username\n";
    file_put_contents($file, implode("", $lines));
    header("Location: list.php");
}


$users = file_exists($file) ? file($file) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD System</title>
</head>
<body>

<h2>Add User</h2>
<form method="POST">
    First Name: <input type="text" name="fname" required>
    Last Name: <input type="text" name="lname" required>
    Country: <input type="text" name="country" required>
    Gender: <input type="text" name="gender" required>
    Username: <input type="text" name="username" required>
    <button type="submit" name="add">Add</button>
</form>

<hr>

<h2>Users Table</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Country</th>
    <th>Gender</th>
    <th>Username</th>
    <th>Action</th>
</tr>

<?php foreach($users as $index => $line): 
    $user = explode("|", trim($line));
?>

<tr>
    <td><?php echo $index; ?></td>
    <td><?php echo $user[0]; ?></td>
    <td><?php echo $user[1]; ?></td>
    <td><?php echo $user[2]; ?></td>
    <td><?php echo $user[3]; ?></td>
    <td><?php echo $user[4]; ?></td>
    <td>
        <a href="?view=<?php echo $index; ?>">View</a>
    </td>
</tr>

<?php endforeach; ?>
</table>

<hr>

<?php

if(isset($_GET["view"])){

    $id = $_GET["view"];
    $user = explode("|", trim($users[$id]));
?>

<h2>View User ID: <?php echo $id; ?></h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    First Name: <input type="text" name="fname" value="<?php echo $user[0]; ?>"><br><br>
    Last Name: <input type="text" name="lname" value="<?php echo $user[1]; ?>"><br><br>
    Country: <input type="text" name="country" value="<?php echo $user[2]; ?>"><br><br>
    Gender: <input type="text" name="gender" value="<?php echo $user[3]; ?>"><br><br>
    Username: <input type="text" name="username" value="<?php echo $user[4]; ?>"><br><br>

    <button type="submit" name="update">Update</button>
    <a href="?delete=<?php echo $id; ?>" onclick="return confirm('Delete?')">Delete</a>
</form>

<?php } ?>

</body>
</html>