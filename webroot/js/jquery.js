$(document).ready(function(){
	//setzt den Dateiname vom Uploadfeld in anderes Inputfeld
	$("#upload").change(function () {
		$("#filename").val($(this).val());
	});
	
});