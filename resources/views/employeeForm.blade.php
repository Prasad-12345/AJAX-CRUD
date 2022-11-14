<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
  <style>
    #emp-form {
      margin: auto
    }

    #editEmpForm {
      margin: auto
    }

    .table {
      margin: auto
    }
  </style>
</head>

<body>
  <div>
    <form style="width:25%" id="emp-form" class="was-validated">
      <!-- class="was-validated" -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <h2 style="margin-right:50px">Employee Form</h2>
      <!-- Name input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example1">First Name</label>
        <input type="text" id="firstName" name="firstName" class="form-control" required />
        <span id="firstNameError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out first name field.</div>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Last Name</label>
        <input type="text" id="lastName" name="lastName" class="form-control" required />
        <span id="lastNameError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">city</label>
        <input type="text" id="city" name="city" class="form-control" required />
        <span id="cityError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2"> state</label>
        <input type="text" id="state" name="state" class="form-control" required />
        <span id="stateError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Email</label>
        <input type="text" id="email" name="email" class="form-control" required />
        <span id="emailError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Password</label>
        <input type="text" id="password" name="password" class="form-control" required>
        <span id="passwordError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">company_id</label>
        <input type="text" id="company_id" name="company_id" class="form-control" required />
        <span id="company_idError"></span>
        <!-- <div class="valid-feedback">Valid.</div> -->
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <!-- Submit button -->
      <button type="button" id="add" class="btn btn-primary btn-block mb-4">submit</button>
    </form>
  </div>

  <div id="viewEmp">
    <table class="table" id="empDataTable" style="width: 80%;">
      <thead>
        <tr>
          <th scope="col">srno</th>
          <th scope="col">first name</th>
          <th scope="col">last name</th>
          <th scope="col">city</th>
          <th scope="col">state</th>
          <th scope="col">email</th>
          <th scope="col">password</th>
          <th scope="col">company_id</th>
          <!-- <th scope="col">c.name</th> -->
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($employees as $employee)


        <tr>
          <td>{{$employee->id}}</td>
          <td>{{$employee->firstName}}</td>
          <td>{{$employee->lastName}}</td>
          <td>{{$employee->city}}</td>
          <td>{{$employee->state}}</td>
          <td>{{$employee->email}}</td>
          <td>{{$employee->password}}</td>
          <td>{{$employee->company_id}}</td>
          <td>
            <a href="#" class="btn btn-success editbtn" id="empeditBtn" data-idEdit={{$employee->id}}> EDIT</a>
            <a href="#" class="btn btn-danger  deletebtn" id="deleteBtn" data-id={{$employee->id}}> DELETE</a>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>

    <!-- </form> -->
  </div>

  <form style="width:25%" id="editEmpForm">
    <h2 style="margin-right:50px">Edit Employee Form</h2>
    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example1"> id</label>
      <input type="text" id="editid" name="id" class="form-control" />
      <div>
        @if($errors->has('firstName'))
        <div class="error"> {{ $errors->first('firstName') }} </div>
        @endif
      </div>
    </div>

    <!-- Name input -->
    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example1">First Name</label>
      <input type="text" id="editfirstName" name="firstName" class="form-control" />
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2">Last Name</label>
      <input type="text" id="editlastName" name="lastName" class="form-control" />
    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2">city</label>
      <input type="text" id="editcity" name="city" class="form-control" />

    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2"> state</label>
      <input type="text" id="editstate" name="state" class="form-control" />

    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2">Email</label>
      <input type="text" id="editemail" name="email" class="form-control" />

    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2">Password</label>
      <input type="text" id="editpassword" name="password" class="form-control" />

    </div>

    <div class="form-outline mb-4">
      <label class="form-label" for="form5Example2">company_id</label>
      <input type="text" id="editcompany_id" name="company_id" class="form-control" />
    </div>

    <!-- Submit button -->
    <button type="submit" id="update" class="btn btn-primary btn-block mb-4">update</button>

  </form>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

  <!-- <script src="/js/validation.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#editEmpForm").hide();
      fetchEmployee();
      $('#empDataTable').DataTable();
      $("#emp-form").validate({
        rules: {
          firstName: {
            required: true,
            // validfirstName: true,
            minlength: 3
          },
          lastName: {
            required: true,
            // validlastName: true,
            minlength: 3
          },
          city: {
            required: true,
            // validcity: true,
            minlength: 3
          },
          state: {
            required: true,
            // validstate: true,
            minlength: 3
          },
          email: {
            required: true,
            // validemail: true,
            minlength: 5
          },
          password: {
            required: true,
            // validpassword: true,
            minlength: 8
          },

        },

        messages: {
          firstName: {
            required: "please enter first name",
            minlength: "length should be greater than 3 characters"
          },
          lastName: {
            required: "please enter last name",
            minlength: "length should be greater than 4 characters"
          },
          city: {
            required: "please enter city",
            minlength: "length should be greater than 3 characters"
          },
          state: {
            required: "please enter state",
            minlength: "length should be greater than 3 characters"
          },
          email: {
            required: "please enter email",
            minlength: "length should be greater than 8 characters"
          },
          password: {
            required: "please enter password",
            minlength: "length should be greater than 8 characters"
          },
        },

        submitHandler: function(form) {
          form.submit();
        }
      });




      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      function fetchEmployee() {
        $.ajax({
          type: "GET",
          url: "/getEmp",
          success: function(response) {
            console.log("data fetched");

          }
        })
      }

      $("#add").on('click', function(e) {
        e.preventDefault()

        $.ajax({
          type: "POST",
          url: "{{ route('emp.add') }}",
          data: $("#emp-form").serialize(),
          dataType: "json",
          success: function(response) {
            console.log(response);

            if (response.data.original.success == true) {
              console.log('test');
              alert("employee added")
            } else {
              console.log(response.data.original.errors);
              $.each(response.data.original.errors, function(key, value) {
                console.log(key, value);
                console.log(value.firstName);
                if (key == 'firstName') {
                  $('#firstNameError').html(value)
                }
                if (key == 'lastName') {
                  $('#lastNameError').html(value)
                }
                if (key == 'city') {
                  $('#cityError').html(value)
                }
                if (key == 'state') {
                  $('#stateError').html(value)
                }
                if (key == 'email') {
                  $('#emailError').html(value)
                }
                if (key == 'password') {
                  $('#passwordError').html(value)
                }
                if (key == 'company_id') {
                  $('#company_idError').html(value)
                }
              })

              console.log("Data not added");
            }

          },
          error: function(error) {
            // console.log($errors.firstName);
            console.log(error);
          }
        });
      })

      $(document).on('click', "#empeditBtn", function(e) {
        e.preventDefault()
        $("#editEmpForm").show();
        var id = $(this).attr('data-idEdit');
        $.ajax({
          type: 'GET',
          url: '/getEditData',
          data: {
            'id': id
          },
          success: function(response) {
            console.log(response);
            // $(".editEmpForm").modal("hide");
            if (response.status == 400) {
              console.log(error);
            } else {
              // console.log("hello");
              $("#editid").val(response.emp.id);
              $("#editfirstName").val(response.emp.firstName);
              $("#editlastName").val(response.emp.lastName);
              $("#editcity").val(response.emp.city);
              $("#editstate").val(response.emp.state);
              $("#editemail").val(response.emp.email);
              $("#editpassword").val(response.emp.password);
              $("#editcompany_id").val(response.emp.company_id);
            }
          },
          error: function(error) {
            console.log(error);
          }
        })
      })

      $("#update").on('click', function(e) {
          e.preventDefault()

          $.ajax({
            type: 'POST',
            url: '/updateEmpData',
            data: $("#editEmpForm").serialize(),
            success: function(response) {
              alert(response.message)
              $("#editEmpForm").hide();
            }
          })
        }),

        $(document).on('click', "#deleteBtn", function(e) {
          e.preventDefault()

          var id = $(this).attr('data-id');
          $.ajax({
            type: "POST",
            url: "/deleteEmp",
            data: {
              'id': id
            },
            success: function(response) {
              alert(response.message)
              // $('#viewEmp').load("\resources\views\employeeForm.blade.php");
            }
          })

        })
    })
  </script>

</body>



</html>