<div class="container">
  <div class=''>
    <h2>帳號登入</h2>
    <form class='form-horizontal' method='post' action='index.php'>
      <div class='form-group'>
        <label for='user' class='col-md-2 control-label'>帳號</label>
        <div class='col-md-10'>
          <input type='text' class='form-control' id='user' name='user' placeholder='輸入帳號' autocomplete='false' value="" />
        </div>
      </div>
      <div class='form-group'>
        <label for='pswd' class='col-md-2 control-label'>密碼</label>
        <div class='col-md-10'>
          <input type='password' class='form-control' id='pswd' name='pswd' placeholder='輸入密碼' autocomplete='false' value="">
        </div>
      </div>
      <div class='form-group'>
        <div class='col-md-offset-2 col-md-10'>
          <button type='submit' class='btn btn-primary' id='loginBtn'>登入</button>
          <!--<button type='submit' class='btn btn-primary' id='guestBtn'>Guest</button>!-->
        </div>
      </div>
      <div class='form-group'>
        <div class='col-md-offset-2 col-md-10'>
          <p>還沒有帳號? <a href='php/login/signup.php'>註冊</a></p>
          <p>只是想玩玩? <a href='index.php'>訪客登入</a></p>
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