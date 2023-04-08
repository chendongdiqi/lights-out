<!DOCTYPE html>
<?php

$u = $_SESSION["usuario"];

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LightsOUT - Editar perfil</title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
</head>

<body class="bg-dark min-vh-100">
  <?php
  // Importar header
  require_once "templates/header.php";
  ?>

  <!-- Mensajes -->
  <div class="container mt-5 pt-5">
    <!-- Mensaje error archivo imagen -->
    <div id="error_foto" class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert">
      <span>El archivo subido no es válido.</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- Fin Mensaje error archivo imagen -->
    <!-- Mensaje de foto cambiada -->
    <?php if (isset($_SESSION["foto_cambiada"])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>La foto de perfil ha sido cambiada.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["foto_cambiada"]);
    } ?>
    <!-- Fin Mensaje de foto cambiada -->
    <!-- Mensaje de datos actualizados -->
    <?php if (isset($_SESSION["datos_actualizados"])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>Los datos han sido actualizados.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["datos_actualizados"]);
    } ?>
    <!-- Fin Mensaje de datos actualizados -->
    <!-- Mensaje de contraseña actualizada -->
    <?php if (isset($_SESSION["pwd_actualizado"])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>La contraseña ha sido actualizada.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["pwd_actualizado"]);
    } ?>
    <!-- Fin Mensaje de contraseña actualizada -->
    <!-- Mensaje de contraseña actual incorrecta -->
    <?php if (isset($_SESSION["error_pwd"])) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span>La contraseña actual no es correcta.</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["error_pwd"]);
    } ?>
    <!-- Fin Mensaje de contraseña actual incorrecta -->
  </div>
  <!-- Fin Mensajes -->

  <!-- Editar foto -->
  <section class="container col-md-8 text-light mb-5 pt-5">
    <h1 class="text-warning mb-4 pt-2">Cambiar foto</h1>

    <div class="container d-flex border border-2 border-warning rounded p-2">
      <!-- Foto -->
      <div class="col-lg-3 col-4">
        <div class="ratio ratio-1x1">
          <img id="foto" src="assets/perfil/<?= $u->foto ?>" alt="user" class="rounded-circle" />
        </div>
      </div>
      <!-- Fin Foto -->
      <!-- Subir foto -->
      <form method="post" action="index.php?c=editar_perfil&m=guardar_foto" enctype="multipart/form-data"
        class="col-lg-9 col-8 p-2 d-flex justify-content-center align-items-center">
        <div class="input-group input-group-sm">
          <input id="archivo" name="archivo" type="file" class="form-control" />
        </div>
        <!-- Guardar -->
        <div class="col-2 d-flex justify-content-end align-items-end h-100">
          <button type="submit" id="guardar_foto" class="btn btn-sm btn-warning">Guardar</button>
        </div>
        <!-- Fin Guardar -->
      </form>
      <!-- Fin Subir foto -->
    </div>
  </section>
  <!-- Fin Editar foto -->

  <!-- Editar datos -->
  <section class="container col-md-8 text-light my-5">
    <h1 class="text-warning mb-4 pt-2">Editar datos</h1>

    <div class="container d-flex border border-2 border-warning rounded p-2">
      <!-- Datos -->
      <div class="col-12">
        <form method="post" action="index.php?c=editar_perfil&m=guardar_datos">
          <div class="row mb-3">
            <label for="nombre" class="col-2 col-form-label fw-bold text-warning text-end">
              Nombre:
            </label>
            <div class="col-9 mx-2">
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $u->nombre; ?>" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="usuario" class="col-2 col-form-label fw-bold text-warning text-end">
              Usuario:
            </label>
            <div class="col-9 mx-2">
              <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $u->username ?>" />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="sobre-mi" class="col-2 col-form-label fw-bold text-warning text-end">
              Sobre mí:
            </label>
            <div class="col-9 mx-2">
              <textarea class="form-control" name="sobre_mi" id="sobre_mi" rows="4"><?= $u->sobre_mi ?></textarea>
            </div>
          </div>
          <!-- Guardar -->
          <div class="col-12 d-flex justify-content-end align-items-end">
            <button type="submit" id="guardar_datos" class="btn btn-sm btn-warning">Guardar</button>
          </div>
          <!-- Fin Guardar -->
        </form>
      </div>
      <!-- Fin Datos -->
    </div>
  </section>
  <!-- Fin Editar datos -->

  <!-- Cambiar contraseña -->
  <section class="container col-md-8 text-light my-5">
    <h1 class="text-warning mb-4 pt-2">Cambiar contraseña</h1>

    <div class="container d-flex border border-2 border-warning rounded p-2">
      <!-- Contraseñas -->
      <div class="col-12">
        <form method="post" action="index.php?c=editar_perfil&m=cambiar_pwd">
          <div class="row mb-3">
            <label for="actual-pass" class="col-5 col-lg-3 col-form-label fw-bold text-warning text-end">
              Contraseña actual:
            </label>
            <div class="col-6 col-lg-8">
              <input type="password" class="form-control" id="actual-pass" name="actual-pass" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="new-pass" class="col-5 col-lg-3 col-form-label fw-bold text-warning text-end">
              Contraseña nueva:
            </label>
            <div class="col-6 col-lg-8">
              <input type="password" class="form-control" id="new-pass" name="new-pass" />
            </div>
          </div>
          <div class="row mb-3 align-items-center">
            <label for="new-pass-conf" class="col-5 col-lg-3 col-form-label fw-bold text-warning text-end">
              Confirmar contraseña nueva:
            </label>
            <div class="col-6 col-lg-8">
              <input type="password" class="form-control" id="new-pass-conf" name="new-pass-conf" />
            </div>
          </div>
          <!-- Guardar -->
          <div class="col-12 d-flex justify-content-end align-items-end">
            <button type="submit" id="cambiar_pwd" class="btn btn-sm btn-warning">Guardar</button>
          </div>
          <!-- Fin Guardar -->
        </form>
      </div>
      <!-- Fin Constraseñas -->
    </div>
  </section>
  <!-- Fin Cambiar contraseña -->

  <!-- Dar de baja -->
  <div class="container mb-5 d-flex justify-content-center">
    <form method="post" action="index.php?c=editar_perfil&m=eliminar_cuenta">
      <button type="submit" id="eliminar_cuenta" class="btn btn-danger">Eliminar cuenta</button>
    </form>
  </div>
  <!-- Fin Dar de baja -->

  <?php
  // Importar footer
  require_once "templates/footer.php";
  ?>

  <!-- Bootstrap JS -->
  <script src="js/bootstrap.bundle.min.js"></script>

  <script type="module" src="js/editar_perfil.js"></script>
</body>

</html>