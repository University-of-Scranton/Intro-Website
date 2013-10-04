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
