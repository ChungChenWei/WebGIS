<?php
  require_once(__DIR__."/funs.php");
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
        <li><a id="logout" href="?signout" style="font-weight:bold"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
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
          <br /><br /><br />
          <div style="background-color:white;border-radius:10px">
            <br />
            <h3><b>如何挑選到好吃的水果呢？🛒</b></h3>
            <p>就讓我來告訴你/你吧！</p>
            <h4><b>🔎春季</b></h4>
            <div class="panel-group" id="accordion1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_1"><b>草莓</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_1" class="panel-collapse collapse">
                  <div class="panel-body">採草莓時最好挑選<b>顏色鮮豔</b>的草莓，顏色太白或是過青都是未成熟，如果肩部是白色就約8分熟。<br />
                  草莓一旦離枝後成熟度就中止，不會像其他瓜果還可催熟。<br />此外要注意外表是否有損傷，草莓上的<b>絨毛越長代表越少人碰過，越新鮮</b>，而且越新鮮的草莓，身上的<b>小顆粒是立起來的。</b><br />帶回家的草莓不要立刻清洗，直接放入冰箱冷藏即可，需要吃多少再洗多少。<br />若是未能吃完的草莓則密封冷藏，在兩日內吃完即可。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_2"><b>西瓜</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_2" class="panel-collapse collapse">
                  <div class="panel-body">
                   看外觀：選擇<b>表面光滑完整</b>、顏色青綠明亮、花紋清晰鮮明，果梗呈捲曲狀，瓜蒂部分些微凹陷者。<br />
                   拍果皮：<b>聲音清脆響亮者</b>為佳。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_3"><b>李子</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_3" class="panel-collapse collapse">
                  <div class="panel-body">
                    挑選李子可從外表觀察<b>果皮是否光滑，沒有皺紋為佳</b>；如果表面粗糙又奇形怪狀就不要選購。<br />
                    <b>果肉必須結實</b>，軟硬適中最好，如果太軟則有可能已經過熟，不耐久放。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_4"><b>荔枝</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_4" class="panel-collapse collapse">
                  <div class="panel-body">
                    挑選時應選擇<b>果實飽滿，果色是鮮紅或是暗紅</b>，而且<b>果棘平的為佳</b>；<br />
                    如果是挑選<b>玉荷包則是果色黃色，但果肩轉紅三分之一時</b>的味道最好。<br />
                    挑選<b>糯米糍選擇瘦長點</b>，果核比較小，當外觀呈鮮紅甚至帶點黃時就代表全熟，如果是暗紅就代表過熟。<br />
                    買回家的荔枝可將葉片減去，最好用塑膠袋裝好冷藏，放在冰箱可約儲存2~3週左右。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_5"><b>芒果</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_5" class="panel-collapse collapse">
                  <div class="panel-body">待補</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_6"><b>梅子</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_6" class="panel-collapse collapse">
                  <div class="panel-body">
                   梅子依照成熟度可分為兩期採收，<br/>
                   第一期採收六、七分熟的<b>青梅</b>，主要用作<b>脆梅</b>；<br/>
                   第二期採收八、九分熟的<b>熟梅</b>，可用為<b>原味梅、蜜梅、紫蘇梅</b>等原料。<br/>
                   前往採梅時，以<b>果實大且表面無損</b>為主。<br/>
                   保存青梅時可用塑膠袋封好後冷藏，如果是八、九分熟的梅子，則放置陰涼處催熟，就可拿來做果醬或是入菜了。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_spring_7"><b>枇杷</b></a>
                  </h4>
                </div>
                <div id="collapse_spring_7" class="panel-collapse collapse">
                  <div class="panel-body">
                   <b>果圓</b>：枇杷果粒越大且圓，代表果肉越多。<br/>
                   <b>色深</b>：顏色越深且均勻代表成熟且甜度足。<br/>
                   <b>絨毛長</b>：顯示極少接受人手碰觸，其新鮮度越好。<br/>
                   <b>不皺皮</b>：如果果皮已經發皺就是放置時間太久，較不新鮮。<br/>
                   <b>無風疤</b>：風疤是果身的紋路，越多代表陽光照射少，品質較差。</div>
                </div>
              </div>
              <h4><b>🔎夏季</b></h4>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_1"><b>桃子</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_1" class="panel-collapse collapse">
                  <div class="panel-body">挑選<b>果皮紅潤色澤、果實飽滿有彈性、香氣較濃者</b>為佳。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_2"><b>葡萄</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_2" class="panel-collapse collapse">
                  <div class="panel-body">
                   可觀察<b>整串葡萄的果穗是否大小適中且整齊</b>；<br/>
                   果粒飽滿、大小均勻，輕輕提起時，果粒牢固，<b>較少落果</b>；<br/>
                   白色果粉分布均勻。<br/>
                   成熟度適中的果皮顏色較深，香氣較夠且甜。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_3"><b>龍眼</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_3" class="panel-collapse collapse">
                  <div class="panel-body">待補</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_4"><b>百香果</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_4" class="panel-collapse collapse">
                  <div class="panel-body">挑選時找<b>外皮顏色深</b>的比較好；如果有皺紋則是放置一段時間了，最好盡快吃完。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_5"><b>梨子</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_5" class="panel-collapse collapse">
                  <div class="panel-body">
                    外觀是否端正，<b>果皮要薄而光滑</b>，色澤均勻且無外傷。<br/>
                    <b>如果有斑點則越小越好</b>，出現黑斑就代表梨子不新鮮。<br/>
                    <b>果肉摸起來要硬實</b>。<br/>
                    果蒂附近如出現發酵味道代表果肉已經開始腐敗。<br/>
                    保存梨子時可用兩層報紙，單顆分別包好後放入冰箱冷藏即可，約可保存1~2週。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_6"><b>紅龍果</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_6" class="panel-collapse collapse">
                  <div class="panel-body">
                    用手感覺重量，越重代表汁多而且果肉豐滿。<br/>
                    外表選擇<b>果皮轉色均勻、果萼端完全轉色</b>。<br/>
                    <b>肉質鱗片軟化反捲或是轉紅達一半以上</b>。<br/>
                    無擦壓傷、裂果，果梗切口無腐爛。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_summer_7"><b>酪梨</b></a>
                  </h4>
                </div>
                <div id="collapse_summer_7" class="panel-collapse collapse">
                  <div class="panel-body">
                    選購酪梨時靠<b>色澤和手感</b>。<br/>
                    生的酪梨呈鮮綠色，隨著成熟會逐漸變暗，<b>可食用時呈現紫黑色</b>。
                    手感則可用姆指壓果實，如<b>感覺可壓入而不會彈起</b>，就代表已可食用，<br/>
                    一般硬的酪梨於室溫下，通常4至7天即可後熟變軟。<br/>
                    挑選時以果粒大，果皮光滑，飽滿有重量感為佳</div>
                </div>
              </div>
              <!--  -->
              <h4><b>🔎秋季</b></h4>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_fall_1"><b>文旦柚</b></a>
                  </h4>
                </div>
                <div id="collapse_fall_1" class="panel-collapse collapse">
                  <div class="panel-body">
                    挑選時，觀察外觀略呈三角圓錐形，表皮光滑細緻有光澤，放在手上感覺帶有沉重感，很可能就是一顆飽滿多汁的文旦柚。<br/>
                    另外<b>需要注意表皮是否有破損</b>，若破損細菌很可能侵蝕到果肉內部，破壞原本的美味，甚至無法食用。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_fall_2"><b>洛神</b></a>
                  </h4>
                </div>
                <div id="collapse_fall_2" class="panel-collapse collapse">
                  <div class="panel-body">
                    看外觀：<b>顏色鮮紅，花萼完整且飽滿</b>。<br/>
                    聞味道：自然微酸，無嗆鼻化學味道。<br/>
                    選產地：以國產為佳，盡量選擇有包裝、標示來源者。
                  </div>
                </div>
              </div>
              <!--  -->
              <h4><b>🔎冬季</b></h4>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_winter_1"><b>柳丁</b></a>
                  </h4>
                </div>
                <div id="collapse_winter_1" class="panel-collapse collapse">
                  <div class="panel-body">
                  顏色轉黃代表熟成。<br/>
                  <b>重量要選重的，代表水分含量足，通常甜度也較高</b><br/>。
                  挑選柳丁要選擇有帶著蒂頭的，如果<b>沒有蒂頭則容易出現軟心的現象</b>。<br/>
                  果皮要完整飽滿不軟爛，如果有光澤或是果粉最佳。<br/>
                  按壓時要有彈性。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_winter_2"><b>柑橘</b></a>
                  </h4>
                </div>
                <div id="collapse_winter_2" class="panel-collapse collapse">
                  <div class="panel-body">
                    果皮外表光滑，軟硬適中的較好，橘子可用手剝，<b>感受橘皮緊貼果肉的為佳，較為新鮮且水分未流失</b>。<br/>
                    另外可以用手掂量水果的重量，<b>較重的代表水分飽足</b>。<br/>
                    橘子不需放冰箱，放在通風良好的地方即可；<br/>如果有一顆橘子出現損傷或發霉必須立刻處理，避免整袋橘子全部發霉加速腐敗。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_winter_3"><b>番茄</b></a>
                  </h4>
                </div>
                <div id="collapse_winter_3" class="panel-collapse collapse">
                  <div class="panel-body"><b>外表無裂，輕壓時果肉要硬實</b>，如果變軟就有可能過熟。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_winter_4"><b>蜜棗</b></a>
                  </h4>
                </div>
                <div id="collapse_winter_4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <b>較成熟的蜜棗顏色會越黃，甜度較高但是口感鬆軟</b>；反之，顏色越綠的蜜棗有較脆的口感，但是甜度就較低。<br/>前者因成熟度高，所以不耐久放，應盡早食用。<br/>
                    挑選時要注意果蒂周圍是否凹陷寬廣，光滑平順無高低不平的皺摺，若<b>果蒂周圍突起者就代表品質較差</b>。<br/>買回家的蜜棗最好用塑膠袋包好，放到冰箱冷藏，這樣可放置約兩星期；如果裸放則可能脫水而影響品質。</div>
                </div>
              </div>
              <!--  -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_winter_5"><b>金桔</b></a>
                  </h4>
                </div>
                <div id="collapse_winter_5" class="panel-collapse collapse">
                  <div class="panel-body">挑選新鮮的金桔時，要選擇<b>果皮金黃，果型呈橢圓而且飽滿</b>的最好。</div>
                </div>
              </div>
              <!--  -->
            </div>                        
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
