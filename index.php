<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">

      <div class="modal fade" id="newproduct" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="save_task.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Producto" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripción del producto"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar producto">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="updateproduct" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Actualizar producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="POST">
                        <input id="prodId" name="prodId" type="hidden">
                        <div class="mb-3">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Producto" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea id="description" name="description" rows="2" class="form-control" placeholder="Descripción del producto"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar producto">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
    <div class="col-md-12">
    <h1>Lista de Productos</h1>
    <div class="container p-3"><a class="btn btn-primary" data-bs-toggle="modal" href="#newproduct" role="button">Agregar producto</a></div>
      <table class="table table-info table-striped">
        <thead class="table-info table-striped">
          <tr class="table-info">
            <th>Producto</th>
            <th>Descripción</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="#updateproduct" data-bs-toggle="modal" class="btn btn-warning" role="button" onclick="editar(<?php echo $row['id']?>,'<?php echo $row['title']?>','<?php echo $row['description']?>')">
                Editar
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                Eliminar
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<script>
    function editar(id, title,description) {
      document.getElementById("prodId").value = id
      document.getElementById("title").value = title
      document.getElementById("description").value = description
    }
</script>

<?php include('includes/footer.php'); ?>