<?php
include("../db.php");
$db=new StudentDatabase();
$conn=$db->db_connect();
$id=$_GET['id']??'';
if($id==""){
    header('location:list-user.php');
}
$sql = "SELECT * FROM `user` WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $data = $result->fetch_assoc();
   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="../database.php" method="POST" enctype="multipart/form-data">
        <h2> Edit User</h2>
        <div class="form-field
    <h2> Parents Data</h2>
        <div class="form-field">
        <input type="text" name="name" placeholder="name" value="<?php echo $data['name'];?>">
        </div>
       
        <div class="form-field">
        <input type="email" name="email" placeholder="email" value="<?php echo $data['email'];?>">
        </div>
         <div class="form-field">
        <input type="text" name="username" placeholder="username" value="<?php echo $data['username'];?>">
        </div>
        <div class="form-field">
            <input type="password" name="password" placeholder="password" >
        </div>
        <div class="form-field">
        <label for="profile_image">Profile Image</label><br>
        <?php if (!empty($data['profile_image'])): ?>
            <img src="<?php echo htmlspecialchars($site_url . $data['profile_image']); ?>" alt="Profile Image" width="100">
       
        <?php endif; ?>
        <input type="file" name="profile_image" id="profile_image">
    </div>
        <input type="hidden" name="edit_user" value="1">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit"  value="Submit">
        
    </form>
  </body>
</html>


