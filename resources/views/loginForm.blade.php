<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                                    <form class="mx-1 mx-md-4" id="loginForm">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control" />
                                                <div id="emailList">

                                                </div>
                                                <div><label class="form-label" for="form3Example3c">Your Email</label></div>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" name="password" class="form-control" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=1 id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg" id="login">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#email').keyup(function() {
                var query = $(this).val();

                $.ajax({
                    url: "/autocomplete",
                    method: "POST",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        $('#emailList').fadeIn();
                        $('#emailList').html(data);
                    }
                });

            });

            $(document).on('click', 'li', function() {
                $('#email').val($(this).text());
                var email = $("#email").val();
                $('#emailList').fadeOut();
                $.ajax({
                    type: 'GET',
                    url: '/getPassword',
                    data: {
                        'email': email
                    },
                    success: function(data) {
                        console.log(data);
                        $('#password').val(data);
                    }
                })
            });

            $("#login").on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '/login',
                    data: $("#loginForm").serialize(),
                    success: function() {
                        alert("logged In")
                    },
                    error: function() {
                        alert("invalid data")
                    }

                })
            })
        })
    </script>
</body>

</html>