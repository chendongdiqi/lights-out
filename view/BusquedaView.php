<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Búsqueda
  </title>
  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
  <script src="/js/jquery-3.6.4.min.js"></script>
</head>

<body class="bg-dark min-vh-100 d-flex flex-column justify-content-between">
  <?php
  // Header
  require_once "templates/header.php";

  ?>

  <!-- Main -->
  <div class="flex-fill">
    <!-- Buscador -->
    <form class="container my-3 d-flex flex-wrap justify-content-center" method="get" action="/index.php">
      <div class="col-12 col-md-8 rounded bg-secondary p-3">
        <div class="input-group">
          <span class="input-group-text text-warning bg-secondary">
            <i class="bi bi-search"></i>
          </span>
          <input type="search" class="form-control" name="q" value="<?= isset($query) ? $query : "" ?>">
        </div>
      </div>
      <input type="hidden" name="c" value="busqueda">
    </form>
    <!-- Fin Buscador -->

    <!-- Resultados -->
    <div class="container d-flex flex-wrap" id="resultados">
      <!-- Usuarios -->
      <div class="container mb-2 py-2 bg-secondary rounded">
        <h4 class="text-warning mb-3">Usuarios</h4>
        <?php if (sizeof($_SESSION["usuarios"]) == 0) { ?>
          <div class="container p-3">
            <p class="lead text-warning text-center py-3">Sin resultados.</p>
          </div>
        <?php } ?>
        <div class="container-fluid d-flex flex-wrap mb-3">
          <?php foreach ($_SESSION["usuarios"] as $usuario) { ?>
            <div class="container col-4 col-md-2 d-flex flex-column mb-3">
              <a class="ratio ratio-1x1" href="/perfil/<?= $usuario["id"] ?>/posts">
                <img src="/assets/perfil/<?= $usuario["foto"] ?>" alt="" class="rounded-circle" />
              </a>
              <a class="text-center link-warning text-decoration-none text-truncate"
                href="/perfil/<?= $usuario["id"] ?>/posts">
                <?= $usuario["nombre"] ?>
              </a>
              <small class="text-light text-center text-truncate fw-bold">
                <?= "@" . $usuario["username"] ?>
              </small>
            </div>
          <?php } ?>
        </div>
        <?php if (isset($_SESSION["ver_mas_usuarios"])) { ?>
          <div class="container-fluid collapse" id="ver-mas-usuarios">
            <div class="container-fluid d-flex flex-wrap">
              <?php foreach ($_SESSION["ver_mas_usuarios"] as $usuario) { ?>
                <div class="container col-4 col-md-2 d-flex flex-column mb-3">
                  <a class="ratio ratio-1x1" href="/perfil/<?= $usuario["id"] ?>/posts">
                    <img src="/assets/perfil/<?= $usuario["foto"] ?>" alt="" class="rounded-circle" />
                  </a>
                  <a class="text-center link-warning text-decoration-none text-truncate"
                    href="/perfil/<?= $usuario["id"] ?>/posts">
                    <?= $usuario["nombre"] ?>
                  </a>
                  <small class="text-light text-center text-truncate fw-bold">
                    <?= "@" . $usuario["username"] ?>
                  </small>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="container d-flex justify-content-center">
            <a class="btn btn-outline-warning" data-bs-toggle="collapse" href="#ver-mas-usuarios">
              Ver más
            </a>
          </div>
        <?php } ?>
      </div>
      <!-- Fin Usuarios -->
    </div>
    <!-- Fin Resultados -->
  </div>
  <!-- Fin Main -->

  <?php
  // Footer
  require_once "templates/footer.php";

  ?>

  <!-- Bootstrap JS -->
  <script src="/js/bootstrap.bundle.min.js"></script>

  <script src="/js/busqueda.js"></script>
</body>

</html>