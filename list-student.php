<?php

include ('header.php');
$conn = $db->db_connect();//function call

?>
    <h2>student data</h2>
    <button><a href="add-student.php">Add Student</a></button>
    <div class="logout"><a href="logout.php">logout</a></div>
    <table border='2'>
<?php
    $sql = "SELECT s.*, p.name as parent_name FROM `list-student` as s INNER JOIN `list-parent` as p where s.parent_id=p.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Education</th>
            <th>Interested subject</th>
            <th>Shift</th>
            <th>Parent</th>
            <th> PFP Image</th>
            <th>Action</th>
            
        </tr>

    <?php while($row = $result->fetch_assoc()) {  ?>
        <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['gender'];?></td> 
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['education'];?></td>
                    <td><?php echo $row['interestedsubject'];?></td>
                    <td><?php echo $row['shift'];?></td>
                     <td><?php echo $row['parent_name'];?></td>
                     <td><img src="<?php echo $site_url.'uploads/'.$row['pfp_image'];?>" width ="100"> </td>
                    <td>
                        <button><a href="database.php?id=<?php echo $row['id'];?>&action=delete&type=student">delete</a></button>
                        <button><a href="edit-student.php?id=<?php echo $row['id'];?>">update</a></button>
                    </td>
        </tr>
 <?php }?>
 <?php
     } else {
    echo "0 results";
}
    ?>
    </table>
    <?php include('footer.php'); ?>
