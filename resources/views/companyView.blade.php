
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <form>
        @csrf
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
    <!-- $i = 0 -->
    @php
$i = 0
@endphp
    @foreach($companies as $company)
  <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->companyName }}</td>
            <td>{{ $company->companyAddress }}</td>
            <td>{{ $company->companyLandmark }}</td>
            <td>{{ $company->companyCity }}</td>
            <td>{{ $company->companystate }}</td>
            <td>{{ $company->pincode }}</td>
            <td>
                <!-- <form action="{{ route('edit',['id'=> $company->id])}}" method="GET">
                    <button type="button" class="btn btn-primary">edit</button>
                </form> -->

                <a title="Edit">edit</a>
                <button type="button" class="btn btn-danger">delete</button>
            </td>
        </tr>
        @endforeach
  </tbody>
</table>
</form>

</body>

<!-- <script type="text/javascript">
  $(document).ready(function(){

  }) -->

</script>

</html>