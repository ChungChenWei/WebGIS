proj4.defs('EPSG:3826', "+title=二度分帶：TWD97 TM2 台灣 +proj=tmerc  +lat_0=0 +lon_0=121 +k=0.9999 +x_0=250000 +y_0=0 +ellps=GRS80 +units=公尺 +no_defs");
proj4.defs('urn:ogc:def:crs:OGC:1.3:CRS:84',  proj4.defs('EPSG:4326'));
proj4.defs('urn:ogc:def:crs:EPSG::3826',      proj4.defs('EPSG:3826'));
ol.proj.proj4.register(proj4);

var init_lat=23.62;   //23.750815, 121.027538
var init_lng=120.5;
var zoom=7;
var user_location=null;
var view = new ol.View({
  center: ol.proj.transform([init_lng, init_lat], 'EPSG:4326', 'EPSG:3857'),
  zoom: zoom,
  minZoom: 7,
  maxZoom: 14,
  extent: ol.proj.transformExtent([119.8, 21,122.07, 25.3], 'EPSG:4326', 'EPSG:3857')
});
var map = new ol.Map({
  layers: [],
  target: 'map',
  view: view,
  interactions: ol.interaction.defaults({ doubleClickZoom: true }),
});

//select feature by alt+click
var selectAltClick = new ol.interaction.Select({
  condition: function(mapBrowserEvent) {
    return ol.events.condition.click(mapBrowserEvent) && ol.events.condition.altKeyOnly(mapBrowserEvent);
  }
});
/*selectAltClick.on('select', function(e) {
  e.selected.forEach(function(feature){
    console.log(feature.getProperties());
  });
});*/
map.addInteraction(selectAltClick);
//delete features
document.addEventListener('keydown', function(evt) {  //use document to handle keybord Event
  if(evt.which==46){     //number of keybord
    selectAltClick.getFeatures().forEach(function(feature){
      selectAltClick.getLayer(feature).getSource().removeFeature(feature);
    });
    selectAltClick.getFeatures().clear();
  }
});




//for Geolocation
/*
var geolocation = new ol.Geolocation({
  tracking: true,
  projection: map.getView().getProjection()
});
geolocation.on('change:position', function() {
  if(user_location==null){
    user_location= geolocation.getPosition();  
    map.getView().setCenter(user_location);
    map.getView().setZoom(14);    
    var q=ol.proj.transform([parseFloat(user_location[0]), parseFloat(user_location[1])],'EPSG:3857','EPSG:4326');
    console.log(user_location,q);
  }  
});/**/

//setting for tile services
var projection = ol.proj.get('EPSG:3857');              //projection
var projectionExtent = projection.getExtent();          //projectionExtent
var size = ol.extent.getWidth(projectionExtent) / 256;  //size
var resolutions = new Array(20);                        //resolutions
var matrixIds = new Array(20);                          //matrixIds
for (var z = 0; z < 20; ++z) {   
    resolutions[z] = size / Math.pow(2, z);
    matrixIds[z] = z;
}

function loadJsonSourceWithAjax(url){
  var source=new ol.source.Vector({});  
  $.ajax({
    url: url,
    dataType: "json",
    success: function(geojson){
      var options={};
      if(
        typeof(geojson.crs                )!='undefined' && 
        typeof(geojson.crs.properties     )!='undefined' && 
        typeof(geojson.crs.properties.name)!='undefined' 
      ){
        options={
          dataProjection: ol.proj.get(geojson.crs.properties.name),    //'EPSG:3826','EPSG:4326'
          featureProjection: ol.proj.get('EPSG:3857'),
        };
      }
      var features = (new ol.format.GeoJSON()).readFeatures(geojson,options);
      source.addFeatures(features);
      
      console.log(features.length);
    }
  });  
  return source;
}

