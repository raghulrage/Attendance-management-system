<?php 
  $get_date = file_get_contents('http://127.0.0.1:5000/get_date');
  $get_date = json_decode($get_date); 

  $query_count = file_get_contents('http://127.0.0.1:5000/pending_query_count');
  $query_count = json_decode($query_count);

  $arr = array();
  foreach ($get_date as $key => $value) {
    if (in_array($value->date, $arr)){ 
    }
    else{
      array_push($arr, $value->date);
    }
  }
  function destroy(){
    session_unset();
    session_destroy();
    header("Location: ./login.html");
  }
  if (isset($_GET['hello'])) {
    destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>
    Admin Dashboard
  </title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link " href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_class.php">Manage Class</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="manage_staff.php">Manage Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_student.php">Manage Student</a>
        </li>
        
      </ul>
          <a href="query.php" class="notification">
            <span>Inbox</span>
          <span class="badge"><?php echo $query_count[0]->count; ?></span>
          </a>
      <div class="navbar">
        <i class="fa fa-sign-out" style="color:white"></i>
        <a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
      </div>
    </div>
  </nav>

  <!-- ---------------------------------------------------------------------------------- -->
        <div class="row mx-auto mt-5 date-list" style="max-height: 550px; overflow-y: auto; position: relative;">
        <?php foreach ($get_date as $key => $value) { ?>
          
        <div class="col m-2">
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="https://cdn.dribbble.com/users/331157/screenshots/2571326/calendar.gif" alt="Card image cap">
            <div class="card-body">
              <a href="attendance.php?date=<?php echo$value->date;?>" class="card-link d-flex justify-content-center"><?php echo $value->date ;?></a>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>

</body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>