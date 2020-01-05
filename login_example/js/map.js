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
            visible:false,
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
            visible:false,
            source: new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: './data/county.geojson',
            })
        })
    },
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
            color: 'rgba(0, 0, 255, 0.3)'
        })
    })]
};

function initLayers() {
  //console.log("layers:",layers[Object.keys(layers)[0]].layer);
  //console.log("layers:",Object.keys(layers)[0].layer);
  for (i = 0; i < Object.keys(layers).length; i++) {
    var tlayer = layers[Object.keys(layers)[i]];
    if (tlayer.type == 'base') {
      $('<div class="radio"><label><input type="radio" class="basecontrol" name="baselayer" id=' + Object.keys(layers)[i] + ' value="' + Object.keys(layers)[i] +'"'+ (i==2?' checked':'')   +' >' + tlayer.title + '</label></div>').appendTo("#baselayerlist");
      //console.log(layers[Object.keys(layers)[i]].title);
      map.addLayer(tlayer.layer);           
    }else if(tlayer.type == 'overlay') {
      $('<div class="checkbox"><label><input type="checkbox" class="overlaycontrol" name="overlayer" value="' + Object.keys(layers)[i] + '">' + tlayer.title + '</label></div>').appendTo("#overlayerlist");
      map.addLayer(tlayer.layer);
      tlayer.layer.setZIndex(10000-i);
      tlayer.layer.setStyle(styleFunction(Object.keys(layers)[i]));
    }
  }
 
}

function styleFunction(stylename) {
  return styles[stylename];
};

initLayers();

var popup=undefined;
map.on('singleclick', function(evt) {  //triger singleclick, get evt,
  var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {  //get feature and layer by evt.pixel
    return feature;
  });
  console.log("#####");
  // console.log(feature.get('COUNTYNAME'));
  console.log(typeof(feature));

  if(typeof(popup)!=undefined){
    map.removeOverlay(popup);
  }
  if(typeof(feature)!=undefined){
    map.removeOverlay(popup);
  }
  if (feature) {
    if(feature.get('COUNTYNAME')!=undefined){

      

      popup = new ol.Overlay({
        element: $("<div />").addClass('info').append(
          $("<h4 />").html(feature.get('COUNTYNAME'))
        




        // element: $("<div />").addClass('info').append(   //put a table to element parameter
        //   $("<table />").addClass('table').append(
        //     $("<thead />").append(
        //       $("<tr />").append(
        //         $("<th />").html("key")
        //       ).append(
        //         $("<th />").html("value")
        //       )
        //     )
        //   ).append(
        //     $("<tbody />").append(
        //       $("<tr />").append(
        //         $("<td />").html("縣市名稱")
        //       ).append(
        //         $("<td />").html(feature.get('COUNTYNAME'))
        //       )
        //     )
            // ).append(
            //   $("<tr />").append(
            //     $("<td />").html("lat")
            //   ).append(
            //     $("<td />").html(feature.get('lat'))
            //   )
            // ).append(
            //   $("<tr />").append(
            //     $("<td />").html("lng")
            //   ).append(
            //     $("<td />").html(feature.get('lng'))
            //   )
            // ).append(
            //   $("<tr />").append(
            //     $("<td />").html("type")
            //   ).append(
            //     $("<td />").html(feature.get('stype'))
            //   )
            // )
          // )
        )[0]
      });
      popup.setPosition(evt.coordinate);
      map.addOverlay(popup);
    }
  }
});

$(function() {
  //baseLayer control
  console.log(map.getView().calculateExtent(map.getSize()));
  setLayer('Google Maps');
  layers["county"].layer.setVisible(true);

  
  // $("input.basecontrol").change(function() {
  //   if($(this).is(':checked'))
  //     setLayer($(this).attr('value'));    
  // });
  
  // //overlayLayer control
  // $("input.overlaycontrol").change(function() {
  //   if($(this).is(':checked')){
  //     layers[$(this).val()].layer.setVisible(true);
      
  //     console.log($(this).val());
  //     if($(this).val()=='bus'){
  //       layers[$(this).val()].layer.setSource(loadJsonSourceWithAjax("./data/bike.php"));
  //     }
  //     //
  //   }
  //   else
  //     layers[$(this).val()].layer.setVisible(false);
  // });

});

