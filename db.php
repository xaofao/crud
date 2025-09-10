<?php
class StudentDatabase{
public function db_connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_management_system";


    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 return $conn;

    }
    public function check_login_status(){
      session_start();
  if(isset($_SESSION['sms_login'])){
    return true;
  }
  else
    return false;
  }

}
    ?>