<?php
require_once "mysql.php";

$db_servername = "localhost";     //db.sgis.tw
$db_username = "root";          //webgis
$db_password = "";      //webgis2019       
$db_database = "webgis";
$db_port = "3306";                //database port, default:3306

if(($conn=connectToDB($db_servername,$db_username,$db_password,$db_database,$db_port=3306))!==false){
  $sql="SELECT * FROM `webgis`.`airportMetro` WHERE `stype`=:stype";
  $prepare=$conn->prepare($sql);
  $prepare->bindValue(':stype','地下車站');
  $prepare->execute();                            //$conn->query($sql), SQL injection
  $result=$prepare->fetchAll();              //get all query data, it is an array.
  if(is_array($result)){
    foreach($result as $rs)
      echo "{$rs['uid']},{$rs['name']},{$rs['stype']}\n";
  }
  $conn=null;
}/**/

//create table 
/*$tableName="aMetro";
if(($conn=connectToDB($db_servername,$db_username,$db_password,$db_database,$db_port=3306))!==false){
  $sql="show tables like '{$tableName}'";
  $prepare=$conn->prepare($sql);
  $prepare->execute();
  $result=$prepare->fetchAll();
  if($result){
    echo "{$tableName} exists !!";
  }else{
    $sql =  "create table if not exists `{$tableName}` ( ".
          "  `uid` int(11) not NULL PRIMARY KEY auto_increment, ".
          "  `name` varchar(12) not NULL, ".          
          "  `lat` decimal(8,6), ".
          "  `lng` decimal(9,6), ".
          "  `stype` varchar(4), ".
          "  `csNum` int(11) ".
          ") engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;";
    $prepare=$conn->prepare($sql);
    $prepare->execute();
    echo "{$tableName} has been created.";
    $filename="airportMetro.csv";
    //insert data into table
    $lines=file($filename);
    foreach($lines as $lineNum=>$line){
      $items=explode(",",$line);
      if($lineNum>0){
        echo print_r($items,1);
        $sql="insert into `{$db_database}`.`{$tableName}` (`uid`,`name`,`lat`,`lng`,`stype`) VALUES (NULL,:name,:lat,:lng,:stype);";
        //echo "<pre>{$sql}</pre>";
        $prepare=$conn->prepare($sql);
        $prepare->bindValue(':name',$items[0]);
        $prepare->bindValue(':lat',$items[1]);
        $prepare->bindValue(':lng',$items[2]);
        $prepare->bindValue(':stype',$items[3]);
        $prepare->execute();
      }
    }
    echo "{$tableName} data have been inserted!!";
  }
  $conn=null;
}/**/
