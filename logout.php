<?php 
include('connect.php');
// header('../index.html');
session_destroy();
echo '<script>
 window.location="../";  </script>';

?>