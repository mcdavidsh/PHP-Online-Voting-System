function getState(val) {

	$.ajax({
		type: "POST",
		url: "./ajax/get-lga-ep.php",
		data:'state_id='+val,
		beforeSend: function() {
			$("#lga-list").addClass("loader");
		},
		success: function(data){
			$("#lga-list").html(data);
			$('#ward-list').find('option[value]').remove();
			$("#lga-list").removeClass("loader");
		}
	});
}

function getCity(val) {
	$.ajax({
		type: "POST",
		url: "./ajax/get-ward-ep.php",
		data:'lga_id='+val,
		beforeSend: function() {
			$("#ward-list").addClass("loader");
		},
		success: function(data){
			$("#ward-list").html(data);
			$("#ward-list").removeClass("loader");
		}
	});
}
