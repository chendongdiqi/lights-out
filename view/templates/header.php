<!-- CABECERA -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top border-bottom border-dark border-2 h-10">
  <div class="container-fluid">
    <a class="navbar-brand" href="/inicio">
      <img src="/assets/img/logo.png" alt="logo" width="100px" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-lg-between" id="menu">
      <ul class="navbar-nav mb-2 mb-lg-0 col-lg-9 justify-content-around">
        <li class="nav-item mx-2 text-center fs-5">
          <a class="nav-link" aria-current="page" href="/inicio">
            <i class="bi bi-house-fill"></i> Inicio
          </a>
        </li>
        <li class="nav-item mx-2 text-center fs-5">
          <a class="nav-link" href="/explorar">
            <i class="bi bi-compass-fill"></i> Explorar
          </a>
        </li>
        <li class="nav-item mx-2 text-center fs-5">
          <a class="nav-link" href="/perfil/<?= $_SESSION["usuario"]->id ?>/posts">
            <i class="bi bi-person-fill"></i> Perfil
          </a>
        </li>
      </ul>
      <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
        <form method="get" action="/index.php">
          <div class="input-group">
            <span class="input-group-text text-warning bg-secondary">
              <i class="bi bi-search"></i>
            </span>
            <input type="search" class="form-control rounded-end" name="q" placeholder="Buscar" />
            <input type="hidden" name="c" value="busqueda">
          </div>
        </form>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <img src="/assets/perfil/<?= $_SESSION["usuario"]->foto ?>" class="rounded-circle" alt="user" width="30px"
              height="30px" />
          </button>
          <ul class="dropdown-menu dropdown-menu-end text-center">
            <li>
              <a class="dropdown-item disabled" href="">
                <?= $_SESSION["usuario"]->nombre ?>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/editar_perfil">
                Editar perfil
              </a>
            </li>
            <?php if ($_SESSION["usuario"]->tipo == "Administrador") { ?>
              <li>
                <a class="dropdown-item" href="/administrador/gestion_usuarios">
                  Administración
                </a>
              </li>
            <?php } ?>
            <li><a class="dropdown-item" href="/index.php?c=inicio&m=logout">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Fin CABECERA -->
<div class="header-gap"></div>