<?php
  require_once(__DIR__."/funs.php");
  ?>
  <div class="container">
    <div class=''>
      <h2>Sign in</h2>
      <form class='form-horizontal' method='post' action='index.php'>
        <div class='form-group'>
          <label for='user' class='col-md-2 control-label'>Account ID</label>
          <div class='col-md-10'>
            <input type='text' class='form-control' id='user' name='user' placeholder='Account ID' autocomplete='false' value="" />
          </div>
        </div>
        <div class='form-group'>
          <label for='pswd' class='col-md-2 control-label'>Password</label>
          <div class='col-md-10'>
            <input type='password' class='form-control' id='pswd' name='pswd' placeholder='Enter your password' autocomplete='false' value="">
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-offset-2 col-md-10'>
            <button type='submit' class='btn btn-primary' id='loginBtn'>Sign in</button>
            <!--<button type='submit' class='btn btn-primary' id='guestBtn'>Guest</button>!-->
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-offset-2 col-md-10'>
            <p>Not a member? <a href='signup.php'>Sign Up Here</a></p>
            <?php
            if(isset($_POST['user'])){  //當有傳送帳號資訊時,且會執行至此處,則表示帳號密碼錯誤
              echo "<b class='text-danger'>帳號或密碼錯誤!</b>";
            }
            ?>
          </div>
        </div>
      </form>
    </div>
    <style>
      #loginBtn, #guestBtn{
        padding: 6px 12px;
      }
    </style>
<?php
?>