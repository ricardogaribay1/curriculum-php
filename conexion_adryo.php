<?php

// Conexión a la base de datos
$servername = "betaadryo.com.mx";
$username = "betaadry_becarios";
$password = "vekx6YRz2MgZ8HS";
$dbname = "betaadry_ejercicio_01";

try {
    // Creamos el DSN (Data Source Name) para la conexión
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8"; // Definimos el DSN para la conexión a la base de datos
    $pdo = new PDO($dsn, $username, $password); // Creamos una nueva instancia de PDO para conectarnos a la base de datos
    
    // Establecemos el modo de error de PDO para que se lance una excepción en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuramos PDO para que lance excepciones en caso de error

    // Paso 1: Consultar el ID de la persona usando su nombre
    $sql = "SELECT id FROM informacion_personal WHERE nombre_completo = 'María José Santana'"; // Definimos la consulta SQL para obtener el ID de la persona
    $stmt = $pdo->prepare($sql); // Preparamos la consulta
    $stmt->execute(); // Ejecutamos la consulta

    // Verificar si se encontró el ID de la persona
    if ($stmt->rowCount() > 0) { // Verificamos si se encontraron resultados
        // Obtener el ID de la persona
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado como un array asociativo
        $id_value = $row['id']; // ID de la persona

        // Inicializar las variables del CV con la información de la base de datos
        // Buscar la información personal usando el ID
        $sql_personal = "SELECT nombre_completo, fecha_nacimiento, telefono, email, direccion, foto_perfil FROM informacion_personal WHERE id = :id"; // Definimos la consulta SQL para obtener la información personal
        $stmt_personal = $pdo->prepare($sql_personal); // Preparamos la consulta
        $stmt_personal->execute([':id' => $id_value]); // Ejecutamos la consulta con el ID de la persona
        $row_personal = $stmt_personal->fetch(PDO::FETCH_ASSOC); // Obtenemos el resultado como un array asociativo

        $nombre_completo = $row_personal['nombre_completo']; // Asignamos el nombre completo a la variable
        $fecha_nacimiento = $row_personal['fecha_nacimiento']; // Asignamos la fecha de nacimiento a la variable
        $telefono = $row_personal['telefono']; // Asignamos el teléfono a la variable
        $email = $row_personal['email']; // Asignamos el email a la variable
        $direccion = $row_personal['direccion']; // Asignamos la dirección a la variable
        $foto_perfil = $row_personal['foto_perfil']; // Asignamos la foto de perfil a la variable

        // Paso 2: Consultar la información de otras tablas usando el ID de la persona

        // Consultar objetivo profesional
        $sql_objetivo = "SELECT descripcion FROM objetivo_profesional WHERE informacion_personal_id = :id";
        $stmt_objetivo = $pdo->prepare($sql_objetivo);
        $stmt_objetivo->execute([':id' => $id_value]);
        $objetivo_profesional = $stmt_objetivo->fetchColumn();

        if (!$objetivo_profesional) {
            $objetivo_profesional = "Desarrollador de software con experiencia en aplicaciones web y 
        sistemas distribuidos. Con una sólida formación en programación y 
        soluciones tecnológicas innovadoras";// Valor por defecto si no se encuentra
        }

        // Consultar educación
        $sql_educacion = "SELECT institucion, titulo, fecha_inicio, fecha_fin, descripcion FROM educacion WHERE informacion_personal_id = :id";
        $stmt_educacion = $pdo->prepare($sql_educacion);
        $stmt_educacion->execute([':id' => $id_value]);
        $educacion = $stmt_educacion->fetchAll(PDO::FETCH_ASSOC);

        // Consultar experiencia laboral
        $sql_experiencia = "SELECT empresa, puesto, fecha_inicio, fecha_fin, responsabilidades FROM experiencia_laboral WHERE informacion_personal_id = :id";
        $stmt_experiencia = $pdo->prepare($sql_experiencia);
        $stmt_experiencia->execute([':id' => $id_value]);
        $experiencia_laboral = $stmt_experiencia->fetchAll(PDO::FETCH_ASSOC);

        // Consultar habilidades
        $sql_habilidades = "SELECT categoria, habilidad FROM habilidades WHERE informacion_personal_id = :id";
        $stmt_habilidades = $pdo->prepare($sql_habilidades);
        $stmt_habilidades->execute([':id' => $id_value]);
        $habilidades = $stmt_habilidades->fetchAll(PDO::FETCH_ASSOC);

        // Consultar certificaciones
        $sql_certificaciones = "SELECT nombre, institucion, fecha_obtencion FROM certificaciones WHERE informacion_personal_id = :id";
        $stmt_certificaciones = $pdo->prepare($sql_certificaciones);
        $stmt_certificaciones->execute([':id' => $id_value]);
        $certificaciones = $stmt_certificaciones->fetchAll(PDO::FETCH_ASSOC);

        // Consultar idiomas
        $sql_idiomas = "SELECT idioma, nivel FROM idiomas WHERE informacion_personal_id = :id";
        $stmt_idiomas = $pdo->prepare($sql_idiomas);
        $stmt_idiomas->execute([':id' => $id_value]);
        $idiomas = $stmt_idiomas->fetchAll(PDO::FETCH_ASSOC);

        // Consultar referencias
        $sql_referencias = "SELECT nombre, empresa, puesto, telefono, email FROM referencias WHERE informacion_personal_id = :id";
        $stmt_referencias = $pdo->prepare($sql_referencias);
        $stmt_referencias->execute([':id' => $id_value]);
        $referencias = $stmt_referencias->fetchAll(PDO::FETCH_ASSOC);

    } else {
        echo "No se encontraron resultados para María José Santana.";
    }

} catch (PDOException $e) {  // Captura cualquier excepción de PDO que ocurra durante la ejecución del bloque try
    // Si ocurre un error de conexión
    echo "Error de conexión: " . $e->getMessage();
}

?>