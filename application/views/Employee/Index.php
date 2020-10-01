
<!DOCTYPE html>
<html>
<head>
	<title><?=$title; ?></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<h4 class="mb-1">Welcome, <?php echo $this->session->userdata('firstname'); ?></p></h4>

	

	<!-- BlackCoders --><!-- <?=$name; ?> -->
	<!-- <?=base_url(); ?>
	<?=base_url('assets'); ?> -->
<!-- 	<br>
	<?php 
		foreach ($employee as $row) {
			echo $row->firstname;
			echo "<br>";
			echo $row->lastname;
			echo "<br>";
		}
	?> -->
	<button><a href="<?php echo base_url().'employee/logout'?> " style="text-decoration:none;">Logout</a></button>
	<br>
	<label>FIRSTNAME:</label>
	<input type="text" name="" id="firstname">
	<label>LASTNAME:</label>
	<input type="text" name="" id="lastname">
	<button id="submit">Submit</button>
	<button id="show">Show Data</button>
	
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
	<table class="myTable table table-bordered">
		<tr>
			<th>Name</th>
			<th>Company Name</th>
			<th>Position</th>
			<th>Department</th>

		</tr>
		<tbody class="tableData">
			<?php 
		foreach($showDetails as $value ){
			echo "<tr>";
			echo "<td>".$value['Fullname']."</td>";
			echo "<td>".$value['Company']."</td>";
			echo "<td>".$value['Position']."</td>";
			echo "<td>".$value['Department']."</td>";	
			echo "</tr>";		
		}
?>
		</tbody>
	</table>
<hr>
<h1>UPLOAD FILE</h1>
<input type="file" name="file" id="file">
<button id="upload">UPLOAD</button>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#firstname").focus();




		$(document).on("click", "#upload", function(){
			var property = document.getElementById("file").files[0];
			var imgName = property.name;
			var imgSize = property.size;
			var imgExtension = imgName.split(".").pop();

			if(imgExtension!="jpg" &&
				imgExtension!="png" &&
				imgExtension!="jpeg" &&
				imgExtension!="svg"){
				alert("INVALID FILE FORMAT!");
			}else{
				if(imgSize > 9999999){
					alert("FILE IS TOO BIG!");
				}else{
					var frmData = new FormData();

					frmData.append("file", property);
					frmData.append("filename", imgName);

					$.ajax({
						url:"employee/upload_employee",
						method: "POST",
						data:frmData,
						contentType:false,
						processData:false,
						success:function(data){

						}
					});
				}
			}


			console.log(imgName);
			console.log(imgSize);
			console.log(imgExtension);
		});

		$(document).on("click", "#submit", function(){
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();

			$.ajax({
				url:'employee/create_employee',
				method: 'POST',
				data:{firstname,
					  lastname},
				dataType: 'json',
				success:function(data){
					console.log(data[0]['firstname']);
					for(var start=0;start<data.length; start++){
						$(".tableData").append("<tr><td>" + data[start].employeeID + "</td><td>" + data[start].firstname + "</td><td>" + data[start].lastname + "</td><td><button class='btn btn-danger remove' id='" + data[start].employeeID + "'>Remove</button></td>");
					}
				} 
			});
		});

		$(document).on("click", ".remove", function(){
			var getEmployeeId = $(this).attr("id");
			var btn = $(this);


			$.ajax({
				url:'employee/delete_employee',
				method: 'POST',
				data:{getEmployeeId : getEmployeeId},
				dataType: 'json',
				success:function(data){
					console.log(data[0]['firstname']);
					for(var start=0;start<data.length; start++){
						$(".tableData").append("<tr><td>" + data[start].employeeID + "</td><td>" + data[start].firstname + "</td><td>" + data[start].lastname + "</td><td><button class='btn btn-danger remove' id='" + data[start].employeeID + "'>Remove</button></td>");
					}
			$(btn).closest('tr').fadeToggle(1500,function(){
		      	$(btn).remove();
		      });
				} 
			});
		});
 // removing each row of the table SIR ROBIN'S POINT OF VIEW
	$(document).on('click', '#edit', function(){
      
    });
		$(document).on("click", ".remove", function(){
			var getEmployeeId = $(this).attr("id");
			var btn = $(this);


			$.ajax({
				url:'employee/delete_employee',
				method: 'POST',
				data:{getEmployeeId : getEmployeeId},
				dataType: 'json',
				success:function(data){
					console.log(data[0]['firstname']);
					for(var start=0;start<data.length; start++){
						$(".tableData").append("<tr><td>" + data[start].employeeID + "</td><td>" + data[start].firstname + "</td><td>" + data[start].lastname + "</td><td><button class='btn btn-danger remove' id='" + data[start].employeeID + "'>Remove</button></td><td><button id='edit'>Edit</button></td>");
					}
			$(btn).closest('tr').fadeToggle(1500,function(){
		      	$(btn).remove();
		      });
				} 
			});
		});


	});

</script>