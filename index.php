<?php include 'template/header.php' ?>

<?php 
include_once "model/conexion.php";
$sentencia = $bd -> query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      
      <!-- inicio Alerta -->
        <?php 
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta' ){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellenar todos los campos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
          }
        ?>



        <?php 
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado' ){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Se agregaron los datos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
          }
        ?>


        <?php 
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado' ){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cambiado!</strong> Se modificaron los datos con éxito.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
          }
        ?>


        <?php 
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error' ){
        ?>  
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentarlo.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
          }
        ?>


        <?php 
          if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado' ){
        ?>  
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Eliminado!</strong> Se ha eliminado.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
          }
        ?>
      <!-- Fin Alerta -->

      <div class="card">
        <div class="card-header">
          lista de personas
        </div>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>

              

              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Signo</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>

              

            </thead>
            <tbody>
              
              <?php
                foreach($persona as $dato){                
              ?>

                <tr>
                  <td scope="row"><?php echo $dato->codigo ?></td>
                  <td> <?php echo $dato->nombre ?></td>
                  <td> <?php echo $dato->edad ?></td>
                  <td><?php echo $dato->signo ?></td>
                  <td ><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td ><a onclick="return confirm('¿Estás seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-trash3-fill"></i></a></td>
                  
                </tr>

              <?php
                }
              ?>

            </tbody>
          </table>
          
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          ingresar datos:
        </div>
        <form class="p-4" action="registrar.php" method="POST">
          <div class="mb-3">
            <label class="form-label"> Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" autofocus require>
          </div>
          <div class="mb-3">
            <label class="form-label">Edad: </label>
            <input type="number" class="form-control" name="txtEdad" autofocus require>
          </div>
          <div class="mb-3">
            <label class="form-label"> Signo: </label>
            <input type="text" class="form-control" name="txtSigno" autofocus require>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- buscador -->
<div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Buscar:
        </div>
        <form class="p-4" action="index.php" method="POST">
          <div class="mb-3">            
            <input type="text" class="form-control" name="buscar" autofocus require>
            <input type="submit" class="btn btn-primary mt-3" value="Buscar">
          </div>          
        </form>
      </div>
    </div> 

    <!-- mostar resultados -->  
    <div class="col-md-7 mb-5">
    <div class="card">
        <div class="card-header">
          Resultados
        </div>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>             

              <tr>                
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Signo</th>                
              </tr>              

            </thead>
            <tbody>
              
              <?php
                include 'buscar.php';

                while($row = mysqli_fetch_array($sql_query)){                
              ?>

                <tr>                 
                  <td> <?= $row['nombre'] ?></td>
                  <td> <?= $row['edad'] ?></td>
                  <td> <?= $row['signo'] ?></td> 
                </tr>
              <?php
                }
              ?>

            </tbody>
          </table>
          
        </div>
      </div>
  </div>
<!-- fin mostrar resultados --> 
  </div>
</div>



<!-- fin buscador -->
<!-- <?php include 'template/footer.php' ?> -->

