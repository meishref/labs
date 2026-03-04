<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="GET" action="day.php">

First Name:
<input type="text" name="fname"><br><br>

Last Name:
<input type="text" name="lname"><br><br>

Address:<br>
<textarea name="address" rows="4" cols="30"></textarea><br><br>

Country:
<select name="country">
    <option value="Egypt">Egypt</option>
    <option value="USA">USA</option>
    <option value="Germany">Germany</option>
</select><br><br>

Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<br><br>

Skills:<br>
<input type="checkbox" name="skills[]" value="PHP"> PHP <br>
<input type="checkbox" name="skills[]" value="MySQL"> MySQL <br>
<input type="checkbox" name="skills[]" value="J2SE"> J2SE <br>
<input type="checkbox" name="skills[]" value="PostgreSQL"> PostgreSQL <br><br>

Username:
<input type="text" name="username"><br><br>

Password:
<input type="password" name="password"><br><br>

Department:
<input type="text" name="department" value="OpenSource" readonly><br><br>

<input type="submit" value="Submit">
<input type="reset" value="Reset">

</form>

</body>
</html>