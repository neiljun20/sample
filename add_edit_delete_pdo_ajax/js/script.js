function ajaxMe(dURL){
	$.ajax({
		url: dURL,
		success: function(data){
			if(dURL == 'inc/index.php'){
				$('#content').html(data);
				record();
			}
			$('#content').html(data);
		}
	});
}

function record(){ //this will show the record
	var search = $('#search').val();
	$.ajax({
		url: 'inc/record.php?search='+search,
		success: function(data){
			$('#recordTable').html(data);
		}
	});
}

function addButton(){
	ajaxMe('inc/add.php');//this will show the add new record
}

function editButton(dURL){
	ajaxMe(dURL);//this will show the edit record
}

function save(dURL){
	$('#redcord').submit(function(){
		var record = $(this).serialize();
		
		$.ajax({
			type: 'POST',
			url: dURL,
			data: record,
			success: function(data){
				if(data == 'added'){
					$("input[type='text']").val('');
					$("input[type='email']").val('');
					$("input[type='password']").val('');
					$("input[type='password']").val('');
					$("select").val('');
					$("input[type='checkbox']").attr('checked', false);
					alert('Successfully save');
				}
				else if(data == 'edited'){
					alert('Successfully save');
				}
				else{
					alert(data);
				}
			}
		});
		
		return false;
	});
}

function deleteMe(dURL){
	$.ajax({
		url: dURL,
		success: function(data){
			if(data == 'User has been deleted'){
				ajaxMe('inc/record.php');
				alert(data);
			}
			else{
				alert(data);
			}
		}
	});
}

$(document).ready(function(){
	ajaxMe('inc/index.php'); //this will show the record
});