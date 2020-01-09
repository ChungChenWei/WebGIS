$(function() {
  $(".fruitbtn").click(function() {
    let $this = $(this);
    let fName = $(this).text();
    console.log(fName);
    $.ajax({
      url: 'php/fruitDoc.php',
      type: 'POST',
      data: {"fName":fName},
      dataType:'text',
      success: function(result) {
        result = JSON.parse(result);
        $("#fName").html(fName);
        $("#fruitImg").attr("src",result['img_link']);
        $("#content").html(result['content']);
      },
      error: function(){
        console.log('ajax error');
      }
    }); 
    
  });
});