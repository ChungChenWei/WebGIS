$(function() {
  $(".fruitbtn").click(function() {
    let $this = $(this);
    let fName = $this.text();
    $.ajax({
      url: 'php/countyBtn.php',
      type: 'POST',
      data: {"cName":cName}, // 傳回資料庫的參數(server端用post接收)
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