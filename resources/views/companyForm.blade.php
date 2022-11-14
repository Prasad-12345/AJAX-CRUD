<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>Document</title>
  <style>
    .company-form {
      margin: auto
    }
  </style>
</head>

<body>
  <div>
    <form style="width:25%" class="company-form" id="addForm">

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <h2 style="margin-right:50px">Company Form</h2>
      <!-- Name input -->


      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example1">Company Name</label>
        <input type="text" id="companyName" name="companyName" class="form-control" />
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company address</label>
        <input type="text" id="companyAddress" name="companyAddress" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company Landmark</label>
        <input type="text" id="companyLandmark" name="companyLandmark" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company City</label>
        <input type="text" id="companyCity" name="companyCity" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company state</label>
        <input type="text" id="companystate" name="companystate" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company pincode</label>
        <input type="text" id="pincode" name="pincode" class="form-control" />

      </div>



      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4" id="submit" value="">submit</button>
      <!-- </form>

    <form id="secondForm">
        @csrf -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">srno</th>
            <th scope="col">name</th>
            <th scope="col">address</th>
            <th scope="col">landmark</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">pincode</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </form>
  </div>

  <!-- edit model -->
  <div id="editModal">
    <form style="width:25%" class="company-form" id="editFormData">


      <h2 style="margin-right:50px">Edit Form</h2>
      <!-- Name input -->

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example1">Company id</label>
        <input type="text" id="id" name="id" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example1">Company Name</label>
        <input type="text" id="editcompanyName" name="companyName" class="form-control" />
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company address</label>
        <input type="text" id="editcompanyAddress" name="companyAddress" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company Landmark</label>
        <input type="text" id="editcompanyLandmark" name="companyLandmark" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company City</label>
        <input type="text" id="editcompanyCity" name="companyCity" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company state</label>
        <input type="text" id="editcompanystate" name="companystate" class="form-control" />

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Company pincode</label>
        <input type="text" id="editpincode" name="pincode" class="form-control" />

      </div>



      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4" value="" id="update">update</button>
    </form>

  </div>


  <!-- </div> -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      fetchCompany();

      function fetchCompany() {
        $.ajax({
          type: 'GET',
          url: '/getCompanies',

          success: function(response) {
            console.log(response.company);
            $.each(response.company, function(key, value) {
              $('tbody').append(
                '<tr>\
            <td>' + value.id + '</td>\
            <td>' + value.companyName + '</td>\
            <td>' + value.companyAddress + '</td>\
            <td>' + value.companyLandmark + '</td>\
            <td>' + value.companyCity + '</td>\
            <td>' + value.companystate + '</td>\
            <td>' + value.pincode + '</td>\
            <td> <button type="submit" class="btn btn-primary" data-idEdit="' + value.id + '" id="editBtn">edit</button> <button type="submit" class="btn btn-danger" data-id="' + value.id + '" id="deleteBtn">delete</button> </td>\
        </tr>')
            })
          },

          error: function(error) {
            console.log(error);
          },

        })
      }

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $("#submit").on('click', function(e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: '/addCompany',
          data: $('#addForm').serialize(),
          success: function(result) {
            // alert(result);
            console.log(result);
            alert("data stored")
          },

          error: function(error) {
            console.log(error);
            alert("data not saved")
          },

        })
      })

      $(".table").on('click', '#deleteBtn', function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        console.log(id);

        $.ajax({
          type: 'POST',
          url: '/delete',
          data: {
            'id': id
          },

          success: function(result) {
            console.log(result);
            alert("data deleted")
          },

          error: function(error) {
            console.log(error);
            alert("data not deleted")
          },

        })
      })


      $(document).on('click', '#editBtn', function(e) {
        e.preventDefault();
        // $('#editFormData').modal('show');
        var id = $(this).attr("data-idEdit");
        console.log(id);


        $.ajax({
          type: 'GET',
          url: '/editGet',
          data: {
            'id': id
          },

          success: function(response) {
            console.log(response);
            if (response.status == 404) {
              console.log("error");
            } else {
              $("#id").val(response.company.id);
              $("#editcompanyName").val(response.company.companyName);
              $("#editcompanyAddress").val(response.company.companyAddress);
              $("#editcompanyLandmark").val(response.company.companyLandmark);
              $("#editcompanyCity").val(response.company.companyCity);
              $("#editcompanystate").val(response.company.companystate);
              $("#editpincode").val(response.company.pincode);
              // $('#editModal').modal('show');
            }
          },

          error: function(error) {
            console.log(error);
          },

        })
      })

      $("#update").on('click', function(e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: '/editCompanyData',
          data: $('#editFormData').serialize(),

          success: function(result) {
            // alert(result);
            console.log(result);
            alert("data updated")
          },

          error: function(error) {
            console.log(error);
            alert("data not updated")
          },

        })
      })

    })
  </script>
</body>


</html>