<?php
include('db.php');
if (isset($_SESSION['name'])&&isset($_SESSION['email'])) {	
$mq = "SELECT `id` from `stu_chats` where `id`= (SELECT  max(id) from `kaburulu`)";
$mr = mysqli_fetch_array(mysqli_query($db,$mq));
 echo $mr['id'];
}
?>