<!-- --><?php
include('db.php');//file include
$db = new StudentDatabase();//class call

$is_loggedin=$db->check_login_status();
if(!$is_loggedin){
    header("Location:login.php");
    exit();
}
$site_url='http://localhost/management/'; // Define the site URL


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $site_url;?>styly.css">
</head>
<body>
     <div class="container">
        <div class="dashboard-wrap">
            <div class="menu">
               <ul>
                    <li class="menu-item"><a href="<?php echo $site_url;?>dashboard.php"> dashboard</a> </li>
                    <li class="menu-item"><a href="<?php echo $site_url;?>list-student.php"> list student</a></li>
                    <li class="menu-item"><a href="<?php echo $site_url;?>parents/list-parent.php"> list parents</a></li>
                    <li class="menu-item"><a href="<?php echo $site_url;?>user/list-user.php"> list admin</a></li>
                    <li class="menu-item"><a href="<?php echo $site_url;?>logout.php"> logout</a></li>
                </ul>
            </div>
            <div class="front">
                <?php if($is_loggedin){?>
                    <div class="welcome"> WELCOME <?php echo $_SESSION['name'];?></div>
               </div>
            <?php } ?>
            </div>
        </div>
