<?php
// (1)example of magic methods

// class test
// {
// function __construct()
// {
// echo 1;
// }
// function __destruct()
// {
// echo 2;
// }
// }
// $objT = new test(); //__construct get automatically executed and print 1 on screen
// unset($objT);//__destruct triggers and print 2.




//(2)example in magic methods
// Following is example of __get , __set , __call and __callStatic magic methods


// class test
// {
// function __get($name)
// {
// echo "__get executed with name $name ";
// }
// function __set($name , $value)
// {
// echo "__set executed with name $name , value $value";
// }
// function __call($name , $parameter)
// {
// $a = print_r($parameter , true); //taking recursive array in string
// echo "__call executed with name $name , parameter $a";
// }
// static function __callStatic($name , $parameter)
// {
// $a = print_r($parameter , true); //taking recursive array in string
// echo "__callStatic executed with name $name , parameter $a";
// }
// }
// $a = new test();
// $a->abc = 3;//__set will executed
// $app = $a->pqr;//__get will triggerd
// $a->getMyName('ankur' , 'techflirt', 'etc');//__call willl be executed
// test::xyz('1' , 'qpc' , 'test');//__callstatic will be executed




//(3) example of magic methods
// Following is example of __isset and __unset magic method in php

class test
{
function __isset($name)
{
echo "__isset is called for $name";
}
function __unset($name)
{
echo "__unset is called for $name";
}
}
$a = new test();
isset($a->x);
unset($a->c);

  ?>
