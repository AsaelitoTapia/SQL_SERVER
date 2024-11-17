<?php 
// Definimos las variables de conexión al servidor y base de datos
$nom_server = "LAPTOP-P18C220E";
$contrasena = "123";
$usuario = "sa";
$nombre_bd = "Biblioteca";

try {
    // Intentamos establecer la conexión utilizando PDO
    $conn = new PDO(
        "sqlsrv:server=$nom_server;database=$nombre_bd", 
        $usuario, 
        $contrasena
    );
// Mensaje de conexión exitosa
	//echo "Conexión exitosa a la base de datos.";

} catch (Exception $e) {
    // Capturamos cualquier error durante la conexión y mostramos un mensaje
    echo "Problema con la conexión: " . $e->getMessage();
}
?>

