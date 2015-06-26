$(document).ready(function(){

	/*
	TEST CODE FOR INSERTING
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
	*/

	/*****************
	*  Registration  *
	*****************/

	$('#registrationForm').submit(function(event) {
	    /* Stop form from submitting normally */
	    event.preventDefault();
	    $('#message').empty();
	    /* Get some values from elements on the page: */
	    var values = $(this).serialize();
	    /* Send the data using post and put the results in a div */
	     $.ajax({
	        url: "user/register",
	        type: "post",
	        data: values,
	        cache: false,
	        success: function(data){
	        	alert(data);
	        },
	        error:function(){
	        	$('#message').css('color', 'red'); 
	            $("#message").html('Something went wrong with the request!');
	        }
	    });
	});

	/*****************
	*  Registration  *
	*****************/
});