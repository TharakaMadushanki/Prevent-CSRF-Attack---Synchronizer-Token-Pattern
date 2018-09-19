<?php

	if(isset($_POST['username'],$_POST['password'])){
		$uname = $_POST['username'];
		$pwd = $_POST['password'];
		if($uname == 'thara' && $pwd == 'thara'){
			echo 'You have Successfully Logged in';			
		}
		else{
			echo 'Incorrect username or password';
			exit();
		}	
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Cross Site Request Forgery Protection</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet"  href="./public/styles/style.css">
		<script>
		
			$(document).ready(function(){
			
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("csrf_token_to_be_generated").setAttribute('value', this.responseText) ;
					}				
				};			
				xhttp.open("GET", "csrf_token_generator.php", true);
				xhttp.send();			
			});
		</script>
	</head>
	<body>
		<form name="updateStatus" action="results.php" method="post">
			<div class="status">
				<h2>Update Your Status</h2>			
				<textarea rows="10" placeholder="Write here" name="updatepost"></textarea>
				<input type="submit" value="Update" class="btn btn-primary btn-block btn-large">
				<div id="csrfTokenDiv">
					<input type="hidden" name="token" value="" id="csrf_token_to_be_generated"/>
				</div>
			</div>					
		</form>						
		<div class="footer">
			<p>Cross Site Request Forgery Protection  |  Synchronizer Token Pattern  |  Tharaka Liyanage  |  IT13015886</p>
		</div>
	</body> 
</html>
