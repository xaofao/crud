<?php
include ("../header.php") ;
$conn = $db->db_connect();//function call
?>
    <h2> user data</h2>
        <button class="btn"><a href="add-user.php">Add User</a></button>
    <table border='2'>
<?php
    $sql = "SELECT *  FROM `user`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>username</th>
            <th> password</th>
            <th>Profile Image</th>
            <th> Action</th>
        </tr>

    <?php while($row = $result->fetch_assoc()) {  ?>
        <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                   
                    <td><?php echo $row['username'];?></td>
                   <td><?php echo $row['password'];?></td>

                   <td><img src="http://localhost/management/<?= $row['profile_image'] ?>" width="100">
                     </td>
                    <td>
                        <button><a href="../database.php?id=<?php echo $row['id'];?>&action=user_delete">delete</a></button>
                        <button><a href="edit-user.php?id=<?php echo $row['id'];?>">update</a></button>
                    </td>
        </tr>
 <?php }?>
 <?php
     } else {
    echo "0 results";
}
    ?>
    </table>
<?php include("../footer.php");?>