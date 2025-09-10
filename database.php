<?php
include('db.php');//link file
$db = new StudentDatabase();//class call
$conn = $db->db_connect();//function call


// print_r($_POST);


if(isset($_POST['add_student'])){
  $name=$_POST['name']??'';
  $email=$_POST['email']??'';
  $gender=$_POST['gender']??'';
  $contact=$_POST['contact']??'';
  $education=$_POST['education']??'';
  $interestedsubject=$_POST['interestedsubject']??'';
  $interestedsubject=json_encode($interestedsubject);
  $shift=$_POST['shift']??'';
  $parent_id=$_POST['student_parent']??'';

  // File handling
    $fileName     = $_FILES['pfp_image']['name'];
    $fileTmpName  = $_FILES['pfp_image']['tmp_name'];
    $fileSize     = $_FILES['pfp_image']['size'];
    $fileError    = $_FILES['pfp_image']['error'];
    $fileExt      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $uploadPath = '';
    $allowedExt = ['jpg', 'jpeg', 'png' ,'pdf'];

    if (in_array($fileExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < 2 * 1024 * 1024) { // 2MB limit
                $newFileName = uniqid('', true) . '.' . $fileExt;
                $uploadPath = 'pfp/' . $newFileName;

                move_uploaded_file($fileTmpName, $uploadPath);

            } else {
                echo "File too large.";
                die;
            }
        } else {
            echo "File error.";
            die;
        }
    } else {
        echo "Invalid file type.";
        die;
    }


  $sql = "INSERT INTO `list-student` (`name`, `email`, `gender`, `contact`, `education`, `interestedsubject`,`shift`,`parent_id`,`pfp_image` )
  VALUES ('$name','$email','$gender','$contact','$education','$interestedsubject','$shift',$parent_id , '$uploadPath')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: list-student.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


if(isset($_POST['edit_student'])){
  $name=$_POST['name']??'';
  $email=$_POST['email']??'';
  $gender=$_POST['gender']??'';
  $contact=$_POST['contact']??'';
  $education=$_POST['education']??'';
  $interestedsubjectArr=$_POST['interestedsubject']??[];
  $interestedsubject =json_encode($interestedsubjectArr);
  $shift=$_POST['shift']??'';
  $id=$_POST['id'];
   $parent_id=$_POST['student_parent']??'';

    $sql = "UPDATE `list-student` SET `name`='$name',email='$email',gender='$gender',contact='$contact',education='$education',interestedsubject='$interestedsubject',shift='$shift',parent_id=$parent_id WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    // Remove the echo below, or place it after redirection if needed
    header('Location: list-student.php');
    exit; // Always use exit after header redirection
  } else {
    echo "Error updating record: " . $conn->error;
  }

}

if(isset($_GET['action']) && $_GET['action']=='delete'){
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
}
if(isset($_POST['login'])){
  $username=$_POST['username']??'';
  $password=$_POST['password']??'';
  $sql = "SELECT * FROM `user` WHERE username='$username' AND `password`='$password'";
  $result = $conn->query($sql);
  $data=$result->fetch_assoc();
  if($data){
    session_start();
    // print_r($data);
    $_SESSION['sms_login'] = 1;
    $_SESSION['name']=$data['name'];
    header("Location: list-student.php");
    exit;
  }
  else{
echo("incorrect id and password");
  }
}
    // File handling
    $fileName     = $_FILES['profile_image']['name'];
    $fileTmpName  = $_FILES['profile_image']['tmp_name'];
    $fileSize     = $_FILES['profile_image']['size'];
    $fileError    = $_FILES['profile_image']['error'];
    $fileExt      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $uploadPath = '';
    $allowedExt = ['jpg', 'jpeg', 'png'];

    if (in_array($fileExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < 2 * 1024 * 1024) { // 5MB limit
                $newFileName = uniqid('', true) . '.' . $fileExt;
                $uploadPath = 'uploads/' . $newFileName;

                move_uploaded_file($fileTmpName, $uploadPath);

            } else {
                echo "File too large.";
                die;
            }
        } else {
            echo "File error.";
            die;
        }
    } else {
        echo "Invalid file type.";
        die;
    }

 
  $sql = "INSERT INTO `user` (`name`, `email`, `username`,`password`,`profile_image`)
  VALUES ('$name','$email','$username','$password','$uploadPath')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: user/list-user.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


if(isset($_GET['action']) && $_GET['action']=='user_delete'){


  $id =$_GET['id']??'';
  // sql to delete a record
  $sql = "DELETE FROM `user` WHERE id=$id";

die;
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: user/list-user.php");
    exit();
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}
//database of edit-user.php
if (isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $id=$_POST['id']??'';
    $existingImage = $_POST['existing_profile_image'] ?? '';  // Add this hidden input in the form
    
    $profileImageToSave = $existingImage;  // Default is existing image

    // Handle profile image upload if a new file is provided
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $fileName     = $_FILES['profile_image']['name'];
        $fileTmpName  = $_FILES['profile_image']['tmp_name'];
        $fileSize     = $_FILES['profile_image']['size'];
        $fileExt      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt   = ['jpg', 'jpeg', 'png'];

        if (in_array($fileExt, $allowedExt) && $fileSize < 2 * 1024 * 1024) {
            $newFileName = uniqid('', true) . '.' . $fileExt;
            $uploadPath = 'uploads/' . $newFileName;

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Delete old image file if exists
                if (!empty($existingImage) && file_exists($existingImage)) {
                    unlink($existingImage);
                }

                $profileImageToSave = $uploadPath;
            } else {
                echo "Failed to upload the new profile image.";
                exit;
            }
        } else {
            echo "Invalid file type or file too large (must be < 2MB).";
            exit;
        }
    }

    // Now update the database
    $sql = "UPDATE `user` SET 
                `name`='$name',
                `email`='$email',
                `username`='$username',
                `password`='$password',
                `profile_image`='$profileImageToSave'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: user/list-user.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>