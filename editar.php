<?php include 'header.php' ?>

<?php
    // Verificamos si el parámetro 'id' existe en la URL
    if(!isset($_GET['id'])){
        // Si no existe, redirigimos al usuario a 'index.php' con un mensaje de error
        header('Location: index.php?mensaje=error');
        exit();
    }

    // Incluimos el archivo de conexión a la base de datos
    include_once 'conexion.php';
    // Obtenemos el 'id' de la URL
    $id = $_GET['id'];

    // Preparamos la consulta para seleccionar el elemento correspondiente
    $sentencia = $conn->prepare("SELECT * FROM Biblioteca.dbo.LibrosYMangas WHERE ID = ?;");
    // Ejecutamos la consulta utilizando el 'id' proporcionado
    $sentencia->execute([$id]);
    // Recuperamos el resultado como un objeto
    $item = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($item); // Línea para depuración, muestra la información del objeto recuperado
?>

<!-- Sección del formulario para editar los datos -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
            <div class="card-header bg-dark text-white text-center">
            <h3 class="mb-0">Editar Datos</h3>
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" required 
                        value="<?php echo $item->Titulo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor: </label>
                        <input type="text" class="form-control" name="txtAutor" required
                        value="<?php echo $item->Autor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Género: </label>
                        <input type="text" class="form-control" name="txtGenero" required
                        value="<?php echo $item->Genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Publicación: </label>
                        <input type="date" class="form-control" name="txtFechaPublicacion" required
                        value="<?php echo $item->FechaPublicacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo (Libro/Manga): </label>
                        <input type="text" class="form-control" name="txtTipo" required
                        value="<?php echo $item->Tipo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $item->ID; ?>">
                        <input type="submit" class="btn btn-dark" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
