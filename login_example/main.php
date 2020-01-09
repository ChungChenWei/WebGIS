<?php
  require_once(__DIR__."/funs.php");
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
?><nav class="nav">
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
        <li><a class="navbar-toggler" data-toggle="collapse" href="#introduction" id="nav_introduction" style="color:#2c5364;font-weight:bold;font-size:17px">關於臺灣水果😄</a></li>
        <li class="active"><a data-toggle="tab" href="#layerlist" id="nav_layerlist" style="font-size:17px;font-weight:bold">圖層列表📂</a></li>
        <li><a data-toggle="tab" href="#knowledge" id="nav_knowledge" style="font-size:17px;font-weight:bold">水果小學堂🎓</a></li>
        <li><a data-toggle="tab" href="#pickfruit" id="nav_pickfruit" style="font-size:17px;font-weight:bold">水果偵探🔎</a></li>
        <li><a data-toggle="tab" href="#layerlist" id="nav_layerlist" style="font-size:17px;font-weight:bold">蔬果價格查詢📈</a></li>
      <ul class="nav navbar-nav navbar-right">
        <li><a id="membership" href="?member" style="font-weight:bold"><span class="glyphicon glyphicon-user"></span>會員資料</a></li>
        <li><a id="<?echo $log_id ?>" href="<?echo $log_sig ?>" style="font-weight:bold"><span class="glyphicon <?echo $log_ico ?>">
          </span><?echo $log_ch ?></a>
        </li>
      </ul>
      <div class="collapse" id="introduction" >
        <div class="bg-dark p-4" >
          <br /><br />
          <div>
            <h3 style="font-weight: bold">🔹水果是什麼？</h3>
            <p style="font-weight: bold">根據百科全書的記載:「水果是指多汁且美味的植物果實，不但含有豐富的營養‚而且能夠幫助消化。」</p>
            <img src="./images/manyfruit1.jpg" alt="manyfruit" style="width:375px;height:250px;">
            <br/><br/>
            <h3 style="font-weight: bold">🔹身在「水果王國」中的我們</h3>
            <p style="font-weight: bold">我們所居住的寶島臺灣，雖然面積不大，卻因地處亞熱帶地區且是世界高山密度最高的島嶼，擁有多樣的氣候與地理條件。隨著海拔高度使得各地氣候環境差異頗大，因此能有熱帶、亞熱帶、及溫帶的環境，適合多種果樹生長，所以品種來源及育種材料也相對較為豐富，使臺灣「水果王國」的美譽名聞遐邇。</p><br />
            <p style="font-weight: bold">然而，即使我們生活在容易取得好吃水果的寶島臺灣，日日被水果簇擁著，但是，我們真的對水果有足夠的認識嗎？它們生長在哪裡？何時是它們的產季？它們的營養價值為何呢？</p>
            
          </div>
        </div>
      </div>
      <div class="tab-content">
        <div id="knowledge" class="tab-pane fade">
          <br /><br />
          <div style="background-color:white;">
            <h3>水果小學堂的東西</h3>
            <p>這邊我要放 水果知識或水果功用/療效</p>
            <h3 style="font-weight: bold">🔹每日水果攝取量是多少？</h3>
            <p>水果雖然健康又營養，吃多了也是會攝取過多熱量的。<br />
              根據衛生福利部「每日飲食指南」，<b>每日水果攝取量會依個人活動量的多寡、年齡與性別而有所不同，建議每天約可攝取2~4份水果。</b><br />
              像是一般學童每日應攝取2份水果，而成年女性應攝取水果3份，成年男性則應攝取4份水果等。<br />另外吃水果時也建議多攝取不同種類，才能多方位的攝取到足夠的營養素喔!</p>
            <h3 style="font-weight: bold">🔹一份水果又是多少呢？</h3>
            <p>「一份水果」在「飲食代換表」中的定義，是可以提供<b>「熱量60大卡，其中包含醣類（碳水化合物）15公克」</b>的意思。
            <br />
            比如說市面上的香蕉，大約半根就是ㄧ份了；約拳頭大的蘋果一顆也是ㄧ份的水果。</p>
            <p>以下用一張水果份量表告訴大家一份水果等於多少</p>
            <img src="./images/onefruit.jpg" alt="manyfruit" style="width:500px;height:500px;">
          </div>
        </div>
        <div id="pickfruit" class="tab-pane fade">
          <br /><br />
          <div style="background-color:white;">
            <h3>水果偵探的東西</h3>
            <p>這邊我要放 如何挑選水果</p>
          </div>
        </div>
        <div id="home" class="tab-pane fade"></div>
      </div>        
    </div>
  </div>
</nav>

<div id="container" style='height: 100%;'>
  <div id="sidebar">
     <div id="accordion">
            <h3>Intro<button type="button" id="btn-hide" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
            <div id="acc_layerlist1">
              <div style="margin-top:20px;">「果來一點好嗎！」是一個結合地圖跟臺灣水果相關資訊的網站。</div>
            </div>
      
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
<script src="./js/fruitDoc.js"></script>
<script src="./js/map.js"></script>
<script src="./js/main.js"></script>
