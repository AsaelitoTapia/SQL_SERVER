<?php include 'header.php' ?>

<?php
// Conexión a la base de datos
include_once "conexion.php";

// Consulta a la base de datos
$query = "SELECT * FROM Biblioteca.dbo.LibrosYMangas";
$stmt = $conn->query($query);
$items = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Inicio de alertas -->
            <?php 
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado!</strong> Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   

            <?php 
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   

            <?php 
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado!</strong> Los datos fueron actualizados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <?php 
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Los datos fueron borrados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
            <!-- Fin de alertas -->

            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                <h3 class="mb-0">Registro de Libros y/o Mangas</h3>
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Título</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Género</th>
                                <th scope="col">Fecha de Publicación</th>
                                <th scope="col">Tipo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($items as $dato) { 
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->ID; ?></td>
                                <td><?php echo $dato->Titulo; ?></td>
                                <td><?php echo $dato->Autor; ?></td>
                                <td><?php echo $dato->Genero; ?></td>
                                <td><?php echo $dato->FechaPublicacion; ?></td>
                                <td><?php echo $dato->Tipo; ?></td>
                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->ID; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->ID; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header bg-dark text-white text-center">
            <h5 class="mb-0">Ingresar datos</h5>
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor: </label>
                        <input type="text" class="form-control" name="txtAutor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Género: </label>
                        <input type="text" class="form-control" name="txtGenero" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Publicación: </label>
                        <input type="date" class="form-control" name="txtFechaPublicacion" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo (Libro/Manga): </label>
                        <input type="text" class="form-control" name="txtTipo" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-dark" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
