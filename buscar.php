<?php
$conn = mysqli_connect('LOCALHOST:3307','root','','crud');
if(!isset($_POST['buscar'])){
    $_POST['buscar']= "";
    $buscar = $_POST['buscar'];
}
$buscar = $_POST['buscar'];


$sentencia =("SELECT * FROM persona WHERE nombre LIKE '%".$buscar."%' OR edad LIKE '%".$buscar."%' OR signo LIKE '%".$buscar."%';");


$sql_query= mysqli_query($conn,$sentencia);

?>