<?php
$conn = new mysqli("localhost","root","","crud") or die("connection fail") ;

$id = $_GET['upid'];
// echo $id;
$sql = "select * from data where id = $id";
$result = mysqli_query($conn, $sql) or die("query fail");
$row = $result->fetch_object();

$u_id = $row->id;
$name = $row->name;
$email = $row->email;
$add = $row->address;
$con = $row->contact;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form id="form" method="post">
        <table border="2" align="center">
            <tr>
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                <td>name</td>
                <td><input type="text" id="name" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td>address</td>
                <td><textarea name="address" id="address" cols="15" rows="5"><?php echo $add;?></textarea></td>
            </tr>
            <tr>
                <td>contact</td>
                <td><input type="text" id="contact" name="contact" value="<?php echo $con; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="button" id="btn" name="btn" value="submit"></td>
            </tr>
        </table>
    </form>

    <script>
        $(document).ready(function(e) {
            $("#btn").on("click", function() {
                $("#btn").attr("disabled", "disabled");
                var id = $('#id').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var contact = $('#contact').val();

                if(name!="" && email!="" && address!="" && contact!="")
                $.ajax({
                    url: "update-load-data.php",
                    method: "POST",
                    data: {
                        id: id,
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