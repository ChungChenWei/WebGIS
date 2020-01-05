<?php
  require_once(__DIR__."/funs.php");
?><nav class="nav navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">果來一點好嗎!! <p style="font-size:10px;display: inline;">臺灣水果地圖</p></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a data-toggle="tab" href="#layerlist" id="nav_layerlist">圖層列表</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">功能選單<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#" id="fun1">功能1</a></li>
                <li><a href="#" id="fun2">功能2</a></li>
            </ul>
        </li>
      </ul>
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a id="membership" href="?member"><span class="glyphicon glyphicon-user"></span>會員資料</a></li>
        <li><a id="logout" href="?signout"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
      </ul> -->

      <ul class="nav navbar-nav navbar-right">
       
        <li><a id="membership" href="?member"><span class="glyphicon glyphicon-user"></span>會員資料</a></li>
        <li><a id="logout" href="?signout"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
      </ul>

    </div>
  </div>
</nav>

<div id="container" style='height: 100%;'>
  <div id="sidebar"> <!-- style="display:none" -->
     <div id="accordion">



<!--        <h3>水果介紹<button type="button" id="btn-hide" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
            <div id="acc_layerlist">
              <h4 id='fName'></h4>
              <div id="fImg">
                  <img id="fruitImg" style="width:100%">
              </div>
              <div id="content"></div>
            </div> -->

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
            </div>

            <h3>圖層列表</h3>
            <div id="acc_layerlist3">
              <h4 id="baselayerlist">基本底圖</h4>
              <h4 id="overlayerlist">套疊圖資</h4>
            </div>
            
            <!-- <h3>繪圖</h3>
            <div id="draw_data">
              <button class='btn btn-info btn-draw' id='btn-line' drawType='Point'>Point</button>
              <button class='btn btn-info btn-draw' id='btn-line' drawType='LineString'>LineString</button>
              <button class='btn btn-info btn-draw' id='btn-line' drawType='Polygon'>Polygon</button>
              <br />
              <button class='btn btn-warning' id='btn-edit'>Edit</button><br />
              <a href='javascript:void(0);' class='btn btn-info' id='btn-json'>Download GeoJSON</a>
            </div> -->

    </div>
  </div>
  <div id="map"></div>
</div>
<script src="./js/fruitDoc.js"></script>
<!-- <script src="./js/countyBtn.js"></script> -->
<script src="./js/map.js"></script>         <!-- include map.js here because it must appear after <div id="map"> -->
<script src="./js/main.js"></script>
<script src="./js/draw.js"></script>