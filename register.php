<?php
include('./connect.php');
//echo $_POST['name'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];
$name = $_POST['name'];
$name = $_POST['name'];

if ($password == $cpassword) {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $Insert = mysqli_query($connection,
"INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name','$mobile','$password','$address','$image','$role','0','0')");
if($Insert){
    echo '<script>
    alert("Resistration Successfull!");
    window.location="../";  </script>';
}else{
    echo '<script>
    alert("Some error occured");
    window.location="../routes/register.html";  </script>';
}
} else {
    echo '<script>
  alert("Password conform passowrd dont match");
  window.location="../routes/register.html";  </script>';
}
