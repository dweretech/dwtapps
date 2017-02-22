<?php
 
class MyClass
{
  public $prop1 = "I'm a class property!";
 
  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }
 
  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
// Create a new object
$obj = new MyClass;
 
// Get the value of $prop1
echo $obj->getProperty();
 
// Output a message at the end of the file
echo "End of file.<br />";
 
?>

