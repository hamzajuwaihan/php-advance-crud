<?php 
include "../includes/conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM employees WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: ../index.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }
