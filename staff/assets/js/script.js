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

  axios.post('https://attendance-flask-app.herokuapp.com/add', arr, config)
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


function attendance(){
  var name = document.getElementsByName('name');
  var regno = document.getElementsByName('regno');
  var att = document.getElementsByName('att');
  var cls = document.getElementById('cls').value;
  var regno_arr = []
  var att_arr = []
  for (i = 0; i<name.length; i++){
    regno_arr.push(regno[i].value)
    att_arr.push(att[i].value)
  }

  var details = {
    "register_no":regno_arr,
    "attendance":att_arr,
    "cls":cls
  }
  console.log(details)

  var config = {
    headers: { 'Content-Type': 'application/json' }
  };

  axios.post('https://attendance-flask-app.herokuapp.com/attendance', details, config)
  .then((response) => {
    console.log(response.data);
    if (response.data === 'Attendance updated successfully!') {
     swal({
      title: "Yeah!",
      text: response.data,
      icon : "success"
    }).then(function() {
      location.reload();
    });
  }
});
}

//=================================================================================================================

function add_query(){
  var staff_id = document.getElementById('staff_id').value;
  var query = document.getElementById('query').value;

  var query_details = {
    "staff_id":staff_id,
    "query":query
  }

  console.log(query_details)

  var config = {
    headers:{
      'Content-Type':'application/json'
    }
  }

  axios.post('https://attendance-flask-app.herokuapp.com/add_query',query_details,config).then((response)=>{
    if (response.data === 'Query added successfully!'){
      swal({
        title:'Yeah!',
        text:response.data,
        icon:'success'
      }).then(function() {
        location.reload();
      });
    }
  })

}


  //--------------------------------------------------------------------------------------------------------------

  function login_staff(){
    var staff_id = document.getElementById('staff_id').value
    var cls = document.getElementsByName('cls')
    for(i = 0; i < cls.length; i++) { 
      if(cls[i].checked) {
        cls=cls[i].value; 
        break;
      }
    } 
    var arr = {
      "staff_id":staff_id
    }
    console.log(cls)
    var config = {
      headers:{
        'Content-Type':'application/json'
      }
    }


    axios.post('https://attendance-flask-app.herokuapp.com/login_staff', arr, config)
    .then((response) => {
      console.log(response.data);

      if (parseInt(response.data) >= 1) {
       swal({
        title: "Yeah!",
        text: "Login successful",
        icon : "success"
      }).then(function() {
        window.location.href = "index.php?staff_id="+staff_id+"&cls="+cls;
      });
    }
    else{
      swal({
        title: "OOPS!",
        text: "Id does not exist",
        icon : "info"
      }).then(function() {
        location.reload();
      });
    }
  });
  }


//-------------------------------------------------------------------------------------------------------------------

function reset(){
  var query = document.getElementById("query").reset();
}