var layers = {
    // 'OSM': { 
    //     'title': 'OpenStreetMap(開放街圖)', 
    //     'type': 'base', 
    //     'layer': new ol.layer.Tile({ 
    //         visible:false,
    //         source: new ol.source.OSM()  
    //         }) 
    // },    
    // 'EMAP': {
    //     'title': '臺灣通用電子地圖(門牌)',
    //     'type': 'base',
    //     'layer': new ol.layer.Tile({
    //         visible:false,
    //         extent: projectionExtent,
    //         source: new ol.source.WMTS({
    //             url: 'http://maps.nlsc.gov.tw/S_Maps/wmts?',
    //             layer: 'EMAP',
    //             matrixSet: 'GoogleMapsCompatible',
    //             format: 'image/jpeg',
    //             projection: projection,
    //             tileGrid: new ol.tilegrid.WMTS({
    //                 origin: ol.extent.getTopLeft(projectionExtent),
    //                 resolutions: resolutions,
    //                 matrixIds: matrixIds
    //             }),
    //             extent: projectionExtent,
    //             style: 'default'
    //         })
    //     })
    // },
    // 'metro': {
    //     'title': '機場捷運站',
    //     'type': 'overlay',
    //     'layer': new ol.layer.Vector({
    //         visible:false,
    //         source: new ol.source.Vector({
    //           format: new ol.format.GeoJSON(),
    //           url: './data/metro.geojson',
    //         })       
    //    })
    // },
    // 'taipei-metro': {
    //     'title': '台北捷運站',
    //     'type': 'overlay',
    //     'layer': new ol.layer.Vector({
    //         visible:false,
    //         source: new ol.source.Vector({
    //           format: new ol.format.GeoJSON(),
    //           url: './data/taipei-metro.geojson',
    //         })
       
    //    })
    // },/**/
    // 'bike': {
    //     'title': 'bike',
    //     'type': 'overlay',
    //     'layer': new ol.layer.Vector({
    //       visible:false,
    //       source: new ol.source.Vector({
    //           format: new ol.format.GeoJSON(),
    //           url: './data/bike.geojson',
    //       })  
    //     })
    // },
    // /*'bike': {
    //     'title': 'bike',
    //     'type': 'overlay',
    //     'layer': new ol.layer.Vector({
    //       visible:false,
    //       source: loadJsonSourceWithAjax("./data/bike.geojson")
    //     })
    // },*/
    // 'metroline': {
    //     'title': '捷運線',
    //     'type': 'overlay',
    //     'layer': new ol.layer.Vector({
    //         visible:false,
    //         source: new ol.source.Vector({
    //           format: new ol.format.GeoJSON(),
    //           url: './data/metroline.geojson',
    //         })
    //     })
    // },
    'Google Maps': { 
        'title': 'Google Maps', 
        'type': 'base', 
        'layer': new ol.layer.Tile({ 
            visible:true,
            source: new ol.source.XYZ({
                crossOrigin: 'anonymous',
                url: 'https://mt{0-3}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
            })
        })
    },
    'county': {
        'title': '縣市範圍',
        'type': 'overlay',
        'layer': new ol.layer.Vector({
            visible:true,
            source: new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: './data/county.geojson',
            })
        })
    },
    'charities': {
      'title': '食物銀行',
      'type': 'overlay',
      'layer': new ol.layer.Vector({
          visible:false,
          source: new ol.source.Vector({
              format: new ol.format.GeoJSON(),
              url: './data/charities.geojson',
          })
      })
  },
  'greengrocers': {
    'title': '水果店',
    'type': 'overlay',
    'layer': new ol.layer.Vector({
        visible:false,
        source: new ol.source.Vector({
            format: new ol.format.GeoJSON(),
            url: './data/ggrocers_fixed.geojson',
        })
    })
  }
}


var setLayer=function(key){     //function setLayer(idx)
  for (i = 0; i < Object.keys(layers).length; i++) {
    var tlayer = layers[Object.keys(layers)[i]];
    if (tlayer.type == 'base') 
      layers[Object.keys(layers)[i]].layer.setVisible(Object.keys(layers)[i]==key);    
  }
}

