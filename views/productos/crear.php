<?php

include('../../conexion/configuration.php');
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');

$consulta = "SELECT * FROM categoria";
$resultado =  mysqli_query($conexion, $consulta);
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
              <i class="material-icons">add</i>
            </div>
          </div>
          <div class="card-body">
            <h3>Guardar un nuevo producto</h3>
            <form action="../../requests/productos/insert.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre">Nombre:</label>
                  <input class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group col-md-6">
                  <label for="descripcion">Descripción:</label>
                  <input class="form-control" type="text" name="descripcion">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="categoria">Categoría</label>
                  <select class="form-control" name="categoria">
                    <option value="">Selecciona una categoría...</option>
                    <?php
                    while ($categoria = mysqli_fetch_assoc($resultado)) {
                      echo "<option value='{$categoria['id']}'>{$categoria['nombre']}</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label for="precio">Precio:</label>
                  <input class="form-control" type="text" name="precio">
                </div>
                <div class="form-group col-md-2">
                  <label for="precio">Stock:</label>
                  <input class="form-control" type="number" name="stock" placeholder="stock">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('../../layout/footer.php');
?>