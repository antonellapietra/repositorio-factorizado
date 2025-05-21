<?php
// Incluye el archivo de configuración donde se establece la conexión con la base de datos
include 'config.php';
// Obtiene el valor del parámetro 'id'
$id = $_GET['id'];
// Crea una consulta sql para eliminar el estudiante con ese ID
$sql = "DELETE FROM students WHERE id = $id";
// ejecuta la consulta y verifica si fue exitosa
if ($connection->query($sql) === TRUE) { //si la eliminacion fue exitosa, vuelve a la pagina pp
    header("Location: index.php");
    exit; 
} else {
    //si hubo un error, muestra un mensaje
    echo "Error al borrar: " . $connection->error;
}
?>
