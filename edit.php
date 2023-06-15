<?php
include("db.php");
$apellidos = '';
$nombres= '';
$sexo= '';
$especialidad= '';
$foto= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM paciente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $apellidos = $row['apellidos'];
    $nombres = $row['nombres'];
    $sexo = $row['sexo'];
    $especialidad = $row['especialidad'];
    $foto = $row['foto'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $apellidos= $_POST['apellidos'];
  $nombres = $_POST['nombres'];
  $sexo = $_POST['sexo'];
  $especialidad = $_POST['especialidad'];
  $foto = $_POST['foto'];

  $query = "UPDATE paciente set apellidos = '$apellidos', nombres = '$nombres', sexo = '$sexo', especialidad = '$especialidad', foto = '$foto' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Paciente Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos; ?>">
        </div>
        <div class="form-group">
          <input name="nombres" type="text" class="form-control" value="<?php echo $nombres; ?>">
        </div>
        <div class="form-group">
          <input name="sexo" type="text" class="form-control" value="<?php echo $sexo; ?>">
        </div>
        <div class="form-group">
          <input name="especialidad" type="text" class="form-control" value="<?php echo $especialidad; ?>">
        </div>
        <div class="form-group">
          <input name="foto" type="text" class="form-control" value="<?php echo $foto; ?>">
        </div>
        <button class="btn-success" name="update">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>