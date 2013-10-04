<html>
<!-- http://rickharrison.github.io/validate.js/ -->
	<head>
		<title>Form Validation</title>
		<script type="text/javascript" src="incl/validate.min.js"></script>				
	</head>

	<body>
	
	<?php
		if(isset($_POST['submit'])){
			$email= $_POST['email'];
			 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				print "Hey man. Your email ain't valid.";
			}
		}
	?> 
	
		<div id="errors"></div>
		<form name="contact" method="post">
			<div>
				<label for="name">Name:</label> <input type="text" name="name" /></div>
			<div><label for="email">Email:</label> <input type="email" name="email" /></div>
			<div><label for="subject">Subject:</label> <input type="text" name="subject" /></div>
			
			<div><label for="name">Message:</label><br/>
				 <textarea name="message"></textarea>
			</div>
			<div><input type="submit" name="submit" value="Submit" /></div>
		</form>
		
		
		
		<script type="text/javascript">
			var validator = new FormValidator('contact', [{
				    name: 'name',
				    display: 'required',    
				    rules: 'required'
				}, {
				    name: 'email',
				    rules: 'required|valid_email'
				}, {
				    name: 'subject',
				    rules: 'min_length[8]'
				},{
				    name: 'message',
				    rules: 'required'
				}], function(errors, event) {
				    if (errors.length > 0) {
				        var errorString = '';
				        
				        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
				            errorString += errors[i].message + '<br />';
				        }
				        
				        document.getElementById('errors').innerHTML = errorString;
				    }   
				});
		</script>

		
	</body>
</html>
