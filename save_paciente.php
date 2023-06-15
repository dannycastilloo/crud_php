<?php

include('db.php');

if (isset($_POST['save_paciente'])) {
  $apellidos = $_POST['apellidos'];
  $nombres = $_POST['nombres'];
  $sexo = $_POST['sexo'];
  $especialidad = $_POST['especialidad'];
  $foto = $_POST['foto'];
  $query = "INSERT INTO paciente(apellidos,nombres,sexo,especialidad,foto) VALUES ('$apellidos', '$nombres','$sexo','$especialidad','$foto')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Paciente Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>