var styles = {
    // 'metro': [new ol.style.Style({
    //     image: new ol.style.Circle({
    //         radius: 5,
    //         fill: new ol.style.Fill({color: 'black'}),
    //         stroke: new ol.style.Stroke({
    //           color: [255,0,0], width: 2
    //         })
    //     })
    // })],/**/
    // 'taipei-metro': [new ol.style.Style({
    //     image: new ol.style.Circle({
    //         radius: 5,
    //         fill: new ol.style.Fill({color: 'black'}),
    //         stroke: new ol.style.Stroke({
    //           color: [255,0,0], width: 2
    //         })
    //     })
    // })],
    // /*'metro': [new ol.style.Style({
    //     image: new ol.style.Icon({
    //       crossOrigin: 'anonymous',
    //       src:'https://maps.google.com/mapfiles/ms/icons/red-dot.png'         
    //     })
    // })],*/
    // 'metroline': [new ol.style.Style({
    //     stroke: new ol.style.Stroke({
    //         color: 'rgba(100, 100, 255, 0.9)',
    //         width: 5,
    //         lineDash: [4,8]   //line dash pattern [line, space]
    //     })
    // })],
    'county': [new ol.style.Style({
        stroke: new ol.style.Stroke({
            color: 'rgba(100, 100, 200, 0.7)',
            width: 2
        }),
        fill: new ol.style.Fill({
            color: 'rgba(0, 0, 0, 0.05)'
        })
    })],
    'charities': [new ol.style.Style({
      // image: new ol.style.Circle({
      //     radius: 5,
      //     fill: new ol.style.Fill({color: 'rgba(255,0,0, 0.3)'}),
      //     stroke: new ol.style.Stroke({
      //       color: [255,0,0], width: 2
      //     })
      // })
      image: new ol.style.Icon(({
            anchor: [0.5, 1],
            src: "http://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?icon=fa-utensils&size=30&hoffset=0&voffset=-1&background=ff6600"
        }))


    })],

    'greengrocers': [new ol.style.Style({
      // image: new ol.style.Circle({
      //     radius: 5,
      //     fill: new ol.style.Fill({color: 'rgba(92,184,92, 0.3)'}),
      //     stroke: new ol.style.Stroke({
      //       color: [92,184,92], width: 2
      //     })
      // })
      image: new ol.style.Icon(({
            anchor: [0.5, 1],
            // src: "http://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?icon=fa-seedling&size=30&hoffset=0&voffset=-1&background=5CB85C"
            src: "http://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?icon=fa-store&size=30&hoffset=0&voffset=-1&background=3385ff"
        }))
    })]
    // 'greengrocers': [new ol.style.Icon({
    //   crossOrigin:'anonymous',
    //   src:'/fruitstand.png'
    // })]
};





// var markers = [ 
//   // $.ajax 
// ]
var lat = [];
var lng = [];
var description = [];
var name2 = [];
$.ajax({
        url: 'php/fruitFarm.php',
        type: 'POST',
        // data: {"lat":lat,"lng":lng},
        dataType:'text',
        async: false,
        success: function(result) {

          result = JSON.parse(result);
          // $("#fName").html(fName);
          // $("#fruitImg").attr("src",result['img_link']);
          // $("#content").html(result['content']);
          // console.log(result);
          
          for(i=0; i<result.length; i++){
              lat.push(Number(result[i]["lat"]));
              lng.push(Number(result[i]["lng"]));
              name2.push("<b>"+result[i]["農場名稱"]+"</b></br>");
              description.push("<h5><b>"+
                               result[i]["種植水果"]+"</br>"+
                               result[i]["盛產期"]+"</br></b></h5></hr>"+
                               "<h6>"+
                               result[i]["地址"]+"</br>"+                                     
                               result[i]["連絡電話"]+"</br>"+
                               result[i]["農場網址"]+"</br>"+
                               "</h6>");
          }
          // console.log(lat);
        },
        error: function(){
          console.log('ajax error');
        }
      }); 


// console.log(name2[0]);

var features = [];
for (var i = 0; i < lng.length; i++) {
    // console.log(lat[i]);
    // console.log(lng[i]);

    // var item = Markers[i];
    // var longitude = item.lng;
    // var latitude = item.lat;

    var iconFeature = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.transform([lng[i], lat[i]], 'EPSG:4326', 'EPSG:3857')),
        name : name2[i],
        description: description[i]
        // geometry: new ol.geom.Point(lng[i],lat[i])

    });

    // console.log(iconFeature);

    var iconStyle = new ol.style.Style({
        image: new ol.style.Icon(({
            anchor: [0.5, 1],
            // src: "http://cdn.mapmarker.io/api/v1/pin?text=F&size=30&hoffset=1"
            src: "http://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?icon=fa-seedling&size=30&hoffset=0&voffset=-1&background=5CB85C"
            // src: "http://cdn.mapmarker.io/api/v1/font-awesome/v5/pin?icon=fa-apple-alt&size=30&hoffset=0&voffset=-1&background=3385ff"

        }))
    });

    // console.log(iconFeature);
    iconFeature.setStyle(iconStyle);
    features.push(iconFeature);

}
// console.log(features);
var vectorSource = new ol.source.Vector({
    features: features
});

