<?php

require ('./DAO/MonederoDAO.php');


if(isset($_POST['modificar'])){
///////////// Informacion enviada por el formulario /////////////
    $id=trim($_POST['id']);
    $concepto = trim($_POST['concepto']);
    $fecha = trim($_POST['fecha']);
    $importe = trim($_POST['importe']);



// PASO 1: RECUPERAR DATOS DEL POST

/*
if(isset($_POST['concepto'])){

   

}

if(isset($_POST['fecha'])){

  

}

if(isset($_POST['importe'])){

  

}
*/

///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
//INSERT INTO monedero (id, nomCompleto, email, usuario, pass) VALUES (id:, nomCompleto:, email:, usuario:, pass:)
$consulta = "UPDATE monedero SET `id`=:id, `concepto`= :concepto, `fecha` = :fecha, `importe` = :importe WHERE `id` = :id";
$sql = $connect->prepare($consulta);
$sql->bindParam(':concepto',$concepto,PDO::PARAM_STR, 25);
$sql->bindParam(':fecha',$fecha,PDO::PARAM_STR, 25);
$sql->bindParam(':importe',$importe,PDO::PARAM_STR,25);
$sql->bindParam(':id',$id,PDO::PARAM_INT);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 

Gracias: $count registro ha sido actualizado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>