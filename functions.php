<?php

//Función para mostrar habilidades
function mostrarHabilidades($habilidades) {
    // Verificamos si las habilidades están disponibles
    if (!empty($habilidades) && is_array($habilidades)) {
        // Agrupamos las habilidades por categoría
        $categorias = [];

        // Recorremos las habilidades para agruparlas por categoría
        foreach ($habilidades as $habilidad) {
            $categoria = $habilidad['categoria'];
            $habilidad_nombre = $habilidad['habilidad'];
            
            // Si no existe la categoría, la inicializamos
            if (!isset($categorias[$categoria])) {
                $categorias[$categoria] = [];
            }
            // Agregamos la habilidad a la categoría
            $categorias[$categoria][] = $habilidad_nombre;
        }

        // Ahora mostramos las categorías con sus habilidades
        foreach ($categorias as $categoria => $habilidades_categoria) {
            echo "<li class='list'>
                    <strong>{$categoria}:</strong>
                    <ul>";

            // Mostrar las habilidades de esa categoría
            foreach ($habilidades_categoria as $habilidad_nombre) {
                echo "<li>{$habilidad_nombre}</li>";
            }

            echo "</ul></li>";
        }
    }

}

// Función para mostrar los idiomas

function mostrarIdioma($idioma) {
    // Usamos ternarios para comprobar si las variables existen y tienen datos
    $idioma_nombre = isset($idioma["idioma"]) ? $idioma["idioma"] : "";
    $nivel = isset($idioma["nivel"]) ? $idioma["nivel"] : "";

    // Mostrar el idioma y nivel
    echo "<p>{$idioma_nombre} (Nivel: {$nivel})</p>";
}

// Función para mostrar las certificaciones

function mostrarCertificacion($certificacion) {
    // Usamos ternarios para comprobar si las variables existen y tienen datos
    $objetivo_profesional = isset($certificacion["objetivo_profesional"]) && !empty($certificacion["objetivo_profesional"]) ? $certificacion["objetivo_profesional"] : "";
    $institucion = isset($certificacion["institucion"]) ? $certificacion["institucion"] : "";
    $fecha_obtencion = isset($certificacion["fecha_obtencion"]) ? $certificacion["fecha_obtencion"] : "";

    // Mostrar la certificación
    echo "<p>{$objetivo_profesional}</p>";
    echo "<p>{$institucion} (Fecha de obtención: {$fecha_obtencion})</p>";
}


// Función para mostrar institutos de educación 
function mostrarEducacion($edu) {
    // Usamos ternarios para comprobar si las variables existen y tienen datos
    $titulo = isset($edu["titulo"]) ? $edu["titulo"] : "";
    $institucion = isset($edu["institucion"]) ? $edu["institucion"] : "";
    $fecha_inicio = isset($edu["fecha_inicio"]) ? $edu["fecha_inicio"] : "";
    $fecha_fin = isset($edu["fecha_fin"]) ? $edu["fecha_fin"] : "";
    $descripcion = isset($edu["descripcion"]) ? $edu["descripcion"] : "";

    // Mostrar la educación
    echo "<p>
            <strong>{$titulo}</strong><br>
            {$institucion} ({$fecha_inicio} - {$fecha_fin})<br>
            {$descripcion}
        </p>";
}


// Función para mostrar trabajos
function mostrarTrabajo($trabajo) {
    // Usamos ternarios para comprobar si las variables existen y tienen datos
    $puesto = isset($trabajo["puesto"]) ? $trabajo["puesto"] : "";
    $empresa = isset($trabajo["empresa"]) ? $trabajo["empresa"] : "";
    $fecha_inicio = isset($trabajo["fecha_inicio"]) ? $trabajo["fecha_inicio"] : "";
    $fecha_fin = isset($trabajo["fecha_fin"]) ? $trabajo["fecha_fin"] : "";
    $responsabilidades = isset($trabajo["responsabilidades"]) ? $trabajo["responsabilidades"] : "";

    // Mostrar el trabajo
    echo "<p>
            <strong>{$puesto}</strong><br>
            {$empresa} ({$fecha_inicio} - {$fecha_fin})<br>
            {$responsabilidades}
        </p>";
}

// Función para mostrar las referencia.
function mostrarReferencia($referencia) {
    // Usamos ternarios para comprobar si las variables existen y tienen datos
    $nombre = isset($referencia["nombre"]) ? $referencia["nombre"] : "";
    $puesto = isset($referencia["puesto"]) ? $referencia["puesto"] : "";
    $empresa = isset($referencia["empresa"]) ? $referencia["empresa"] : "";
    $telefono = isset($referencia["telefono"]) ? $referencia["telefono"] : "";
    $email = isset($referencia["email"]) ? $referencia["email"] : "";

    // Mostrar la referencia
    echo "<p>
            <strong>{$nombre}</strong><br>
            {$puesto} {$empresa}<br>
            Teléfono: {$telefono}<br>
            Email: {$email}
        </p>";
}

?>
