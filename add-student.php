<?php

include('db.php');//file include
$db = new StudentDatabase();//class call
$conn = $db->db_connect();//function call
$is_loggedin=$db->check_login_status();
if(!$is_loggedin){
    header("Location:login.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="database.php" method="POST" enctype="multipart/form-data">
        <h2>Student Data</h2>
        <div class="form-field">
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="enter your name">
        </div>
        <div class="form-field">
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="enter your email">
        </div>
        <div class="form-field">
            <label>Gender</label>
            <input type="radio" name="gender" id="male" value="male">
            <label>Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label>Female</label>
        </div>
         <div class="form-field">
            <label>Contact</label>
            <input type="number" name="contact" id="contact" placeholder="enter your phone nnumber">
        </div>
         <div class="form-field">
            <label>Education</label>
            <textarea name="education"></textarea>
        </div>
         <div class="form-field">
            <label>Interested-Subject</label>
            </label>
            <input type="checkbox" name="interestedsubject[]" value="web development">
             <label>Web Development</label>
            <input type="checkbox" name="interestedsubject[]" value="graphic design">
             <label>Graphic Design</label>
            <input type="checkbox" name="interestedsubject[]" value="backend development">
             <label>Backend Development</label>
            <input type="checkbox" name="interestedsubject[]" value="mobile app development">
             <label>Mobile App Development</label>
        </div>
         <div class="form-field">
            <label>Shift</label>
            <input type="radio" name="shift" id="morning" value="morning">
            <label>Morning</label>
            <input type="radio" name="shift" id="day" value="day">
            <label>Day</label>
            <input type="radio" name="shift" id="evening" value="evening">
            <label>Evening</label>
        </div>
        <div class="form-field">
        <?php
            $sql = "SELECT *  FROM `list-parent`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
        ?>
            <select name="student_parent">
            <option value="">Select Parent</option>
            <?php while($row = $result->fetch_assoc()) {
                 ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
            <?php } ?>  
            </select>
          <?php } ?>
        </div>
        <div class="form-field">
            <label for=""> Profile Image</label>
            <input type="file" name="pfp_image" >
        </div>
        <input type="hidden" name="add_student" value="1">
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>