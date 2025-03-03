<?php
// Secciones de código
// include 'conexion_prueba.php';
// include 'config.php';
include 'functions.php';
include 'conexion_adryo.php'

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - <?php echo isset($nombre_completo) && !empty($nombre_completo) ? $nombre_completo : ""; ?></title>
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
            <?php 
                $foto_mostrada = (empty($foto_perfil) || !file_exists($_SERVER['DOCUMENT_ROOT'] . $foto_perfil)) ? 'foto-por-defecto.jpg' : $foto_perfil; 
                ?>
                <img src="<?php echo $foto_mostrada; ?>" alt="Foto de perfil" class="profile-pic">
            </section>

            <!-- Sección de contacto -->
            <section class="contact-info">
                <h2>Contacto</h2>
                <p><?php echo isset($nombre_completo) && !empty($nombre_completo) ? "🧑" . $nombre_completo : ""; ?></p>
                <p><?php echo isset($fecha_nacimiento) && !empty($fecha_nacimiento) ? "🚼" . $fecha_nacimiento : ""; ?></p>
                <p><?php echo isset($telefono) && !empty($telefono) ? "📞" . $telefono : ""; ?></p>
                <p><?php echo isset($email) && !empty($email) ? "✉️" . $email : ""; ?></p>
                <p><?php echo isset($direccion) && !empty($direccion) ? "📍" . $direccion : ""; ?></p>
            </section>

            <!-- Sección de habilidades -->

            <section class="skills">
    <h2>Habilidades</h2>
    <ul class="section-ul">
        <?php if (!empty($habilidades) && is_array($habilidades)) { ?>
            <?php mostrarHabilidades($habilidades); ?>
        <?php } ?>
    </ul>
</section>       
            <!-- Sección de idiomas -->
            <section class="languages">
                <h2>Idiomas</h2>
                <?php if (isset($idiomas) && array_key_exists(0, $idiomas)) { ?>
                    <?php foreach ($idiomas as $idioma) { ?>
                        <?php mostrarIdioma($idioma); ?>
                    <?php } ?>
                <?php } ?>

            </section>

            <!-- Sección de certificaciones -->
            <section class="certifications">
                <h2>Certificaciones</h2>
                <?php if (isset($certificaciones) && array_key_exists(0, $certificaciones)) { ?>
                    <?php foreach ($certificaciones as $certificacion) { ?>
                        <?php mostrarCertificacion($certificacion); ?>
                    <?php } ?>
                <?php } ?>

            </section>
        </article>

        <!-- Columna Derecha -->
        <article class="right-column">
            <h1><?php echo isset($nombre_completo) && !empty($nombre_completo) ? $nombre_completo : ""; ?></h1>
            <h3 class="name-title">Desarrollador Web</h3>

            <!-- Sección Sobre Mi -->
            <section class="about-me">
                <h2>👤Sobre Mí</h2>
                <p><?php echo isset($objetivo_profesional) ? $objetivo_profesional : ""; ?></p>
            </section>

            <!-- Sección de educación -->
            <section class="education">
                <h2>📘Educación</h2>
                <?php if (isset($educacion) && array_key_exists(0, $educacion)) { ?>
                    <?php foreach ($educacion as $edu) { ?>
                        <?php mostrarEducacion($edu); ?>
                    <?php } ?>
                <?php } ?>
            </section>

            <!-- Sección de experiencia -->
            <section class="experience">
                <h2>💼Experiencia</h2>
                <?php if (isset($experiencia_laboral) && array_key_exists(0, $experiencia_laboral)) { ?>
                    <?php foreach ($experiencia_laboral as $trabajo) { ?>
                        <?php mostrarTrabajo($trabajo); ?>
                    <?php } ?>
                <?php } ?>
            </section>

            <!-- Sección de referencias -->
            <section class="references">
                <h2>📂Referencias</h2>
                <?php if (isset($referencias) && array_key_exists(0, $referencias)) { ?>
                    <?php foreach ($referencias as $referencia) { ?>
                        <?php mostrarReferencia($referencia); ?>
                    <?php } ?>
                <?php } ?>
            </section>
        </article>
    </main>
</body>

</html>
