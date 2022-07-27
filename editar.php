<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET["codigo"])){
        header('location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET["codigo"];

    $sentencia = $bd -> prepare('select * from persona where codigo = ?;');
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);    
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                ingresar datos:
                </div>
                <form class="p-4" action="editarProceso.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label"> Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" require value="<?php echo $persona->nombre?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" value="<?php echo $persona->edad?>" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" value="<?php echo $persona->signo?>" require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo?>">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>