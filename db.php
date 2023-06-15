<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'soluciones_nube'
) or die(mysqli_erro($mysqli));

?>
