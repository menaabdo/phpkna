
<?php
// try{
//     $connection = new pdo ("mysql:host=localhost;dbname=myDB","root","");}
    
// catch(PDOException $e){
//     $e->getMessage();

//  }
require_once("db.php");
///////// Connection ///////

$connObject=new DB();
$connection=$connObject->getConnection();
/////////////////////////////////////////////
session_start();
if(isset($_GET['login'])){
    $data=$connection->prepare("select * from student where email =?AND pass=?");
    $data->bindValue(1, $_GET['mail'], PDO::PARAM_STR);
    $data->bindValue(2, $_GET['pass'], PDO::PARAM_INT);
    $data->execute();
    
    if($data->rowCount()>0){
        $student_info=$data->fetch();
        $_SESSION['user']=$student_info['fname'];
        header("Location:listallstudent.php");
    }
    else{echo 'sorry this email not found';}
}
/////////////////////////
$errors=[];
if(isset($_GET['add'])){
    
    if(empty ($_GET["pass"])||empty($_GET["fname"])||empty($_GET["email"])){
        $errors['empty']='please fill required fields';}
        //$err=json_encode($errors);
        //$_SESSION['error']=$errors;
        //echo $_SESSION['error']['pass'];
        //header("Location:mysqli.php?error=". $err);}
        
            
            $fname=checkstr($_GET['fname']);
            if(!$fname) $errors['fname']= "Only alphabets and whitespace are allowed in firstname";  
        $lname=checkstr($_GET['lname']);
        if($lname==0) $errors['lname']= "Only alphabets and whitespace are allowed in lastname";
        $mail=checkmail($_GET['email']);
         if(!$mail) $errors['email']= 'not valid email';
            
           if(!empty($errors)) {
          $err=json_encode($errors);  
          header("Location:mysqli.php?error=". $err);}
       else{ 
// $col="fname='{$_GET['fname']}',
// lname='{$_GET['lname']}',
// email='{$_GET['email']}',
// phone={$_GET['phone']},
// pass={$_GET['pass']}";
// var_dump($col);
        $connObject->insertmm('student',"fname='{$_GET['fname']}',
        lname='{$_GET['lname']}',
        email='{$_GET['email']}',
        phone={$_GET['phone']},
        pass={$_GET['pass']}");
        // $connection->query("insert into student set 
        //     fname='{$_GET['fname']}',
        // lname='{$_GET['lname']}',
        // email='{$_GET['email']}',
        // phone={$_GET['phone']},
        // pass={$_GET['pass']} ");
       $connection=null;
        header("Location:listallstudent.php");
       }
            
     
    }
    function checkstr($name){
        if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
              
                     return 0;  
        } else {  
            return $name;  
        }  
    } 
    ////////////////////////////////////////////
    function checkmail($mail){
         
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $mail) ){  
            return 0;
        } else {  
            return $mail;  
        }  





    }  
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars($data);
            

        // return $data;};
?>