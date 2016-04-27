<?php
class Student {
  private $marks;
  private $attendencePercentage;
  //pass marks and attendence
  public function setMarks($marks) {
    #Assign marks here
    $this->marks=$marks;
  }
  public function getMarks() {

  #return marks here
   return $this->marks;
  }
public function setAttendence( $attendence) {
  #assign attendence
  $this->attendencePercentage=$attendence;
}
public function getAttendence() {
  #return attendence
  return $this->attendencePercentage;

}
public function hasPassed() {
//if marks greater than 30 then return 'true' else return 'false';

if($this->marks>=35) {
  return true;

}
else{
  return false;
}
}
public function hasToPayCondonation() {
if($this->attendencePercentage<75) {
  return true;
}
else {
  return false;
}
}

}


//create 3 students objects
$Rakesh =new Student ();
$Rakesh->setMarks(75);
//assign marks and attendence
$Rakesh->setAttendence(80);
//print people who are passed,failed,have condonation
if($Rakesh->haspassed()) {

echo "Rakesh has passed";
}
else {
  echo "Oops Rakesh has failed";
}
 echo "<br>";
if($Rakesh->HasToPayCondonation()) {
  echo "Rakesh has to pay Condonation";
}
else {
  echo "Hurrey No Condonation for Rakesh";
}
echo "<br>";
echo "<br>";
$Hari =new Student ();
$Hari->setMarks(20);
//assign marks and attendence
$Hari->setAttendence(50);
//print people who are passed,failed,have condonation
if($Hari->haspassed()) {

echo "Hari has passed";
}
else {
  echo "Oops Hari has failed";
}
 echo "<br>";
if($Hari->HasToPayCondonation()) {
  echo "Hari has to pay Condonation";
}
else {
  echo "Hurrey No Condonation for Hari";
}

 ?>
   
