<?php
require_once "config1.php";
function executequery($query) {
  $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("error connecting db");
  // echo $query;
  $result = mysqli_query($dbc,$query) or die("error querying db");
  mysqli_close($dbc);
  return $result;
  }

  function isusernameExists($username) {
    $query = "select *from users where username =' $username'";
    $result = executequery($query);
    if(mysqli_num_rows($result) > 0) {
      return true;
    }
    else {
      return false;
    }
    }
    function isEmailExists($email) {
      $query = "select * from users where email = '$email'";
      $result = executequery($query);
      if(mysqli_num_rows($result) > 0) {
        return true;
      }
      else{
        return false;
      }
    }
    function isValidCredentials($username,$password) {
      $query = "select * from users where username = '$username' and password = SHA('$password')";
      $result = executequery($query);
      if(mysqli_num_rows($result) > 0) {
        // $rowArray = mysqli_fetch_array($result);
        // if($password == $rowArray[4]) {
          return true;
        }
        else {
          return false;
        }
      }



    function getUserId($username) {
      $query = "select * from users where username = '$username'";
      $result = executequery($query);
      $rowArray = mysqli_fetch_array($result);
      return $rowArray[0];
    }

    function getTasks($isDone){
 $userId = $_SESSION['userId'];
 $query = "select * from list where userid = '$userId' and is_done = '$isDone'";
 $result = executeQuery($query);
 return $result;
}



function markTask($id,$isDone){
 $query = "update list set is_done = $isDone where id=$id";
 $result = executeQuery($query);
}
function removeTask($id){
 $query = "delete from list where id = $id";
 $result = executeQuery($query);
}

 ?>
