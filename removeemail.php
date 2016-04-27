<?php
$dbc = mysqli_connect('localhost', 'root', 'mzr@sana', 'elvis_store')
or die('Error connecting to MySQL server.');


$email = $_POST['email'];
$query = "DELETE FROM email_list WHERE email = '$email'";


mysqli_query($dbc, $query)
or die('Error querying database.');

echo 'Customer removed: ' . $email;


mysqli_close($dbc);
?>
