<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id =$_GET['id']??'';
// sql to delete a record
$sql = "DELETE FROM `list-student` WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: list-student.php");
  exit();
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>