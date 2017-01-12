window.onload = function() {
  /*$("table.table") 
  .tablesorter({widthFixed: true, widgets: ['zebra']}) 
  .tablesorterPager({container: $("#pager")}); */
    
  $("a#settings").click(function(){
        $.ajax({
          type: "post",
          url: "modules/settings/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);

          }

      });
    });
  $("a#users").click(function(){
        $.ajax({
          type: "post",
          url: "modules/users/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);

          }
 
      });
    });
  $("a#articles").click(function(){
        $.ajax({
          type: "post",
          url: "modules/articles/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);

          }
 
      });
    });
  $("a#categories").click(function(){
        $.ajax({
          type: "post",
          url: "modules/categories/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);

          }
 
      });
    });
};
