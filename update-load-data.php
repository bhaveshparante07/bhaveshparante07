<?php
$conn = new mysqli("localhost", "root", "", "crud") or die("connection fail");

// echo "<pre>";
// print_r($_POST);
// die;
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact = $_POST['contact'];

$sql = "UPDATE data set name = '$name',email = '$email',address = '$address',contact = '$contact' where id ='$id'" or die("sql error");
$view = mysqli_query($conn, $sql);

if($view){
    echo "update success";
}
else{
    echo "error!!";
}
?>