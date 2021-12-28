<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form id="form" method="post">
        <table border="2" align="center">
            <tr>
                <td>name</td>
                <td><input type="text" id="name" name="name"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>address</td>
                <td><textarea name="address" id="address" cols="15" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>contact</td>
                <td><input type="text" id="contact" name="contact"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="button" id="btn" name="btn" value="submit"></td>
            </tr>

        </table>
    </form>
    <script>
        $(document).ready(function(e) {
            $("#btn").on("click", function() {
                $("#butsave").attr("disabled", "disabled");
                var name = $('#name').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var contact = $('#contact').val();

                if(name!="" && email!="" && address!="" && contact!="")
                $.ajax({
                    url: "insert-save.php",
                    method: "POST",
                    data: {
                        name: name,
                        email: email,
                        address: address,
                        contact: contact
                    },
                    success: function(data) {
                        $("#btn").removeAttr("disabled","disabled" );
                    }
                });
                else{
                    alert('Please fill all the field !');
                }
            });
        });
    </script>

</body>

</html>