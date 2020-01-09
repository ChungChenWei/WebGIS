<?php
  require_once(__DIR__."/php/funs.php");
  $status = isAuthenticated();
  if($status==1){
    $log_id = "logout";
    $log_ch = "登出";
    $log_ico = "glyphicon-log-out";
    $log_sig = "?signout";
  }else{
    $log_id = "login";
    $log_ch = "登入";
    $log_ico = "glyphicon-log-in";
    $log_sig = "?signin";
  }
  include_once(__DIR__."/js/dialog.html");
?>
<nav class="nav">
  <div class="container-fluid navbar-inverse"  style="background-image: linear-gradient(to right, #C6FFDD, #FBD786, #FFB5B5);color:black;border-radius:10px;border:1px black solid;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#home" data-toggle="tab" style="font-size:20px;color:#030D68;">果來一點好嗎🍓<p style="font-size:10px;display: inline;">臺灣水果地圖</p></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#layerlist" id="nav_layerlist" style="font-size:17px;font-weight:bold">圖層列表📂</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a id="membership" href="?member" style="font-weight:bold"><span class="glyphicon glyphicon-user"></span>會員資料</a></li>
        <li><a id="<?echo $log_id ?>" href="<?echo $log_sig ?>" style="font-weight:bold"><span class="glyphicon <?echo $log_ico ?>">
          </span><?echo $log_ch ?></a>
        </li>
      </ul>
      <div class="collapse" id="introduction" >
      </div>
      <div class="tab-content">
        <div id="home" class="tab-pane fade"></div>
      </div>        
    </div>
  </div>
</nav>
<div id="container" style='height: 100%;'>
  <div id="sidebar">
    <div id="accordion">
      <!-- Intro -->
      <h3>Intro<button type="button" id="btn-hide" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
      <div id="acc_layerlist1">
        <div style="margin-top:20px;">「果來一點好嗎！」是一個結合地圖跟臺灣水果相關資訊的網站。</div>
        <div><button id="abouttaiwanfruit" style="font-size:17px;font-weight:bold;color:#2c5364">關於臺灣水果😄</button></div>
        <div><button id="fruitclass" style="font-size:17px;font-weight:bold">水果小學堂🎓</button></div>
        <div><button id="fruitdetective" style="font-size:17px;font-weight:bold">水果偵探🔎</button></div>
      </div>
      <!-- Fruit Intro -->
      <h3>水果介紹</h3>
      <div id="acc_layerlist">
        <div id='fName' style="margin:20px 0px 10px 0px;">找到綠色的水果按鈕並點擊 (ex:<div class='btn btn-success btn-xs'>木瓜</div> )，就可以看到該水果的介紹喔！</div>
        <div id="fImg">
            <img id="fruitImg" style="width:100%">
        </div>
        <div id="content"></div>
        <h3>以月份</h3>
        <div id="monthly"></div>
        <h3>過去五年</h3>
        <div id="overtime"></div>
      </div>
    </div>
  </div>
  <div id="map"></div>
</div>

<script src="https://d3js.org/d3.v4.js"></script>
<script src='./js/monthlygraf.js'></script>
<script src="./js/map.js"></script>
<script src="./js/main.js"></script>