<?php
require_once(__DIR__."/sqlconnect.php");

$tableName="fruitCounty";
if(($conn=connectToDB())!==false){
  $sql="show tables like '{$tableName}'";
  $prepare=$conn->prepare($sql);
  $prepare->execute();
  $result=$prepare->fetchAll();
  if($result){
    $sql="SELECT * FROM `{$tableName}` WHERE `{$tableName}`.`cName`='{$_POST['cName']}';";
    $prepare=$conn->prepare($sql);
    $prepare->execute();
    $result=$prepare->fetchAll();
    $conn=null;
    $json_string=json_encode($result[0],384);
    echo $json_string;
  }else{
    echo "{$tableName} not exists !!\n";
  }
}else{
  echo "SQL fail";
}
