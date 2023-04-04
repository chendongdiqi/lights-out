<?php

require_once "model/Usuario.php";

session_start();

class RegistroController
{
  private $registro;

  function __construct()
  {
    $this->registro = new Usuario();
  }

  function index()
  {
    if (isset($_SESSION["usuario"])) {
      header("Location: index.php?c=inicio");
    } else {
      require_once "view/RegistroView.php";
    }
  }

  function registrar()
  {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $nombre = $_POST["nombre"];

    if ($this->registro->addUsuario($login, $pwd, $email, $nombre, "Normal")) {
      $_SESSION["mensaje_ok"] = "Usuario creado correctamente.";
    }

    header("Location: index.php?c=login");

  }

}

?>