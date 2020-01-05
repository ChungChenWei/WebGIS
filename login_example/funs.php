<?php
######################################################################
#
# enable php session 
#
######################################################################
//簡易寫法,但是容易出錯
//session_start();
//複雜且較安全的寫法 (當php非在cli環境(A command line interface)下執行,且尚未執行過session_start())
if(php_sapi_name()!= "cli" && session_status() == PHP_SESSION_NONE) //Determine whether PHP is being run via HTTP or CLI 
  session_start();

require_once(__DIR__."/sqlconnect.php");

//是否已經通過登入認證
function isAuthenticated(){
  if(isset($_GET['signout'])){  //當觸發登出時
    unset($_SESSION['authenticated']);  //解除session:authenticated
    include(__DIR__."/signout.php");
    return false;
  }else if (isset($_GET['member'])) {
    if(isset($_SESSION['authenticated']))
      return true;
    else
      return false;
    
  }else if(!isset($_SESSION['authenticated'])){  //當$_SESSION['authenticated']還沒設定時
    if(isset($_POST['user'])){  //當有登入動作時,進行帳號密碼判斷
      $db_database   = "fruit";

      if(($conn=connectToDB())!==false){
        $sql="SELECT * FROM ".$db_database.".`account` where `UserName` =:user  and `Password`=:pass;";
        $prepare=$conn->prepare($sql);
        $prepare->bindValue(':user',$_POST['user']);
        $prepare->bindValue(':pass',md5($_POST['pswd']));
        $prepare->execute();                            //$conn->query($sql), SQL injection
        $result=$prepare->fetchAll();              //get all query data, it is an array.
        if(count($result)){
          $_SESSION['authenticated']=true;
        }
        $conn=null;
      }
    }
  }
  
  if(isset($_SESSION['authenticated']))
    return true;
  else
    return false; //回傳false,讓後面的程式知道還沒有通過登入認證
}