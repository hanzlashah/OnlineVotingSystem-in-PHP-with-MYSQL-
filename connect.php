<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'voting') or die('connection failed');

if ($connection) {
  //  echo "Connected";
} else {
    echo "Not Connected";
}
