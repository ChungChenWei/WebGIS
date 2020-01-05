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
      <a class="navbar-brand">WebGIS 展示系統</a>
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
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">測試縣市<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><button class="fruitbtn">梅子</button></li>
                <li><button class="fruitbtn">西瓜</button></li>
            </ul>
        </li>
        <li><a id="membership" href="?member"><span class="glyphicon glyphicon-user"></span>會員資料</a></li>
        <li><a id="logout" href="?signout"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
      </ul>
    </div>
  </div>
</nav>
<script src="./js/fruitDoc.js"></script>
<div id="container" style='height: 100%;'>
  <div id="sidebar">
    <div id="accordion">
      <h3>水果介紹<button type="button" id="btn-hide" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
      <div id="acc_layerlist">
        <h4 id='fName'></h4>
        <div id="fImg">
            <img id="fruitImg" style="width:100%">
        </div>
        <div id="content"></div>
        <!--
        <h4 id="baselayerlist">底</h4>
        <h4 id="overlayerlist">浮</h4>
        !-->
      </div>
    </div>
  </div>
  <div id="map"></div>
</div>
<script src="./js/map.js"></script>         <!-- include map.js here because it must appear after <div id="map"> -->
<script src="./js/main.js"></script>
<script src="./js/draw.js"></script>