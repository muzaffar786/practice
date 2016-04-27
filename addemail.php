<?php

$dbc = mysqli_connect('localhost', 'root', 'mzr@sana', 'elvis_store')
or die('Error connecting to MySQL server.');

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];

$query = "INSERT INTO email_list (first_name, last_name, email) " .
"VALUES ('$first_name', '$last_name', '$email')";

$result = mysqli_query($dbc,$query) or die("Error querying database.");
echo 'Customer added.' . '<br />';
echo 'your first name is ' . $first_name . '<br />';
echo 'your last name is ' . $last_name . '<br />';
echo 'your email address is: ' . $email . '<br />';


mysqli_close($dbc);


 ?>
