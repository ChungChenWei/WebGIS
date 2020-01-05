<?php
  require_once(__DIR__."/header.php");
  require_once(__DIR__."/funs.php");
  require_once(__DIR__."/gump.class.php");
  require_once(__DIR__."/UserVeridator.php");
  require_once(__DIR__."/sqlconnect.php");

  $error = NULL;

  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST);
  /*
  echo "POST <br>";
  foreach ($_POST as $key => $value) {
    echo $key;
    echo "<br>";
    echo $value;
    echo "<br>";
  }*/

  $validation_rules_array = array(
    'user'    => 'required|alpha_numeric|max_len,20|min_len,1',
    'email'   => 'required|valid_email',
    'pswd'    => 'required|max_len,20|min_len,1',
    'pswdcom' => 'required'
  );
  $gump->validation_rules($validation_rules_array);

  $filter_rules_array = array(
    'user'    => 'trim|sanitize_string',
    'email'   => 'trim|sanitize_email',
    'pswd'    => 'trim',
    'pswdcom' => 'trim'
  );
  $gump->filter_rules($filter_rules_array);

  $validated_data = $gump->run($_POST);

  if($validated_data === false) {
    $error = $gump->get_readable_errors(false);
    if(isset($error)){
      foreach($error as $error){
        echo '<p class="bg-danger">'.$error.'</p>';
      }
    }
    /*if(!empty($error)){
      echo "ERROR <br>";
      foreach ($error as $key => $value) {
        echo $key;
        echo "<br>";
        echo $value;
        echo "<br>";
      }
    }*/
  }else{ // validation successful
    foreach($validation_rules_array as $key => $val) {
      ${$key} = $_POST[$key];
    }
    $userVeridator = new UserVeridator();
    $userVeridator->isPasswordMatch($pswd, $pswdcom);
    $userVeridator->isUsernameDuplicate($user);
    $userVeridator->isEmailDuplicate($email);
    $error = $userVeridator->getErrorArray();
    if(isset($error)){
      foreach($error as $error){
        echo '<p class="bg-danger">'.$error.'</p>';
      }
    }
    /*if(!empty($error)){
      echo "ERROR <br>";
      print_r($error,1);
      foreach ($error as $key => $value) {
        echo $key;
        echo "<br>";
        echo $value;
        echo "<br>";
      }
    } */        
    if(empty($error)){ // No error
      $db_database   = "fruit";
      //create the random activasion code
      $activasion = md5(uniqid(rand(),true));

      if(($conn=connectToDB())!==false){
        $sql="insert into `{$db_database}`.`account` (`SID`,`UserName`,`Password`,`Email`,`ActiveCode`,`Active`) VALUES (NULL,:name,:pswd,:email,:activecode,0);";
        $prepare=$conn->prepare($sql);
        $prepare->bindValue(':name',$user);
        $prepare->bindValue(':pswd',md5($pswd));
        $prepare->bindValue(':email',$email);
        $prepare->bindValue(':activecode',$activasion);
        $prepare->execute();
      }
      header('Location: ./index.php');
    } 
  }
?>