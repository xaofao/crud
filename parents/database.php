<?php
include('../db.php');
$db = new StudentDatabase();
$conn = $db->db_connect();//function call
print_r($_POST);


if(isset($_POST['add_parent'])){
  $name=$_POST['name']??'';
  $email=$_POST['email']??'';
  
  $contact=$_POST['contact']??'';
  $sql = "INSERT INTO `list-parent` (`name`, `email`, `contact`)
  VALUES ('$name','$email','$contact')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: list-parent.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if(isset($_POST['edit_parent'])){
  $name=$_POST['name']??'';
  $email=$_POST['email']??'';

  $contact=$_POST['contact']??'';
  $id=$_POST['id'];

    $sql = "UPDATE `list-parent` SET `name`='$name',email='$email',contact='$contact' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    // Remove the echo below, or place it after redirection if needed
    header('Location: list-parent.php');
    exit; // Always use exit after header redirection
  } else {
    echo "Error updating record: " . $conn->error;
  }

}

if(isset($_GET['action']) && $_GET['action']=='delete'){
  $id =$_GET['id']??'';
  // sql to delete a record
  $sql = "DELETE FROM `list-parent` WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: list-parent.php");
    exit();
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}






