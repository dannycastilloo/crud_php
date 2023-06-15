<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="save_paciente.php" method="POST">
          <div class="form-group">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nombres" class="form-control" placeholder="Nombres" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sexo" class="form-control" placeholder="Sexo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad" autofocus>
          </div>
          <div class="form-group">
            <input type="file" name="foto" class="form-control" autofocus>
          </div>
          <input type="submit" name="save_paciente" class="btn btn-success btn-block" value="Guardar Paciente">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Sexo</th>
            <th>Especialidad</th>
            <th>Foto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM paciente";
          $result_pacientes = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_pacientes)) { ?>
          <tr>
            <td><?php echo $row['apellidos']; ?></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td><?php echo $row['especialidad']; ?></td>
            <td><?php echo $row['foto']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_paciente.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
