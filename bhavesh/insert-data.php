<?php
$conn = new mysqli("localhost", "root", "", "crud") or die("connection fail");

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact = $_POST['contact'];

$sql = "INSERT INTO data(name,email,address,contact) VALUES('$name','$email','$address','$contact')" or die("sql error");
$view = mysqli_query($conn, $sql);
if($view){
    echo "insert success";
}
else{
    echo "error!!";
}
?>