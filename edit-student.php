<?php
include('db.php');
$db=new StudentDatabase();
$conn=$db->db_connect(); 
$id = $_GET['id']??'';
if ($id==""){
   header('Location: list-student.php');
}
$sql = "SELECT * FROM `list-student` WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $data= $result->fetch_assoc();
  $interestedsubject= json_decode($data['interestedsubject'],true);
  if( $interestedsubject==''){
    $interestedsubject = [];
    // print_r($interested_subject);
    // die;
  }
  
  //  while($row = $result->fetch_assoc()) {
      
  //   $data = $row;

    }
//}
//$intrested_subject= json_decode($data['intrestedsubject']);
//print_r($data);
//$interested_subjectArr =json_decode($data['interestedsubject'] ??'[]',true)?: [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    <form action="database.php" method="POST">
        <h2>Student Data</h2>
        <div class="form-field">
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="enter your name" value="<?php echo $data['name'];?>">
        </div>
        <div class="form-field">
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="enter your email" value="<?php echo $data['email'];?>">
        </div>
        <div class="form-field">
            <label>Gender</label>
            <input type="radio" name="gender" id="male" value="male"  <?php if($data['gender'] == 'male'){ echo 'checked';} ?>>
            <label>Male</label>
            <input type="radio" name="gender" id="female" value="female"  <?php if($data['gender'] == 'female'){ echo 'checked';} ?>>
            <label>Female</label>
        </div>
         <div class="form-field">
            <label>Contact</label>
            <input type="number" name="contact" id="contact" placeholder="enter your phone number" value="<?php echo $data['contact'];?>">
        </div>
         <div class="form-field">
            <label>Education</label>
            <textarea name="education"><?php echo $data['education'];?></textarea>
        </div>
         <div class="form-field">
            <label>Intrested-Subject</label>
            <input type="checkbox" name="interestedsubject[]" value="web development" <?php if(in_array('web development', $interestedsubject)) echo 'checked';?>>
             <label>Web Development</label>
            <input type="checkbox" name="interestedsubject[]" value="graphic design" <?php if(in_array('graphic design', $interestedsubject)) echo 'checked';?>>
             <label>Graphic Design</label>
            <input type="checkbox" name="interestedsubject[]" value="backend development" <?php if(in_array('backend development', $interestedsubject)) echo 'checked';?>>
             <label>Backend Development</label>
            <input type="checkbox" name="interestedsubject[]" value="mobile app development" <?php if(in_array('mobile app development', $interestedsubject)) echo 'checked';?>>
             <label>Mobile App Development</label>
        </div>
         <div class="form-field">
            <label>Shift</label>
            <input type="radio" name="shift" id="morning" value="morning"  <?php if($data['shift'] == 'morning'){ echo 'checked';} ?>>
            <label>Morning</label>
            <input type="radio" name="shift" id="day" value="day"  <?php if($data['shift'] == 'day'){ echo 'checked';} ?>>
            <label>Day</label>
            <input type="radio" name="shift" id="evening" value="evening"  <?php if($data['shift'] == 'evening'){ echo 'checked';} ?>>
            <label>Evening</label>
        </div>
        <div class="form-field">
            <?php
                $parent=$data['parent_id']??'';
                $sql = "SELECT *  FROM `list-parent`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
            ?>
            <select name="student_parent">
            <option value="">Select Parent</option>
            <?php while($row = $result->fetch_assoc()) {?>
                <option value="<?php echo $row['id'];?>" <?php echo $parent==$row['id']?'selected':''; ?>><?php echo $row['name'];  ?></option>
            <?php } ?>  
            </select>
          <?php } ?>
        </div>

        <input type="hidden" name="edit_student" value="1">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>

