<?php

require_once "model/Usuario.php";
session_start();

class LoginController
{
  private $usuario;
  function __construct()
  {
    $this->usuario = new Usuario();
  }

  function index()
  {
    if (isset($_SESSION["usuario"])) {
      header("Location: inicio");
    } else if (isset($_COOKIE["login"]) && isset($_COOKIE["pwd"])) {
      if ($this->usuario->existeUsuario($_COOKIE["login"], $_COOKIE["pwd"])) {
        $_SESSION["usuario"] = $this->usuario;
        header("Location: inicio");
      } else {
        $_SESSION["mensaje_error"] = "Usuario o contraseña incorrectos.";
        header("Location: login");
      }
    } else {
      require_once "view/LoginView.php";
    }
  }

  function login()
  {
    $login = $_POST["login"];
    $pwd = $_POST["pwd"];

    if ($this->usuario->existeUsuario($login, $pwd)) {
      if (isset($_POST["recordar"])) {
        setcookie("login", $login, time() + 3600 * 24 * 30);
        setcookie("pwd", $pwd, time() + 3600 * 24 * 30);
      }
      $_SESSION["usuario"] = $this->usuario;
      header("Location: inicio");
    } else {
      $_SESSION["mensaje_error"] = "Usuario o contraseña incorrectos.";
      header("Location: login");
    }
  }

}

?>