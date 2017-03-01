$("a.deleteFile").click(function() { //deleting a user
	var file = this.id;
	$('#deleteFileModal').modal('show');
	$("button#Delete").click(function(){
		$.ajax({
			type: 'POST',
			url: 'modules/files/deleteFile.php',
			data: {ID : file},
			success:function(response){
				//alert(response);
				$('#deleteFileModal').modal('hide');
				$.ajax({//refreshing the page
					type: "post",
					url: "modules/files/index.php",
					success: function(refresh){ //si recibimos respuesta, quitamos el anterior artículo y colocamos el uevo
						 $(".main").empty();
						 $(".main").html(refresh);
					}
				}); 
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		})
	});
});


