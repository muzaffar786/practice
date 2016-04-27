<?php

//(1)example of visiblity in php

// example of the public visibility in php classes:
class test
{
public $abc;
public $xyz;
public function xyz()
{
}
}
$objA = new test();
echo $objA->abc;//accessible from outside
$objA->xyz();//public method of the class test
 ?>
