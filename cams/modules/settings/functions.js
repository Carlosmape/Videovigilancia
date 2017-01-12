$("input#submitsettings").click(function() {
	var formData = $("form#form").serialize();
	alert(formData);
	$.ajax({
		type: 'POST',
		url: 'modules/settings.php',
		data: formData,
		success:function(response){
		 alert(response); 
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		}
	})
});
