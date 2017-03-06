$("input#EditProfile").click(function() {
	var formData = $("form#editForm").serialize();
	//alert(formData);
	$.ajax({
		type: 'POST',
		url: 'modules/profile/editProfile.php',
		data: formData,
		success:function(response){
					 $(".main").append('<div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>  <strong>Done!</strong> Profile data changed</div>');
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		}
	});
});	
