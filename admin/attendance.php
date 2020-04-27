<?php 
  $date=$_GET['date'];
  $get_attendance = file_get_contents('http://127.0.0.1:5000/get_attendance/'.$date);
  $get_attendance = json_decode($get_attendance); 

  $get_class = file_get_contents('http://127.0.0.1:5000/get_class');
  $get_class = json_decode($get_class);

  $query_count = file_get_contents('http://127.0.0.1:5000/pending_query_count');
  $query_count = json_decode($query_count);

  function destroy(){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <li class="nav-item">
          <a class="nav-link" href="view_student.php"> View Students</a>
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

  <div class="row m-5" > 
    <input class="form-control " id="myInput" type="text" placeholder="Search..">
    <div class="row m-5 w-100 table-responsive" style="max-height: 450px; overflow-y: auto; position: relative;">
      <table class="mb-0 table table-bordered table-hover table-light table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Register Number</th>
          <th scope="col">Class</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php $i=1; ?>
        <?php foreach ($get_attendance as $key => $value) { ?>
          <tr>
            <th><?php echo $i; ?></th>
            <td><?php echo $value->student_name; ?></td>
            <td><?php echo $value->register_no; ?></td>
            <td><?php echo strtoupper($value->class); ?></td>
            <td id=att><?php if ($value->attendance == 'Present') { ?>
              <p class="text-success font-weight-bold mb-0">Present</p> <?php } else { ?>
              <p class="text-danger font-weight-bold mb-0">Absent</p> <?php } ?>
            </td>
          </tr>
          <?php $i++; ?>
        <?php } ?>
      </tbody>
    </table>
    </div>
    
  </div>
  

</body>

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<script src="./assets/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>