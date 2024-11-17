<?php
    // Verificar si hay campos vacíos en el formulario
    if(empty($_POST["oculto"]) || empty($_POST["txtTitulo"]) || empty($_POST["txtAutor"]) || empty($_POST["txtGenero"]) || empty($_POST["txtFechaPublicacion"]) || empty($_POST["txtTipo"])){
        // Si algún campo está vacío, redirigir con un mensaje de error
        header('Location: index.php?mensaje=falta');
        exit();
    }

    // Incluir el archivo de conexión a la base de datos
    include_once 'conexion.php';
    // Obtener los valores del formulario enviados por POST
    $titulo = $_POST["txtTitulo"];
    $autor = $_POST["txtAutor"];
    $genero = $_POST["txtGenero"];
    $fechaPublicacion = $_POST["txtFechaPublicacion"];
    $tipo = $_POST["txtTipo"];

    // Preparar la consulta para insertar un nuevo registro en la base de datos
    $sentencia = $conn->prepare("INSERT INTO Biblioteca.dbo.LibrosYMangas(Titulo, Autor, Genero, FechaPublicacion, Tipo) VALUES (?, ?, ?, ?, ?);");
    // Ejecutar la consulta con los valores proporcionados
    $resultado = $sentencia->execute([$titulo, $autor, $genero, $fechaPublicacion, $tipo]);

    // Verificar si la inserción fue exitosa
    if ($resultado === TRUE) {
        // Redirigir con un mensaje de éxito si el registro fue insertado correctamente
        header('Location: index.php?mensaje=registrado');
    } else {
        // Redirigir con un mensaje de error si hubo algún problema al insertar
        header('Location: index.php?mensaje=error');
        exit();
    }
?>

