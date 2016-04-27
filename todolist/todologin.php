<!DOCTYPE html>
<html>
  <head>
    <title>login form</title>
    <style media="screen">


    </style>
  </head>
  <body>
    <?php
    $error = "";
    require_once "dputility.php";
     if(isset($_POST['login'])) {
       $gotusername = trim($_POST['username']);
       $gotpwd = $_POST['password'];
       if(isValidCredentials($gotusername,$gotpwd)) {
         session_start();
         $_SESSION['username'] = $gotusername;
        //  setcookie('username',$gotusername);
        //  setcookie('userid',getUserId($gotusername));
        $userId = getUserId($gotusername);
        $_SESSION['userId']=$userId;
        // setcookie('userId',$userId);
         echo "logged in successfully";
         header("Location: mainpage.php");

       }
       else{
         $error = "invalid credentials.please try again";
       }
     }

     ?>
    <div class="container">
      <form class=""  method="post">
        <?php echo $error; ?>
        <label for="username">username :</label>
        <input type="text" name="username" value="">
        <br>
        <label for="userpassword">password :</label>
        <input type="password" name="password" value="">
        <br>
        <input type="submit" name="login" value="login">

      </form>


  </body>
</html>
