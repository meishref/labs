<?php

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$address = $_GET["address"];
$country = $_GET["country"];
$gender = $_GET["gender"];
$username = $_GET["username"];
$department = $_GET["department"];

$file = fopen("file.txt","w");

fwrite($file,"First Name: $fname \n");
fwrite($file,"Last Name: $lname \n");
fwrite($file,"Address: $address \n");
fwrite($file,"Country: $country \n");
fwrite($file,"Gender: $gender \n");
fwrite($file,"Username: $username \n");
fwrite($file,"Department: $department \n");

fclose($file);

?>