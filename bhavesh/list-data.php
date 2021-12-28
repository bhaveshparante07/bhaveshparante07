<?php
include "database.php";

$conn = mysqli_connect("$server", "$user", "$pass", "$db") or die("conection fail");

$sql = "select * from data";
$result = mysqli_query($conn, $sql) or die("query fail");

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">contact</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$row["id"]}</td>
        <td>{$row["name"]}</td>
        <td>{$row["email"]}</td>
        <td>{$row["address"]}</td>
        <td>{$row["contact"]}</td>
        <td><button  class='mybtn' data-id='{$row['id']}'>edit</button></td>
        <td><a href='delete.php?dlid={$row['id']}'>delate</a></td>
        </tr>";

        // <td><a href='update-modal-form.php?up={$row['id']}'>update</a></td>
    }
    $output .= '</table>';

    mysqli_close($conn);

    echo $output;
} else {
    echo "record not found";
}
?>

<script>
    $(document).ready(function() {
        $(".mybtn").click(function() {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "update-modal-form.php",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(result) {

                    var data = jQuery.parseJSON(result);
                    // console.log(data.name);
                    $("#modal-id").val(data.id);
                    $("#modal-name").val(data.name);
                    $("#modal-email").val(data.email);
                    $("#modal-address").val(data.address);
                    $("#modal-contact").val(data.contact);
                }
            })
            $("#update_modal").modal('show');
        });

    });
    // });
</script>

<div class="modal fade" id="update_modal" class=".update-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <form>
                    <input type="hidden" id="modal-id" name="id" value="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="modal-name" aria-describedby="emailHelp" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input type="text" class="form-control" id="modal-email" aria-describedby="emailHelp" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">address</label>
                        <input type="text" class="form-control" id="modal-address" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">contact</label>
                        <input type="text" class="form-control" id="modal-contact" value="">
                    </div>
                    <button type="button" id="update-button" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#update-button").on("click",function() {
            var id = $("#modal-id").val();
            var name = $("#modal-name").val();
            var email = $("#modal-email").val();
            var address = $("#modal-address").val();
            var contact = $("#modal-contact").val();

            $.ajax({
                url: "update.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    email: email,
                    address: address,
                    contact: contact
                },
                success: function(result) {
                     console.log(result);
                }
            })
        });
    });
</script>