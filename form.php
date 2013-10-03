<html>

	<head>
		<title>Form Validation</title>
		
		<script type="text/javascript">
			function validName(name){	
				if(name == ''){
					document.getElementById('nameError').innerHTML= "Hey Man. Fill out your name.";
				}else{
					
					document.getElementById('nameError').innerHTML= "";
				}
			}
			function validate(form){
				name= form.name.value;
				email= form.email.value;
				subject= form.subject.value;
				message= form.message.value;
				if(name == ''){
					document.getElementById('nameError').innerHTML= "Hey Man. Fill out your name.";
				}
				if(name == '' || email == '' || message == ''){
					alert("You did not fill out all of the info");
					return false;
				}else{
					return true;
				}
			}
		</script>
		
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
	
		<form name="contact" method="post" onsubmit="return validate(this);">
			<div>
				<span id="nameError"></span><br/>
				<label for="name">Name:</label> <input type="text" name="name" onblur="validName(this.value);"/></div>
			<div><label for="email">Email:</label> <input type="email" name="email" /></div>
			<div><label for="subject">Subject:</label> <input type="text" name="subject" /></div>
			
			<div><label for="name">Message:</label><br/>
				 <textarea name="message"></textarea>
			</div>
			<div><input type="submit" name="submit" value="Submit" /></div>
		</form>
	</body>
</html>
