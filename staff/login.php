<?php 
$get_class = file_get_contents('http://127.0.0.1:5000/get_class');
$get_class = json_decode($get_class);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Login</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

	
	<div class="container pt-5 d-flex justify-content-center">

		<form class=" text-center p-5 mt-5" action="javascript:login_staff()" style="background-color: #fcf2ff;" method="post">

			<p class="h4 mb-4">Faculty Login</p>

			<input type="text" id="staff_id" class="form-control mb-4" name="staff_id" placeholder="Staff Id" autocomplete="off" required="">
			<p class="h5 mb-4 text-left">Class</p>
			<div class="radio">
				<div class="switch-field justify-content-center">
					<?php foreach ($get_class as $key => $value) { ?>
						<input type="radio" value="<?php echo $value->class_name; ?>" id='<?php echo $value->class_name; ?>' name="cls" required>
						<label for="<?php echo $value->class_name; ?>"><?php echo strtoupper($value->class_name); ?></label>		    			
					<?php } ?>
				</div>
			</div>		    			
			<button class="btn btn-primary btn-block my-4" name="submit" type="submit">Login</button>
			<a href="../index.html"><small id="emailHelp" class="form-text text-dark">Home</small></a>
		</form>

	</div>
</body>

<script src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>