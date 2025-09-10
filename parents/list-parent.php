<?php
include ('../header.php');
$conn = $db->db_connect();//function call

?>
    <h2>Parent data</h2>
    <button class="btn"><a href="add-parent.php">Add Student</a></button>
    <table border='2'>
<?php
    $sql = "SELECT *  FROM `list-parent`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th> Action</th>
        </tr>

    <?php while($row = $result->fetch_assoc()) {  ?>
        <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                   
                    <td><?php echo $row['contact'];?></td>
                  
                    <td>
                        <button><a href="database.php?id=<?php echo $row['id'];?>&action=delete">delete</a></button>
                        <button><a href="edit-parent.php?id=<?php echo $row['id'];?>">update</a></button>
                    </td>
        </tr>
 <?php }?>
 <?php
     } else {
    echo "0 results";
}
    ?>
    </table>
<?php include('../footer.php'); ?>