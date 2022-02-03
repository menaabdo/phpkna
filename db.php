<?php

class DB{
    private $host="localhost";
    private $dbname="myDB";
    private $user="root";
    private $password="";
    private $dbtype="mysql";
    private $connection;


    public function __construct(){
        try{$this->connection = new
            pdo("$this->dbtype:
            host=$this->host;
            dbname=$this->dbname",
            $this->user,"");
            //  $this->connection= new pdo("
            // {$this->dbtype}:host={$this->host};
            // dbname={$this->dbname}",
            // $this->user,
            // $this->password);
        }catch(PDOException $e){
            echo " Fail ".$e->getMessage();
        }
    }

    function getConnection (){
        return $this->connection;
    }
    
    function delete($tableName,$condition){
      $this->connection->query("delete from $tableName where  $condition");
    }

    function getOnElement($table,$condition){
       return $this->connection->query("select * from $table where $condition");
    }
    
    // function insertRow($table,$cols,$data){
    //     $stm=$this->connection->prepare("insert into $table set $cols");
    //     $stm->execute($data);
    // }
   function insertmm($tablename,$col){
    $this->connection->query("insert into $tablename set $col");
   
   }
}




?>