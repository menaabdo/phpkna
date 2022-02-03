
<?php
require_once("db.php");
///////// Connection ///////

$connObject=new DB();
$connection=$connObject->getConnection();
    //

    // $connection = new mysqli ("localhost","root","","myDB");
    // if($connection->connect_error){
    //     die("connection fail .. ".$conn->connect_error);
    // }
    session_start();
    if(isset($_SESSION['user']))
    {echo 'hello'.$_SESSION['user'];}
    ///////////////////////////////////////////////////////
    $data =$connection->query("select * from student");
    if($data->rowCount() >0){
       echo "<table border=1>
            <tr>
            <th> # </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>";
       
       while($row=$data->fetch()){
    
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['fname']}</td>";
        echo "<td>{$row['lname']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td><a href='show.php?id={$row['id']}'>Show</a></td>";
        echo "<td><a href='edit.php?id={$row['id']}'>Edit</a></td>";
        echo "<td><a href='delete.php?id={$row['id']}'>Delete</a></td>";
    
    
         echo "</tr>";
       }
     
       echo "</table>";
       
       
    }else{
    
        echo "No data in database";
    }





?>