var vectorLayer = new ol.layer.Vector({
    visible: false,
    source: vectorSource
});
vectorLayer.setZIndex(40);

layers['fruitFarm'] = {'title': '觀光水果農場', 'type': 'overlay', 'layer':vectorLayer}
// layers.apeend(vectorLayer);
// map.addLayer(vectorLayer);







//file:///home/mjw/NTU/WebGIS/finalproject/fruitstand.png
function initLayers() {
  //console.log("layers:",layers[Object.keys(layers)[0]].layer);
  //console.log("layers:",Object.keys(layers)[0].layer);
  for (i = 0; i < Object.keys(layers).length; i++) {
    var tlayer = layers[Object.keys(layers)[i]];
    // console.log(i);
    // console.log(layers[Object.keys(layers)[i]]);
    map.addLayer(tlayer.layer);
    if(i== 1){
        $('<div class="checkbox"><label><input type="checkbox" checked class="overlaycontrol" name="overlayer" value="' + Object.keys(layers)[i] + '">' + tlayer.title + '</label></div>').appendTo("#overlayerlist");

    }
    if(tlayer.type == 'overlay' && i!= 1){
        $('<div class="checkbox"><label><input type="checkbox" class="overlaycontrol" name="overlayer" value="' + Object.keys(layers)[i] + '">' + tlayer.title + '</label></div>').appendTo("#overlayerlist");
        tlayer.layer.setStyle(styleFunction(Object.keys(layers)[i]));
    }
    // var tlayer = layers[Object.keys(layers)[i]];
    // if (tlayer.type == 'base') {
    //   $('<div class="radio"><label><input type="radio" class="basecontrol" name="baselayer" id=' + Object.keys(layers)[i] + ' value="' + Object.keys(layers)[i] +'"'+ (i==2?' checked':'')   +' >' + tlayer.title + '</label></div>').appendTo("#baselayerlist");
    //   //console.log(layers[Object.keys(layers)[i]].title);
    //   map.addLayer(tlayer.layer);           
    // }else if(tlayer.type == 'overlay') {
    //   $('<div class="checkbox"><label><input type="checkbox" class="overlaycontrol" name="overlayer" value="' + Object.keys(layers)[i] + '">' + tlayer.title + '</label></div>').appendTo("#overlayerlist");
    //   map.addLayer(tlayer.layer);
    //   tlayer.layer.setZIndex(10000-i);
    //   tlayer.layer.setStyle(styleFunction(Object.keys(layers)[i]));
    // }
  }
 
}

function styleFunction(stylename) {
  return styles[stylename];
};

initLayers();



var cursorHoverStyle = "pointer";
var target = map.getTarget();
//target returned might be the DOM element or the ID of this element dependeing on how the map was initialized
//either way get a jQuery object for it
var jTarget = typeof target === "string" ? $("#"+target) : $(target);


var popup=undefined;
var popup2=undefined;
map.on('pointermove', function(evt) {  //triger singleclick, get evt,
  var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {  //get feature and layer by evt.pixel
    return feature;
  });
  if(typeof(popup2)!=undefined){
    map.removeOverlay(popup2);
  }

  if (feature) {
    jTarget.css("cursor", cursorHoverStyle);
    if(feature.get('COUNTYNAME')!=undefined){
    }
    else if(feature.get('name')!=undefined){
        popup2 = new ol.Overlay({
        element: $("<div />").addClass('info').append(
          $("<h4 />").html("<b>"+feature.get('name')+"</b><h6>"+feature.get('description')+"</h6>")
          )[0]
      });
      popup2.setPosition(evt.coordinate);
      // console.log(popup2);
      map.addOverlay(popup2);
    }    
  } else {
    jTarget.css("cursor", "");
  }
});

// map.on('pointermove', function(evt) {  //triger singleclick, get evt,
//   var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {  //get feature and layer by evt.pixel
//     return feature;
//   });

//   if (feature) {

//     jTarget.css("cursor", cursorHoverStyle);
//   } else {
//     jTarget.css("cursor", "");
//   }
// });

