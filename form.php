<?php
	require_once('incl/functions.php');
?>

<html>
<!-- http://rickharrison.github.io/validate.js/ -->
	<head>
		<title>Form Validation</title>
		<script type="text/javascript" src="incl/validate.min.js"></script>				
	</head>

	<body>
	
	<?php
		if(isset($_POST['submit'])){
			$valid= true;
			
			foreach($_POST as $key=>$value){
				$_POST[$key]= $db->clean($value);
			}
			
			extract($_POST);
			 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				print "Hey man. Your email ain't valid.";
				$valid= false; 
				}
			
			if(!ereg("^([0-9]{5})$", $zip)){
				print "Please fill out your 5 digit zip code";
				$valid= false;
				}
			if(sizeof($name) < 1){
				print "Please fill out your name!";
				$valid= false;
			}

			if(sizeof($message) < 1){
				print "Not much to say, huh?";
				$valid= false;
			}

			if($valid){
				$time= $db->get_timestamp();
				$q= "INSERT INTO contact_info VALUES('', '$name', '$email', '$zip', '$message', '$time');";
				print "<h3>$q</h3>";
				$success= $db->query($q);
			} 
		}
	?> 
	
		<div id="errors"></div>
		<form name="contact" method="post">
			<div>
				<label for="name">Name:</label> <input type="text" name="name" /></div>
			<div><label for="email">Email:</label> <input type="email" name="email" /></div>
			<div><label for="subject">Subject:</label> <input type="text" name="subject" /></div>
			<div><label for="zip">Zip Code:</label> <input type="text" name="zip"  /></div>
			<div><label for="name">Message:</label><br/>
				 <textarea name="message"></textarea>
			</div>
			<div><input type="submit" name="submit" value="Submit" /></div>
		</form>
		
		
		
		<script type="text/javascript">
			var validator = new FormValidator('contact', [{
				    name: 'name',
				    display: 'name',    
				    rules: 'required'
				}, {
				    name: 'email',
				    rules: 'required|valid_email'
				}, {
				    name: 'subject',
				    rules: 'min_length[8]'
				},{
					name: 'zip',
					rules: 'exact_length[5]|numeric'
				
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
