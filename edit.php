<?php
//connection
try{
$connection = new pdo ("mysql:host=localhost;dbname=myDB","root","");
    


if(isset($_GET['id'])){
    //Query
    $data=$connection->query("select * from student where id ={$_GET['id']}");
    if($data->rowCount()>0){
        $student_info=$data->fetch();
    }

} if(isset($_POST["update"])){

    $data=$connection->query("update student set 
    fname='{$_POST['fname']}',
    lname='{$_POST['lname']}',
    email='{$_POST['email']}',
    phone={$_POST['phone']} 
    where id = {$_POST['id']}
    
    ");

    header("Location:listallstudent.php");
}
}
catch(PDOException $e){
    $e->getMessage();
  
  }

?>
<html>
<body>
<form method="post"> 
    <input type="hidden" name="id" value="<?= $student_info['id']?>" placeholder="First Name .."><br>
    <input type="text" name="fname" value="<?= $student_info['fname']?>" placeholder="First Name .."><br>
    <input type="text" name="lname"  value="<?= $student_info['lname']?>" placeholder="Last Name .."><br>
    <input type="text" name="email" value="<?= $student_info['email']?>" placeholder="Email .."><br>
    <input type="text" name="phone" value="<?= $student_info['phone']?>" placeholder="Phone .."><br>

    <input type="submit"  value="Update Student" name="update">
</form>

</body>


</html>