<?php
  require_once(__DIR__."/header.php");
  require_once(__DIR__."/funs.php");
  require_once(__DIR__."/gump.class.php");
  require_once(__DIR__."/UserVeridator.php");
  require_once(__DIR__."/sqlconnect.php");
  ?>
  <div class="container">
    <div class=''>
      <h2>Sign Up</h2>
      <form class='form-horizontal' method="post" action="" autocomplete="off">
        <div class='form-group'>
          <label for='user' class='col-md-2 control-label'>Account ID</label>
          <div class='col-md-10'>
            <input type='text' class='form-control input-lg' id='user' name='user' placeholder='Account ID' autocomplete='false' value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" />
          </div>
        </div>
        <div class="form-group">
          <label for='user' class='col-md-2 control-label'>Email</label>
          <div class='col-md-10'>
          <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email Address" autocomplete='false' value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" />
          </div>
        </div>
        <div class="form-group">
          <label for='pswd' class='col-md-2 control-label'>Password</label>
          <div class='col-md-10'>
            <input type='password' class='form-control input-lg' id='pswd' name='pswd' placeholder='Enter your password' autocomplete='false'>
          </div>
        </div>
        <div class="form-group">
          <label for='pswdcom' class='col-md-2 control-label'>Confirm Password</label>
          <div class='col-md-10'>
            <input type="password" class="form-control input-lg" id="pswdcom" name="pswdcom" placeholder="Confirm Password" autocomplete='false'>
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-offset-2 col-md-10'>
            <button type='submit' name='submit' class='btn btn-primary' id='signupBtn'>Sign up</button>
          </div>
        </div>
        <?
        if(isset($_POST['submit'])){
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
              //create the random activasion code
              $activasion = md5(uniqid(rand(),true));

              if(($conn=connectToDB())!==false){
                $sql="insert into `fruit`.`account` (`SID`,`UserName`,`Password`,`Email`,`ActiveCode`,`Active`) VALUES (NULL,:name,:pswd,:email,:activecode,0);";
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
        }
        ?>

        <div class='form-group'>
          <div class='col-md-offset-2 col-md-10'>
            <p>Already member? <a href='index.php'>Log In Here</a></p>
          </div>
        </div>
      </form>
    </div>
    <style>
      #signupBtn{
        padding: 6px 12px;
      }
    </style>
<?php
?>