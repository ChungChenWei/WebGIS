<?php
/* Source URL:
   https://ithelp.ithome.com.tw/articles/10195675 
   https://github.com/daveismyname/loginregister
*/

require_once(__DIR__."/sqlconnect.php");

class UserVeridator {

    private $error;
    /**
     * 可取出錯誤訊息字串陣列
     */
    public function getErrorArray(){
        return $this->error;
    }

    /**
     * 驗證二次密碼輸入是否相符
     */
    public function isPasswordMatch($password, $passwrodConfirm){
    if ($password != $passwrodConfirm){
            $this->error[] = 'Passwords do not match.';
            return false;
        }
    return true;
    }

    /**
     * 驗證帳號是否已存在於資料庫中
     */
    public function isUsernameDuplicate($username){
        $db_database   = "fruit";
        if(($conn=connectToDB())!==false){
            $sql="SELECT * FROM ".$db_database.".`account` where `UserName` =:user;";
            $prepare=$conn->prepare($sql);
            $prepare->bindValue(':user',$username);
            $prepare->execute();                        
            $result=$prepare->fetchAll();              
            if(isset($result[0]['UserName']) and !empty($result[0]['UserName'])){
              $this->error[] = 'Username provided is already in use.';
              $conn=null;
              return false;
            }
            $conn=null;
            return true;
        }
        $this->error[] = 'Database Fail.';
        return false;
    }

    /**
     * 驗證信箱是否已存在於資料庫中
     */
    public function isEmailDuplicate($email){
        $db_database   = "fruit";
        if(($conn=connectToDB())!==false){
            $sql="SELECT * FROM ".$db_database.".`account` where `Email` =:email;";
            $prepare=$conn->prepare($sql);
            $prepare->bindValue(':email',$email);
            $prepare->execute();                        
            $result=$prepare->fetchAll(); 
            if(isset($result[0]['Email']) AND !empty($result[0]['Email'])){
                $this->error[] = 'Email provided is already in use.';
                return false;
            }
            $conn=null;
            return true;
        }
        $this->error[] = 'Database Fail.';
        return false;
    }
}