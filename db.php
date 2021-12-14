<?php
session_start();

$conn = mysqli_connect(
  'scabrera-db',
  'root',
  'root',
  'productos'
) or die(mysqli_error($conn));

?>
