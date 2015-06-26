$(document).ready(function(){

	$('#insertTestButton').click(function(){
		$('#message').val('');

		$.ajax({

			type: "POST",
			url: "root/insertTestName", 
			data: { testName: $("#testName").val() },
			dataType: "text",  
			cache: false,
			success: 
			function(data) {

				if(data == "FAIL") {
					$("#message").css( "color", "red" );
					$("#message").text("Error");
					
				} else if(data == "EMPTY") {
					$("#message").css( "color", "red" );
					$("#message").text("Empty");
				} else {
					$("#message").css( "color", "green" );
					$("#message").text("Insert Successful");
					$("#body").append(data + "</br>");
				}
			}

		});

		$('#testName').val('');
	});
});