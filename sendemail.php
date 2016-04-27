<?php
$from = 'amuzaffar857@gmail.com';
$subject = $_POST['subject'];
$text = $_POST['elvismail'];

if(empty($subject) && empty($text)){
}
else {
  if (empty($subject) ||empty($text)){
    if(empty($subject)){
      echo 'you firget the email subject.<br />';
    }
    else {
      echo 'you forget the email body.<br />';
    }
  }
  else {


$dbc = mysqli_connect('localhost', 'root', 'mzr@sana', 'elvis_store')
or die('Error connecting to MySQL server.');


$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc, $query)
or die('Error querying database.');


while ($row = mysqli_fetch_array($result)){
$to = $row['email'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$msg = "Dear $first_name $last_name,\n$text";
mail($to, $subject, $msg, 'From:' . $from);
echo 'Email sent to: ' . $to . '<br />';
}

mysqli_close($dbc);
}
}

?>
