<?php

//connection 

//1-mysqli (oop)
/*$conn= new mysqli("localhost","root","");

if($conn->connect_error){
   die("connection fail .. ".$conn->connect_error);
}
else{
    //2- query
    $conn->query("create database osphp_kina");
}
//3-close
$conn->close();*/

/*

//1- connection 
$connection= new mysqli("localhost","root","","osphp_kina");
if($connection->connect_error){
    die("connection fail .. ".$conn->connect_error);
}
//2- query
$connection->query("create table student (
    id int not null primary key AUTO_INCREMENT ,
    fname varchar(30),
    lname varchar(30),
    email varchar(30),
    phone int
    )");
//3- close 
$connection->close();
*/

/*
//1- connection 
$connection = new mysqli ("localhost","root","","osphp_kina");
if($connection->connect_error){
    die("connection fail .. ".$conn->connect_error);
}
//2- query 
$connection->query("insert into student set fname='Kamal',lname='Ahmed',email='test@test.com',phone=1234 ");

//3-close
$connection->close();*/
session_start();
// if(isset($_GET['error'])){
    
// foreach( $_SESSION['error'] as $key => $value){
// echo $value;}}
?>

    <form action="control.php" > 
        <?php

    if(isset($_GET['error'])){
        $err=json_decode($_GET['error']);
        if(isset($err->empty))echo $err->empty.'<br>';
        // if(isset($err->fname))echo $err->fname.'<br>';
        // if(isset($err->email))echo $err->email.'<br>';
            }
            
    ?>
    <input type="text" name="fname" placeholder="First Name .." ><br>
    <?php if(isset($err->fname))echo $err->fname.'<br>';?>
    <input type="text" name="lname" placeholder="Last Name .."><br>
    <?php if(isset($err->lname))echo $err->lname.'<br>';?>
    <input type="text" name="email" placeholder="Email .."><br>
   <?php if(isset($err->email))echo $err->email.'<br>'; ?>
    <input type="text" name="phone" placeholder="Phone .."><br>
    <input type="password" name="pass" placeholder="Password .."><br>
    <input type="submit"  value="Add Student" name="add">
    </form>
    



