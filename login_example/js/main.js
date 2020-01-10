$(function() {
  $("#nav_layerlist").click(function() {
      $("#sidebar").toggle();
      $("#accordion").accordion("option", { active: 0 });

      var config={active: 0, disabled: [1,2]};
      $("#tab-demo").tabs(config);

      updateSize();
  });
  $("#btn-hide").click(function() {
      $("#sidebar").hide();
      updateSize();
  });
  $('#abouttaiwanfruit').click(function(){
    $('#about_taiwan_food_dialog').modal('show');
  });
  $('#fruitclass').click(function(){
    $('#furit_class_dialog').modal('show');
  });
  $('#fruitdetective').click(function(){
    $('#furit_detective_dialog').modal('show');
  });
  $(window).resize(function() {
      updateSize();
  });  
});

updateSize();

function updateSize(){
  $("#container").css("height", $(window).height() - $("nav").height());
  $("#accordion").accordion({        //jQuery UI  
      heightStyle: "fill",
  });
   map.updateSize();
  $("#accordion").accordion("refresh");   
}
