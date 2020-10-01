<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<body>
	<br>
	Username: <input type="username" name="" id="username" autocomplete="off">
	<br>
	<br>
	Password: <input type="password" name="" id="password" autocomplete="off">
	<br>
	<br>
	<button id="submit">Login</button>
	<br>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$("#username").focus();
		$(document).on("click","#submit",function(){

			var username = $("#username").val();
			var password = $("#password").val();

			$.ajax({
				url:"login/validate_login",
				method:"POST",
				data:{ username : username,
					   password : password},
				dataType: "json",
				success: function(data){
					if(data == 0){
						alert("Access Denied");
					}else{
						alert("Success");
						window.location.replace('<?php echo base_url(); ?>employee');
					}
				
				}

			});

		});
	});
</script>