<?php
//Prueba Local
//Solo puse el apartado de educacion para hacer las pruebas de servidor local
$host = 'localhost'; // Dirección del servidor MySQL, en este caso es local
$dbname = 'prueba'; // Nombre de la base de datos
$username = 'root'; // Usuario para la base de datos ('root' en local)
$password = ''; // Contraseña del usuario (vacía en local)

try {
    // Creamos el DSN (Data Source Name) para la conexión
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    
    // Establecemos el modo de error de PDO para que se lance una excepción en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Realizamos la consulta para obtener los datos de la tabla 'educacion'
    $stmt = $pdo->query("SELECT institucion, titulo, fecha_inicio, fecha_fin, descripcion FROM educacion");
    
    // Obtenemos todos los registros como un array asociativo
    $educacion = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Si ocurre un error de conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>