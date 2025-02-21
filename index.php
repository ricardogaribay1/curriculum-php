<?php
// Información Personal
$nombre_completo = "John Doe";
$fecha_nacimiento = "1990-01-10";
$direccion = "1234 Main St, Ciudad, País";
$telefono = "+1234567890";
$email = "john.doe@example.com";
$foto_perfil = "foto-cv.jpg";

// Objetivo Profesional
$objetivo_profesional = "Desarrollador de software con experiencia en aplicaciones web y 
sistemas distribuidos. Con una sólida formación en programación y 
soluciones tecnológicas innovadoras";

// Educación
$educacion = [
    [
        "institucion" => "Universidad XYZ",
        "titulo" => "Licenciatura en Informática",
        "fecha_inicio" => "2010-09-01",
        "fecha_fin" => "2014-06-30",
        "descripcion" => "Descripción de la carrera y logros."
    ],
    [
        "institucion" => "Instituto ABC",
        "titulo" => "Técnico en Programación",
        "fecha_inicio" => "2008-09-01",
        "fecha_fin" => "2010-06-30",
        "descripcion" => "Descripción de la carrera y logros."
    ],
    [
        "institucion" => "Bachillerato QWERTY", // Sección de educación agregada
        "titulo" => "Técnico en Programación",
        "fecha_inicio" => "2008-09-01",
        "fecha_fin" => "2010-06-30",
        "descripcion" => "Descripción de la carrera y logros."
    ]
];

// Experiencia Laboral
$experiencia_laboral = [
    [
        "empresa" => "Compañía 1",
        "puesto" => "Desarrollador de Software",
        "fecha_inicio" => "2015-01-01",
        "fecha_fin" => "2020-12-31",
        "responsabilidades" => "Desarrollo de aplicaciones web, mantenimiento de sistemas, etc."
    ],
    [
        "empresa" => "Compañía 2",
        "puesto" => "Ingeniero de Software",
        "fecha_inicio" => "2021-01-01",
        "fecha_fin" => "Presente",
        "responsabilidades" => "Gestión de proyectos, desarrollo de software, etc."
    ]
];

// Habilidades
$habilidades = [
    "Lenguajes de Programación" => ["PHP", "JavaScript", "Python"],
    "Frameworks" => ["Laravel", "React", "Django"],
    "Bases de Datos" => ["MySQL", "PostgreSQL", "MongoDB"],
    "Otros" => ["Git", "Docker", "Linux"]
];

// Certificaciones 
$certificaciones = [
    [
        "nombre" => "Certificación en Desarrollo Web",
        "institucion" => "Organización XYZ",
        "fecha_obtencion" => "2019-05-01"
    ],
    [
        "nombre" => "Certificación en Seguridad Informática",
        "institucion" => "Organización ABC",
        "fecha_obtencion" => "2021-07-01"
    ]
];

// Idiomas
$idiomas = [
    [
        "idioma" => "Inglés",
        "nivel" => "Avanzado"
    ],
    [
        "idioma" => "Español",
        "nivel" => "Nativo"
    ]
];

// Referencias 
$referencias = [
    [
        "nombre" => "Jane Smith",
        "empresa" => "Compañía 1",
        "puesto" => "Gerente de Proyectos",
        "telefono" => "+1234567891",
        "email" => "jane.smith@example.com"
    ],
    [
        "nombre" => "Robert Brown",
        "empresa" => "Compañía 2",
        "puesto" => "Director de Tecnología",
        "telefono" => "+1234567892",
        "email" => "robert.brown@example.com"
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - <?php echo $nombre_completo; ?></title>
    <link href="adryo-icono.jpg" type="image/x-icon" rel="icon">
    <link href="adryo-icono.jpg" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container">
    <div class="bar"></div>
    <!-- Columna Izquierda -->
    <article class="left-column">
    <section class="profile">
        <img src="<?php echo $foto_perfil; ?>" alt="Foto de perfil" class="profile-pic">
    </section>
    
    <!-- Sección de contacto -->
    <section class="contact-info">
        <h2>Contacto</h2>
        <p>🧑 <?php echo $nombre_completo; ?></p>
        <p>🚼 <?php echo $fecha_nacimiento; ?></p>
        <p>📞 <?php echo $telefono; ?></p>
        <p>✉️ <?php echo $email; ?></p>
        <p>📍  <?php echo $direccion; ?></p>
    </section>

    <!-- Sección de habilidades -->
    <section class="skills">
        <h2>Habilidades</h2>
        <ul class="section-ul">
            <?php foreach ($habilidades as $categoria => $habilidad_list) { ?>
                <li><strong><?php echo $categoria; ?>:</strong>
                    <ul>
                        <?php foreach ($habilidad_list as $habilidad) { ?>
                            <li><?php echo $habilidad; ?></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </section>

    <!-- Sección de idiomas -->
    <section class="languages">
        <h2>Idiomas</h2>
        <?php foreach ($idiomas as $idioma) { ?>
            <p><?php echo $idioma["idioma"]; ?> (Nivel: <?php echo $idioma["nivel"]; ?>)</p>
        <?php } ?>
    </section>

    <!-- Sección de certificaciones -->
    <section class="certifications">
        <h2>Certificaciones</h2>
        <?php foreach ($certificaciones as $certificacion) { ?>
            <p><strong><?php echo $certificacion["nombre"]; ?></strong><br>
               <?php echo $certificacion["institucion"]; ?> (Fecha de obtención: <?php echo $certificacion["fecha_obtencion"]; ?>)</p>
        <?php } ?>
    </section>
</article>

<!-- Columna Derecha -->
<article class="right-column">

    <h1><?php echo $nombre_completo; ?></h1>
    <h3 class="name-title">Desarrollador de Software</h3>

    <!-- Sección Sobre Mi -->
    <section class="about-me">
        <h2>👤Sobre Mí</h2>
        <p><?php echo $objetivo_profesional; ?></p>
    </section>

    <!-- Sección de educación -->
    <section class="education">
        <h2>📘Educación</h2>
        <?php foreach ($educacion as $edu) { ?>
            <p><strong><?php echo $edu["titulo"]; ?></strong><br>
               <?php echo $edu["institucion"]; ?> (<?php echo $edu["fecha_inicio"] . " - " . $edu["fecha_fin"]; ?>)<br>
               <?php echo $edu["descripcion"]; ?></p>
        <?php } ?>
    </section>

    <!-- Sección de experiencia -->
    <section class="experience">
        <h2>💼Experiencia</h2>
        <?php foreach ($experiencia_laboral as $trabajo) { ?>
            <p><strong><?php echo $trabajo["puesto"]; ?></strong><br>
               <?php echo $trabajo["empresa"]; ?> (<?php echo $trabajo["fecha_inicio"] . " - " . $trabajo["fecha_fin"]; ?>)<br>
               <?php echo $trabajo["responsabilidades"]; ?></p>
        <?php } ?>
    </section>

    <!-- Sección de referencias -->
    <section class="references">
        <h2>📂Referencias</h2>
        <?php foreach ($referencias as $referencia) { ?>
            <p><strong><?php echo $referencia["nombre"]; ?></strong><br>
               <?php echo $referencia["puesto"]; ?> en <?php echo $referencia["empresa"]; ?><br>
               Teléfono: <?php echo $referencia["telefono"]; ?><br>
               Email: <?php echo $referencia["email"]; ?></p>
        <?php } ?>
    </section>
</article>
</main>

</body>
</html>
