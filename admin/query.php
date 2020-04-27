<?php 
$get_query = file_get_contents('http://127.0.0.1:5000/get_query');
$query_details = json_decode($get_query);
$query_count = 0;
foreach ($query_details as $key => $value) {
  if ($value->status == 0) {
    $query_count = 1;
    break;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Queries-Admin
  </title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<body >

  <!-----------------------------------------------Navbar--------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage_class.php">Manage Class</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="manage_staff.php">Manage Staff</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="manage_student.php">Manage Student</a>
        </li>
      </ul>
      <a href="query.php" class="notification">
        <span>Inbox</span>
      </a>
      <div class="navbar">
        <i class="fa fa-sign-out" style="color:white"></i>
        <a href='index.php?hello=true' style="text-decoration: none;">Logout</a>
      </div>
    </div>
  </nav>
  <!-----------------------------------------------Navbar end--------------------------------------------->
  <div class="ml-5 mt-3">
   <button type="button" class=" mr-1 btn btn-danger active" onclick="display_pending()">Pending Queries</button>
   <button type="button"  class="btn btn-success" onclick="display_solved()">Solved Queries</button> 
 </div>

 <div class= " mt-5 container d-flex justify-content-center" >

  <div class="row table-responsive w-100" id="pending" style="max-height: 500px; overflow-y: auto; position: relative;">
    <table id="myPendingTable" class="mb-0 table table-bordered table-hover table-light table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Query</th>
          <th scope="col">Asked By</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php $i=1; ?>
        <?php foreach ($query_details as $key => $value) { ?>

          <?php if ($value->status == 0) { ?>
            <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $value->query; ?></td>
              <td><?php echo $value->staff; ?></td>
              <td><?php echo $value->date; ?></td>
              <td>
                <div class="btn-group-toggle">
                 <label class="btn btn-info" >
                  <input type="radio" value="<?php echo $value->query_id;?>" data-target="#exampleModalCenter" data-toggle="modal" name='query_solve' > Resolve</input>
                </label> 
              </div>
            </td>
          </tr>
          <?php $i++; ?>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table> 
  <?php if (count($query_details) == 0) { ?>
    <p class="p-2 mb-2 bg-light text-dark d-flex justify-content-center">No Records Found</p>
  <?php } ?>
</div>


<div class="row table-responsive w-100" id="resolved" style="display: none; max-height: 500px; overflow-y: auto; position: relative;">
  <table class="mb-0 table table-bordered table-hover table-light table-striped" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Query</th>
        <th scope="col">Asked By</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php $i=1; ?>
      <?php foreach ($query_details as $key => $value) { ?>
        <?php if ($value->status==1) { ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $value->query; ?></td>
            <td><?php echo $value->staff; ?></td>
            <td><?php echo $value->date; ?></td>
            <td><p class="text-success mb-0">Solved</p></td>
          </tr>
          <?php $i++; ?>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
  <?php if ($query_count == 0) { ?>
    <p class="p-2 mb-2 bg-light text-dark d-flex justify-content-center">No Records Found</p>
  <?php } ?>
</div>

</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Submission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you Sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick='resolve()' >Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>

<script src="./assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>