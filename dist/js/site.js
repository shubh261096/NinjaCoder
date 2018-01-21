$(function() {
	$('#upload_file').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'http://localhost:8080/tiredbuzz/Register/upload_file', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'				: $('#title').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});


function refresh_files()
{
	$.get('./upload/files/')
	.success(function (data){
		$('#files').html(data);
	});
}