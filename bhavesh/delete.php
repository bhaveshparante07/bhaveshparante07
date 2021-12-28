<?php
$conn = new mysqli("localhost","root","","crud");

$id = $_GET['dlid']; 
$sql = "delete from data where id='$id'";
$result = mysqli_query($conn, $sql);

if($result){
    header("location: index.php");
}
?>