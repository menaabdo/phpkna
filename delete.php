<?php


//connection
//$connection = new mysqli ("localhost","root","","osphp_kina");
try{
    //$connection = new pdo ("mysql:host=localhost;dbname=myDB","root","");
    require_once("db.php");
///////// Connection ///////

$connObject=new DB();
$connection=$connObject->getConnection();
    //Query
    // $connObject->connObject("delete from student where id ={$_GET['id']}");
    $q=' id ';
   
   settype($_GET['id'], "integer");
    var_dump(" id ={$_GET['id']}");
    $connObject->delete("student"," id ={$_GET['id']}");
    
    header("Location:listallstudent.php");

    //Close
    //$connection->close();
    $connection=null;
}catch(PDOException $e){
    $e->getMessage();

}






?>