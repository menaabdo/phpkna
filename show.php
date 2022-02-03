<?php
//connection
try{
// $connection = new pdo ("mysql:host=localhost;dbname=myDB","root","");
require_once("db.php");
///////// Connection ///////

$connObject=new DB();
$connection=$connObject->getConnection();   
$data=$connObject->getOnElement('student',"id ={$_GET['id']}");
//Query
//$data=$connection->query("select * from student where id ={$_GET['id']}");
if($data->rowCount()>0){
  $student_info=$data->fetch();
  echo "<ul>";
  echo "<li> {$student_info['fname']} </li>";
  echo "<li> {$student_info['lname']} </li>";
  echo "<li> {$student_info['email']} </li>";
  echo "<li> {$student_info['phone']} </li>";
  echo "</ul>";

}
}
//Close
catch(PDOException $e){
  $e->getMessage();

}






?>