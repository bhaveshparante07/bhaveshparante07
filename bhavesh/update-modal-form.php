<?php

include "database.php";

$id = $_POST['id'];

try {

  //connect with the server
  $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

  $sqllogin = "select * from data where id = '$id'";
  $stmtlogin = $conn->prepare($sqllogin);
  $stmtlogin->execute();
  $data2 = $stmtlogin->fetch();

  echo json_encode($data2);
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
