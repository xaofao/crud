<?php
include('../db.php');
$db=new StudentDatabase();
$conn=$db->db_connect(); 
$id = $_GET['id']??'';
if ($id==""){
   header('Location: list-parent.php');
}
$sql = "SELECT * FROM `list-parent` WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $data= $result->fetch_assoc();
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
 <div class="form-field">
   <form action="database.php" method="POST">

        <input type="text" name="name" placeholder="name"value="<?php echo $data['name'];?>">
        </div>
       
        <div class="form-field">
        <input type="email" name="email" placeholder="email" value="<?php echo $data['email'];?>">
        </div>
         <div class="form-field">
        <input type="number" name="contact" placeholder="contact" value="<?php echo $data['contact'];?>">
        </div>
        <input type="hidden" name="edit_parent" value="1">
        <input type="hidden" name="id" value="<?php echo $id?>">

<div>
        <input type="submit" value="submit">
    </div>
    </form>
</body>
</html>