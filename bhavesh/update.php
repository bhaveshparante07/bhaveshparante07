<?php
include "database.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$contact = $_POST['contact'];


try{
 //connect with the server
 $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
 $sql = "UPDATE data set name = '$name', email = '$email', address = '$address', contact = '$contact' where id = $id";
 $stmt = $conn->prepare($sql);
 $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";

}catch(PDOException $e){
echo $sql . "<br>" . $e->getMessage();
}
?>