window.onload = function() {
  /*$("table.table") 
  .tablesorter({widthFixed: true, widgets: ['zebra']}) 
  .tablesorterPager({container: $("#pager")}); */    
  $("a#liveControlOn").click(function(){
		source = $("a#liveControlOn").attr("data-src");
		//alert(source+":8080/1&2/action/quit");
		$.ajax({type: "get", url: source+":8080/1/detection/start"});
		$.ajax({type: "get", url: source+":8080/2/detection/start"});
	});
  $("a#liveControlOff").click(function(){
		source = $("a#liveControlOff").attr("data-src");
		//alert(source+":8080/1&2/action/quit");
		$.ajax({type: "get", url: source+":8080/1/detection/pause"});
		$.ajax({type: "get", url: source+":8080/2/detection/pause"});
	});
	$("a#profile").click(function(){
        $.ajax({
          type: "post",
          url: "modules/profile/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);

          }

      });
    });
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
             $("table.table").tablesorter();
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
						$("table.table").tablesorter();
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
             $("table.table").tablesorter();

          }
 
      });
    });
  $("a#files").click(function(){
        $.ajax({
          type: "post",
          url: "modules/files/index.php",
          data: $(this).val(),
          success: function(response){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
            // log a message to the console
             $(".main").empty();
             $(".main").html(response);
             $("table.table").tablesorter();

          }
 
      });
    });
};
