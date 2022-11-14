<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <button type="submit" id="cricket" name="cricket">Cricket</button>
        </div>
        <div>
            <button type="submit" id="Football" name="Football">Football</button>
        </div>
        <div>
            <button type="submit" id="chess" name="chess">chess</button>
        </div>
        <div>
            <button type="submit" id="kabaddi" name="kabaddi">kabaddi</button>
        </div>
        <div>
            <button type="submit" id="Hocky" name="Hocky">Hocky</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#cricket").on('click', function(){
                alert("cricket")
            })

            $("#Football").on('click', function(){
                alert("Football")
            })

            $("#chess").on('click', function(){
                alert("chess")
            })

            $("#kabaddi").on('click', function(){
                alert("kabaddi")
            })

            $("#Hocky").on('click', function(){
                alert("Hocky")
            })
        })
    </script>
</body>

</html>