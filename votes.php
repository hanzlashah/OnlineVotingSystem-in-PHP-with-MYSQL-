<?php
include('../api/connect.php');
$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];
$update_votes = mysqli_query($connection, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");
$update_user_status = mysqli_query($connection, "UPDATE user SET status=1 WHERE id='$uid'");
// UPDATE `user` SET `id`='[value-1]',`name`='[value-2]',`mobile`='[value-3]',`password`='[value-4]',`address`='[value-5]',`photo`='[value-6]',`role`='[value-7]',`status`='[value-8]',`votes`='[value-9]' WHERE 1
if ($update_votes && $update_user_status) {
    $group=mysqli_query($connection,"SELECT * FROM user WHERE role=2");
    $groupdata=mysqli_fetch_all($group,MYSQLI_ASSOC);
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata'] = $groupdata;
    echo '<script>
    alert("Voting Successfully");
    window.location="../routes/dashboard.php";  </script>';
    
} else {
    echo '<script>
  alert("Something Error Occured");
  window.location="../routes/dashboard.php";  </script>';
}
