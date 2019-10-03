console.log(cs_object.mainservice);
console.log(cs_object.subservice);


jQuery.each(cs_object.mainservice, function(index, val) {
	console.log(val);
	jQuery('#futurecampselect').append('<option value="'+val.id+'" data-msg="'+val.msg+'">'+val.name+'</option>')
});


jQuery(document).on('change', '#futurecampselect', function(event) {
	event.preventDefault();
	var id = jQuery(this).val();
	if (id == 0) {
		return false;	
	}
	console.log(cs_object.subservice[id]);
	jQuery('#servicess').html('<option value="0" selected="selected">--- Select ---</option>');
	jQuery.each(cs_object.subservice[id], function(index, val) {
		jQuery('#servicess').append('<option value="'+val.id+'" data-price="'+val.price+'" data-type="'+val.type+'" data-daypass="'+val.daypass+'">'+val.name+'</option>')
	});
});


// convert json string to json object 
var obj = JSON.parse(data)



// json search from json. file.
$.getJSON('data.json', function(data) {
	$.each(data, function(key, value){
		$('.col-imgs ul').append('<li><a href="'+value.link+'"><img src="'+value.image+'"><h4>'+value.name+'</h4></a></li>');
	});
});


$.ajaxSetup({ cache: false });
$('#searchbtn').click(function(){
	$('.col-imgs ul').html('loading...');
	var searchField = $('#searchbyname').val();
	var expression = new RegExp(searchField, "i");
	$.getJSON('data.json', function(data) {
		$('.col-imgs ul').html('');
		$.each(data, function(key, value){
			if (value.name.search(expression) != -1){
				$('.col-imgs ul').append('<li><a href="'+value.link+'"><img src="'+value.image+'"><h4>'+value.name+'</h4></a></li>');   
			}
		});  
		if ($('.col-imgs ul li').length == 0) {
			$('.col-imgs ul').html('No record found!');
		}
	});
});