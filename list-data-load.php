<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "crud";

$conn = mysqli_connect("$server", "$user", "$pass", "$db") or die("conection fail");

$sql = "select * from data";
$result = mysqli_query($conn, $sql) or die("query fail");

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '
    <table border="2">
    <tr>
    <th>id</th><th>name</th><th>email</th><th>address</th><th>contact</th><th>update</th><th>delate</th>
    </tr> 
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>{$row["id"]}</dh><td>{$row["name"]}</td><td>{$row["email"]}</td><td>{$row["address"]}</td><td>{$row["contact"]}</td><td><a href='http://localhost/code/javscript_crud/update.php?upid={$row['id']}'>edit</a></td>
        <td><a href='http://localhost/code/javscript_crud/delete.php?dlid={$row['id']}'>delate</a></td>
        </tr>";
        
    }
    $output .= '</table>';

    mysqli_close($conn);

    echo $output;
}
else{
    echo "record not found";
}
?>

