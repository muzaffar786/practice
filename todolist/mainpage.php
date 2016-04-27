<!DOCTYPE html>
<html>
  <head>
    <title>home @ todolist</title>
    <style media="screen">
      .edit{
        text-align: center;
        /*float: left;*/
        color: white;
        background: #1C3E48;
        width: 33%;
        height: 30px;
        padding-top: 20px;
        float: left;
      }

      .look{
        border:1px solid  red;
        border-radius: 5px;
        /*border-left: 30px;*/
        /*border-right: 30px;*/
        background:blue;
        text-decoration: none;
        color:white;
        padding: 8px;
        /*margin-right: 30px;*/
        /*margin-left: 350px;*/
      }
      body{
        background:pink;
      }
      .adjust{
        border-radius: 10px;
        text-align: center;
        width: 350px;
        margin-left: 400px;
        margin-top: 50px;
        height: 30px;
      }
      .adjust1{
        border-radius: 10px;
        width: 100px;
        height: 30px;
      }
      .empty{
        text-align: center;
        font-size:100px;
        color: white;
           }
         .addingtask{
           border: solid 1px white;
           text-align: center;
           width: 350px;
           background: white;
           color: teal;
           border-radius:10px;
           margin-left: 400px;
           height: 25px;
           padding-top: 5px;
           display: inline-block;
              }
         .addingtask2{
           border: solid 1px white;
           text-align: center;
           width: 350px;
           background: white;
           color: teal;
           border-radius:10px;
           margin-left: 400px;
           height: 25px;
           padding-top: 5px;
           display: inline-block;
           text-decoration: line-through;
         }
         .add{
           border-radius: 10px;
           width: 100px;
           height: 35px;
         }
        .addForm{
          display: inline;
        }
    </style>
  </head>
  <body>
  <?php
  session_start();
  if(!isset($_SESSION['userId']) || !isset($_SESSION['username'])){
    header("Location: todologin.php");
    exit();
  }else{
    require_once ("dputility.php");
    $errorMsg="";
   ?>
    <div >
      <p class="edit">
          TO DO LIST
      </p>
    </div>
    <div >
      <p class="edit">
         Welcome to <?php echo $_SESSION['username']; ?>
      </p>
    </div>
    <div>
      <p class="edit">
      <a class="look" href="logout1.php">Logout</a>
    </p>
    </div>
    <?php
          if(isset($_POST['add'])){
        $user_id = $_SESSION['userId'];
        $task_name = mysqli_real_escape_string(trim($_POST['name']));
        if(!empty($task_name)){
          $is_done = 0;
          $query = "insert into list(taskname,is_done,userid)values('$task_name','$is_done','$user_id')";
          echo $query;
          $result=executequery($query);
        }
        else{
          $errorMsg = "Task name not found! <br>";
        }
      }
     ?>
    <form class="" action="" method="post">
      <?php echo $errorMsg; ?>
      <input class="adjust" type="text" name="name" value="" placeholder="Task Name">
      <input class="adjust1" type="submit" name="add" value="Add Task">
    </form>
        <?php
        //code to mark a task as done
      if(isset($_POST['done'])){
         $id = $_POST['id'];
         markTask($id,1);

        }
        // //code to undo a task
      if(isset($_POST['undo'])){
          $id = $_POST['id'];
          markTask($id,0);
        }
        //dleteing the task
      if(isset($_POST['delete'])){
          $id = $_POST['id'];
          removeTask($id);
      }

      $noTasks = 0;
      $toDoResult = getTasks(0);
      if(mysqli_num_rows($toDoResult)>0){
        while($row = mysqli_fetch_array($toDoResult)){
    ?>
      <div class="">
        <p class="addingtask">
            <?php echo $row[2];?>
        </p>
        <form class="addForm" action="" method="post">
          <input type="hidden" name="id" value="<?php echo $row[0];?>">
          <input class ="add" type="submit" name="done" value="DONE">
        </form>
        <form class="addForm" action="" method="post">
          <input type="hidden" name="id" value="<?php echo $row[0];?>">
          <input class ="add" type="submit" name="delete" value="Delete">
        </form>
     </div>
      <?php
        }
      } else {
        $noTasks++;
      }
    }
     ?>
     <hr>
      <?php
        $doneResult = getTasks(1);
        if(mysqli_num_rows($doneResult)>0){
        while($row = mysqli_fetch_array($doneResult)){
       ?>
       <p class="addingtask">
           <del><?php echo $row[2];?></del>
       </p>
       <form class="addForm" action="" method="post">
         <input type="hidden" name="id" value="<?php echo $row[0];?>">
         <input class ="add" type="submit" name="undo" value="Undo">
       </form>
       <form class="addForm" action="" method="post">
         <input type="hidden" name="id" value="<?php echo $row[0];?>">
         <input class ="add" type="submit" name="delete" value="Delete">
       </form>
      <?php
          }
        } else {
          $noTasks++;
        }
       ?>
      <?php
      if($noTasks == 2 ){
          // Show no tasks code
          ?>
          <p class="empty">
            NO TASKS
          </p>
      <?php
      }
       ?>
  </body>
</html>
