<?php

include ('../header.php');
$conn = $db->db_connect();//function call

?>
    <form action="../database.php" method="POST" enctype="multipart/form-data">
    <h2> Sign Up</h2>
        <div class="form-field">
        <input type="text" name="name" placeholder="name">
        </div>
       
        <div class="form-field">
        <input type="email" name="email" placeholder="email">
        </div>
         <div class="form-field">
        <input type="text" name="username" placeholder="username">
        </div>
        <div class="form-field">
            <input type="password" name="password" placeholder="password">
        </div>
        <div class="form-field">
            <label for=""> Profile Image</label>
            <input type="file" name="profile_image">
        </div>
        <input type="hidden" name="add_user" value="1">
        <input type="hidden" name="existing_profile_image" value="<?= $row['profile_image'] ?>">

        <input type="submit" value="add-user">
    </form>
    <?php include('../footer.php'); ?>
