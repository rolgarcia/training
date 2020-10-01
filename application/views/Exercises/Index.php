<!DOCTYPE html>
<html>
<head>
	<title>Database Exercise</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1 class="header" id="header1">BlackCoders</h1>
	<button class="btn btn-primary" id="btn">Show Table Data</button>
	<button class="btn btn-danger" id="btn-delete">Delete All Table Data</button>
	<button class="btn btn-info" id="btn-validate">Validate</button>

	<input type="text" name="input1" id="textField">
	<span class="invalidData" id="errorMsg"></span>

<button class="btn btn-primary"><a href="<?php echo base_url().'exercises/logout'?> " style="text-decoration:none;">Logout</a></button>


	<table class="myTable table table-bordered">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>username</th>
			<th>email</th>
			<th>phone</th>
			<th>website</th>
		</tr>
		<tbody class="tableData">
			
		</tbody>
	</table>
</body>
</html>

<script>
$(document).ready(function(){
	$("#textField").focus();

	// 	var outputhtml = "";

	// 	for(var i=0;i<1;i++){
	// 		outputhtml+="<li>"+Date.now()+"<button class='hide'>Hide</button></li><button class='show'>Show</button></li>"
	// 	}

	// 	$("#show_data").html(outputhtml);

	// 	// $("#alert").click(function(){
	// 	// 	alert("success");
	// 	// });
	// });
		// $(document).on("click", ".hide", function(){
		// 	$("h1").toggle();
		// });
		// $(document).on("click", ".hide", function(){
		// 	$("h1").hide();
		// });
		// $(document).on("click", ".show", function(){
		// 	$("h1").show();
		// });
		// var text_field = $("h1").text();
		// $("#text_field").val(text_field);

// AJAX main functions
	$("#btn").click(function(){
		$.ajax({
			method : "GET",
			url: 'https://jsonplaceholder.typicode.com/users',
			success: function(data){
				

			 for(var start =0;start<data.length; start++){
			 	$(".tableData").append("<tr><td>" + data[start].id + "</td><td>" + data[start].name + "</td><td>" + data[start].username + "</td><td>" + data[start].email + "</td><td>" + data[start].phone + "</td><td>" + data[start].website + "</td><td><button class='btn btn-danger' id='remove'>Remove</button></td>");
			 }




			},error:function(){

			}

		});
// removing each row of the table 
	// $(document).on('click', '#remove', function(){
 //      $(this).parents('tr').remove();
 //    });

 // removing each row of the table SIR ROBIN'S POINT OF VIEW
	$(document).on('click', '#remove', function(){
      $(this).closest('tr').fadeToggle(1500,function(){
      	$(this).remove();
      });
    });
// deleting all data on the table
	$(document).on("click", "#btn-delete", function(){
      $(".myTable .tableData > tr").remove();
      counter = 1;
    });
	});

// validations
// $("#errorMsg").removeClass("red").hide();

// 	var textField = $("textField").val();

// 	if (textField == "" || textField == null) {
		

// 		$("#btn-validate").click(function(){
// 		 $("h1").addClass("important red");
// 		 $("#errorMsg").addClass("red").show();
// 	});
		
// 	} 
// 	else {
// 		$("h1").removeClass("green").hide();
// 			$("#btn-validate").click(function(){
// 			$("h1").addClass("important green");
// 			$("#h1").addClass("red").show();
// 	});

		
// 	} 

	$(document).on("click", "#btn-validate", function(){
		var textField = $("#textField").val();
		if (textField == "" || textField == null) {
			$("h1").addClass("important red");
	 		$("#errorMsg").addClass("red").show();
	 		$("#errorMsg").text("Required Field");
		} else {

			$("h1").addClass("important green");
	 		$("#errorMsg").removeClass("red").hide();
	 		// $("#errorMsg").text("Required Field");

		}
	});

		$(document).on("keyup", "#textField", function(){
		var textField = $("#textField").val();
		if (textField == "" || textField == null) {
			$("h1").removeClass("green");
			$("h1").addClass("red");
	 		$("#errorMsg").addClass("red").show();
	 		$("#errorMsg").text("Required Field");

		} else {

			$("h1").addClass("important green");
	 		$("#errorMsg").removeClass("red").hide();
	 		// $("#errorMsg").text("Required Field");

		}
	});

});
</script>