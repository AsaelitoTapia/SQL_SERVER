<?php
    // Verificar si se recibió el ID mediante POST
    if(!isset($_POST['id'])){
        // Si no se recibe el ID, redirigimos al usuario con un mensaje de error
        header('Location: index.php?mensaje=error');
        exit();
    }

    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';
    // Obtener los valores enviados mediante POST
    $id = $_POST['id'];
    $titulo = $_POST['txtTitulo'];
    $autor = $_POST['txtAutor'];
    $genero = $_POST['txtGenero'];
    $fechaPublicacion = $_POST['txtFechaPublicacion'];
    $tipo = $_POST['txtTipo'];

    // Preparar la consulta de actualización
    $sentencia = $conn->prepare("UPDATE Biblioteca.dbo.LibrosYMangas SET Titulo = ?, Autor = ?, Genero = ?, FechaPublicacion = ?, Tipo = ? WHERE ID = ?;");
    // Ejecutar la consulta de actualización con los datos proporcionados
    $resultado = $sentencia->execute([$titulo, $autor, $genero, $fechaPublicacion, $tipo, $id]);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado === TRUE) {
        // Redirigir con un mensaje de éxito si la actualización fue exitosa
        header('Location: index.php?mensaje=editado');
    } else {
        // Redirigir con un mensaje de error si hubo algún problema
        header('Location: index.php?mensaje=error');
        exit();
    }
?>

