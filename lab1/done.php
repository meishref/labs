<?php


$fname = $_GET['fname'];
$lname = $_GET['lname'];
$address = $_GET['address'];
$country = $_GET['country'];
$gender = $_GET['gender'];
$username = $_GET['username'];
$department = $_GET['department'];

$title = ($gender == "Male") ? "Mr" : "Miss";
echo "Welcome $title $fname $lname <br>";
echo "Your address is: $address <br>";
echo "Your country is: $country <br>";
echo "Your username is: $username <br>";
echo "Your department is: $department <br>";



?><br>