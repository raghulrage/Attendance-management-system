<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

	
	<div class="container d-flex justify-content-center">

		<form class="text-center border border-light p-5 mt-5" action="javascript:validate()" style="background-color: rgba(0, 32, 128,0.2);" method="post">

			<p class="h4 mb-4 text-light">Student Login</p>

			<input type="text" id="regno" class="form-control mb-4" name="regno" placeholder="Register Number" autocomplete="off" required="">		
			<input type="password" id="password" class="form-control mb-4" name="password" placeholder="Password" autocomplete="off" required="">    			
			<button class="btn btn-primary btn-block my-4" name="submit" type="submit">Login</button>
			<a href="../index.html"><small id="emailHelp" class="form-text text-light">Home</small></a>
		</form>

	</div>
</body>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script>
	function validate(){
		var regno = document.getElementById('regno').value;
		var pass = document.getElementById('password').value;

		if (pass == 'password')	{
			var config = {
				headers: { 'Content-Type': 'application/json' }
			};

			axios.post('http://127.0.0.1:5000/student_login/'+regno,config)
			.then((response) =>{
				console.log(response.data);
				if (response.data === 'Sudent Login successful!!') {
					swal({
						title: "Yeah!",
						text: response.data,
						icon : "success"
					}).then(function() {
						window.location.href = 'dashboard.php?regno='+regno;
					});
				}
				else if (response.data === '0') {
					swal({
						title: "OOPS!",
						text: 'Login unsuccessful!!',
						icon : "info"
					}).then(function() {
						location.reload();
					});
				}
			});

		}
		else{
			swal({
				title: "OOPS!",
				text: 'Incorrect Password',
				icon : "info"
			}).then(function() {
				location.reload();
			});
		}


		
	}
</script>

</html>