map.on('singleclick', function(evt) {  //triger singleclick, get evt,
  var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {  //get feature and layer by evt.pixel
    return feature;
  });

  // console.log("#####");
  // console.log(feature.get('COUNTYNAME'));
  console.log(typeof(feature));

  if(typeof(popup)!=undefined){
    // $("#fName").html("點選水果按鈕，查看簡介");
    map.removeOverlay(popup);
  }
  if(typeof(feature)!=undefined){
     $("#fName").html("找到綠色的水果按鈕並點擊 (ex:<div class='btn btn-success btn-xs'>木瓜</div> )，就可以看到該水果的介紹喔！");
     $("#fruitImg").attr("src","");
     $("#content").html("");
     $("#accordion").accordion("option", "active", 0);
    map.removeOverlay(popup);
  }
  if (feature){
    if(feature.get('COUNTYNAME')!=undefined){

      $.ajax({
        url: 'php/countyBtn.php',
        type: 'POST',
        data: {"cName":feature.get('COUNTYNAME')}, // 傳回資料庫的參數(server端用post接收)
        dataType:'text',
        success: function(result) {
          result = JSON.parse(result);
          console.log(result['水果'])
          result2 = result['水果'].split(",");
          // var res = [];
          for (i = 0; i < result2.length; i++) {
             // $("<div />").append(result['水果'][i] + "<br>");
             // res.push(result2[i]);
             var btn = $("<button class='fruitbtn btn btn-success btn-xs'>"+result2[i]+"</button>");
             $("#fbtn").append(btn);
             // $("#fbtn").append(
             //   $("<button />",{class:"fruitbtn"}).append(result2[i])
             //   ).append("</br>")
          }
        },
        error: function(){
          console.log('ajax error');
        }
      });

      popup = new ol.Overlay({
        element: $("<div />").addClass('info').append(
          $("<h4 />").html(feature.get('COUNTYNAME')).append(
            $("<div />", {id:"fbtn"}).html("")
            )


          )[0]
      });
      popup.setPosition(evt.coordinate);
      map.addOverlay(popup);
    }
  }

  $("#fbtn").on("click", ".fruitbtn", function(){
    // alert("click!!!");
    // alert($(this).text());
    $.ajax({
        url: 'php/fruitDoc.php',
        type: 'POST',
        data: {"fName":$(this).text()},
        dataType:'text',
        success: function(result) {
          result = JSON.parse(result);
          $("#fName").html("<h3>"+result['fName']+"</h3>");
          $("#fruitImg").attr("src",result['img_link']);
          $("#content").html(result['content']+"</hr>");
          $("#1yr").html("過去1年價格走勢");
          $("#5yr").html("過去5年價格走勢");
          monthlyprice(result["fName"])
          yearlyprice(result['fName'])
          $("#accordion").accordion("option", "active", 1);
        },
        error: function(){
          console.log('ajax error');
        }
      });
  });

});


















$(function() {

    var $li = $('ul.tab-title li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.tab-inner').hide();
    
        $li.click(function(e){
            e.preventDefault();
            $($(this).find('a'). attr ('href')).show().siblings ('.tab-inner').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });

  //baseLayer control
  console.log(map.getView().calculateExtent(map.getSize()));
  setLayer('Google Maps');
  // layers["county"].layer.setVisible(true);

  // console.log(typeof(layers['county']));
   layers["county"].layer.setZIndex(10);
  layers["charities"].layer.setZIndex(20);
  layers["greengrocers"].layer.setZIndex(30);


  // console.log(layers["charities"][0]);


  // map.addLayer(vectorLayer);




    // $(".fruitbtn").click(function() {
    //   let $this = $(this);
    //   let fName = $this.text();
    //   console.log(fName);
    //   $.ajax({
    //     url: 'php/fruitDoc.php',
    //     type: 'POST',
    //     data: {"fName":fName},
    //     dataType:'text',
    //     success: function(result) {
    //       result = JSON.parse(result);
    //       $("#fName").html(fName);
    //       $("#fruitImg").attr("src",result['img_link']);
    //       $("#content").html(result['content']);
    //     },
    //     error: function(){
    //       console.log('ajax error');
    //     }
    //   }); 
    // });



  // $("input.basecontrol").change(function() {
  //   if($(this).is(':checked'))
  //     setLayer($(this).attr('value'));    
  // });
  
  //overlayLayer control
  $("input.overlaycontrol").change(function() {
    if($(this).is(':checked')){
      layers[$(this).val()].layer.setVisible(true);
      
      // console.log($(this).val());
      // if($(this).val()=='bus'){
      //   layers[$(this).val()].layer.setSource(loadJsonSourceWithAjax("./data/bike.php"));
      // }
      //
    }
    else
      layers[$(this).val()].layer.setVisible(false);
  });

});

