<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <form style="width:25%" class="company-form"  id="editFormData">
            
           
            <h2 style="margin-right:50px">Company Form</h2>
            <!-- Name input -->

            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example1">Company Name</label>
                <input type="text" id="companyName" name="companyName" value = {{ $company->companyName }} class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example2">Company address</label>
                <input type="text" id="companyAddress" name="companyAddress" value = {{ $company->companyAddress }} class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example2">Company Landmark</label>
                <input type="text" id="companyLandmark" name="companyLandmark" value = {{ $company->companyAddress }} class="form-control" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example2">Company City</label>
                <input type="text" id="companyCity" name="companyCity"  value = {{ $company->companyAddress }} class="form-control" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example2">Company state</label>
                <input type="text" id="companyState" name="companyState" value = {{ $company->companyAddress }} class="form-control" />

            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form5Example2">Company pincode</label>
                <input type="text" id="pincode" name="pincode"  value = {{ $company->companyAddress }} class="form-control" />

            </div>



            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="" id="update">update</button>
        </form>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#update").on('click', function(e) {
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
          type: 'POST',
          url: '/editCompanyData',
          

          // data: JSON.stringify(myData),
          data: $('#editFormData').serialize(),
          
          success: function(result) {
            // alert(result);
            console.log(result);
            alert("data stored")
          },

          error: function(error){
              console.log(error);
              alert("data not saved")
          },
          
        })
      })
        })
        
    </script>
</body>

</html>