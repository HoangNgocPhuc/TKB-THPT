$('#name_subject').on('change', function()
{
    var subject = $(this).val();
    var url = $(this).data('url');
    $.post(url,{
    	subject : subject,
    	_token: $('meta[name="csrf-token"]').attr('content')
    }, function( data ){
    		console.log(data);
    		$('#html_list_teacher').html(data);
    });
});