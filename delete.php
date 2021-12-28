<?php
$conn = new mysqli("localhost", "root", "", "crud") or die("connection fail");

$id = $_GET['dlid'];

$sql = "delete from data where id='$id'" or die("sql error");
$view = mysqli_query($conn, $sql);

if($view){
    echo "delate success";
    header("location: http://localhost/code/javscript_crud/list.php");
}
else{
    echo "error!!";
}

?>