<?php
// Incluye la conexión a la base de datos
include 'config.php';
//obtiene ID del estudiante
$id = $_GET['id'];
//consulta los datos del estudiante con dicho ID
$result = $connection->query("SELECT * FROM students WHERE id = $id");
$row = $result->fetch_assoc(); //trae los datos como array asociativo

//si se envio el formulario POST, procesa la actualizacion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    //actualiza los datos del estudiante
    $sql = "UPDATE students SET fullname='$name', email='$email', age=$age WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar: " . $connection->error;
    }
}
?>

<h2>Editar Estudiante</h2>
<!--<form method="post">--> <!--NO SE HACE si no especifo action, usa la url actual con el id por GET-->

<!-- En el action se agrega el id de la fila que estoy editando--> 
<form action="update.php?id=<?= $row['id'] ?>" method="post">
    Nombre completo: <input type="text" name="fullname" value="<?= $row['fullname'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
    Edad: <input type="number" name="age" value="<?= $row['age'] ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
