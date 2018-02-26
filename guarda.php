<?php
 require ('conexion.php');

 $id_name = $_POST ['name'];
 $id_mail = $_POST ['mail'];
 $id_tel = $_POST ['tel'];
 $id_estado = $_POST ['cbx_estado'];
 $id_numtiket = $_POST ['numtiket'];
 $id_imgtiket = $_POST ['imgtiket'];

 $sql = "INSERT INTO registro (id_estado) VALUES ('$id_estado')";

 $resultado = $sql();


 if($resultado) {
     echo "Registro Guardado";
 } else{
     echo "Error al registrar";
 }
?>