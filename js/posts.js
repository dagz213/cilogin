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
	        dataType: "json",
	        success: function(data){
	        	if(data['passworderror']) {
	        		$('#message').css('color', 'red'); 
	            	$("#message").html('Passwords don\'t match!');
	        	} else if(data['success']) {
					$('#message').css('color', 'green'); 
	            	$("#message").html('Register Successful!');
	        	} else {
		        	$('#errorone').html(data['firstname']);
		        	$('#errortwo').html(data['lastname']);
		        	$('#errorthree').html(data['username']);
		        	$('#errorfour').html(data['password']);
		        	$('#errorfive').html(data['confirmpassword']);
		        	$('#errorsix').html(data['email']);
		        }
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