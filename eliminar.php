<?php 
    // Verificar si se recibió el ID mediante GET
    if(!isset($_GET['id'])){
        // Si no se recibió, redirigir al usuario a la página principal con un mensaje de error
        header('Location: index.php?mensaje=error');
        exit();
    }

    // Incluir el archivo de conexión a la base de datos
    include_once 'conexion.php';
    // Obtener el ID proporcionado por la URL
    $id = $_GET['id'];

    // Preparar la consulta para eliminar el registro correspondiente al ID
    $sentencia = $conn->prepare("DELETE FROM Biblioteca.dbo.LibrosYMangas WHERE ID = ?;");
    // Ejecutar la consulta con el ID proporcionado
    $resultado = $sentencia->execute([$id]);

    // Verificar si la eliminación fue exitosa
    if ($resultado === TRUE) {
        // Redirigir a la página principal con un mensaje de éxito
        header('Location: index.php?mensaje=eliminado');
    } else {
        // Redirigir con un mensaje de error en caso de fallo
        header('Location: index.php?mensaje=error');
    }
?>
