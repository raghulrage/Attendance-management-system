// ------------------------------------------------------------------------------------------------------------

function delete_class(){
  var cls = document.getElementsByName('cls');

  for(i = 0; i < cls.length; i++) { 
      if(cls[i].checked) {
        cls=cls[i].value; 
        break;
      }
  }
  var arr = {
    'class_name':cls
  }
  console.log(arr)

  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.post('http://127.0.0.1:5000/delete_class', arr, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Class deleted successfully!') {
     swal({
      title: "Yeah!",
      text:  response.data,
      icon : "success"
    }).then(function() {
        location.reload();
    });
   }
 });
}

// ------------------------------------------------------------------------------------------------------------

  function add_student(){
    var regno = document.getElementById('register_no').value;
    var name = document.getElementById('student_name').value;
    var cls = document.getElementsByName('cls');
    
    for(i = 0; i < cls.length; i++) { 
      if(cls[i].checked) {
        cls=cls[i].value; 
        break;
      }
        
    } 
    var arr = {
        'register_no':regno,
        'student_name':name,
        'class': cls
    }
    console.log(arr)

    var config = {
        headers: { 'Content-Type': 'application/json' }
      };

    axios.post('http://127.0.0.1:5000/add', arr, config)
      .then((response) => {
      console.log(response.data);
      if (response.data === 'Student added successfully!') {
       swal({
        title: "Yeah!",
        text: response.data,
        icon : "success"
        }).then(function() {
          location.reload();
        });
      }
      else{
        swal({
      title: "OOPS!",
      text: response.data,
      icon : "info"
    }).then(function() {
        location.reload();
    });
      }
    });
  }


// ------------------------------------------------------------------------------------------------------------

function add_class(){
  var class_name = document.getElementById('class_name').value;

  var arr = {
    'class_name':class_name
  }
  console.log(arr)

  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.post('http://127.0.0.1:5000/add_class', arr, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Class added successfully!') {
     swal({
      title: "Yeah!",
      text: response.data,
      icon : "success"
    }).then(function() {
        location.reload();
    });
   }
   else if (response.data === 'Class already existing!') {
    swal({
      title: "OOPS!",
      text: response.data,
      icon : "info"
    }).then(function() {
        location.reload();
    });
   }
 });
}

//----------------------------------------------------------------------------------------------

function select_class(){
      var cls = document.getElementsByName('cls');
      var input_search = document.getElementById('myInput');

    for(i = 0; i < cls.length; i++) { 
      if(cls[i].checked) {
        cls=cls[i].value; 
        break;
      } 
    } 
    console.log(cls);
    input_search.value=cls;
}

//-------------------------------------------------------------------------------------------------------------

function delete_student(){
  var rollno = document.getElementById('rollno').value;
  var arr = {
    "rollno": rollno 
  } 
  console.log(arr)
  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.post('http://127.0.0.1:5000/delete_student', arr, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Student deleted successfully!') {
     swal({
      title: "Yeah!",
      text:  response.data,
      icon : "success"
    }).then(function() {
        location.reload();
    });
   }
 });

}

//-------------------------------------------------------------------------------------------------------------------

function display_solved(){
  document.getElementById('resolved').style.display = "block";
  document.getElementById('pending').style.display = "none";
}


function display_pending(){
  var display = document.getElementById('resolved')
  var hide = document.getElementById('pending')

  display.style.display = "none"
  hide.style.display = "block"
}


//-----------------------------------------------------------------------------------------------------------------------
function resolve(){
  var resolve = document.getElementsByName('query_solve')
      for(i = 0; i < resolve.length; i++) {
      if(resolve[i].checked) {
        resolve=resolve[i].value; 
        break;
      }
    }
    
  var arr = {
    "query_id": resolve
  }

  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.patch('http://127.0.0.1:5000/resolve_query', arr, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Query resolved successfully!') {
        location.reload();
   }
 });

}


//------------------------------------------------------------------------------------------------------------------------
 function add_staff(){
    var staff_id = document.getElementById('staff_id').value;
    var staff_name = document.getElementById('staff_name').value;
 
    var arr = {
        'staff_id':staff_id,
        'staff_name':staff_name
    }
    console.log(arr)

    var config = {
        headers: { 'Content-Type': 'application/json' }
      };

    axios.post('http://127.0.0.1:5000/add_staff', arr, config)
      .then((response) => {
      console.log(response.data);
      if (response.data === 'Staff Added successfully!  ') {
       swal({
        title: "Yeah!",
        text: response.data,
        icon : "success"
        }).then(function() {
          location.reload();
        });
      }
      else{
        swal({
      title: "OOPS!",
      text: response.data,
      icon : "info"
    }).then(function() {
        location.reload();
    });
      }
    });
  }

//--------------------------------------------------------------------------------------------------------------------------

function delete_staff(){
  var staff_id = document.getElementById('delete_staff_id').value;
  var arr = {
    "staff_id": staff_id 
  } 
  console.log(arr)
  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.post('http://127.0.0.1:5000/delete_staff', arr, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Staff deleted successfully!') {
     swal({
      title: "Yeah!",
      text:  response.data,
      icon : "success"
    }).then(function() {
        location.reload();
    });
   }
 });

}

//---------------------------------------------------------------------------------------------------------------------------

function class_select_fn(){
  var cls = document.getElementsByName('class_select')

      for(i = 0; i < cls.length; i++) { 
      if(cls[i].checked) {
        cls=cls[i].value; 
        break;
      } 
    }
    window.location.href = 'view_student.php?cls='+cls;

}