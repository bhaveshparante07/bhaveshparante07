<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                    url: "list-data-load.php",
                    type: "POST",
                    success: function(view){
                        $("#table-data").html(view);
                    }
                });
        });
        
    </script>
    </body>
</head>

<body>

    <!-- <button type="button" id="submit" name="submit">submit</button> -->
    <br>
    <h2><a href="insert.php">insert</a></h2>
    <div id="table-data"></div>
    
    
    <!-- <p>hide detals</p> -->



</html>