<?php
require_once "config/Conexion.php";

class Nota
{

  function __construct()
  {

  }

  static function existe_nota($id_usuario, $id_ficha, $tipo)
  {
    return sizeof(Nota::get_nota($id_usuario, $id_ficha, $tipo)) > 0;
  }

  static function set_nota($nota, $id_usuario, $id_ficha, $tipo)
  {
    $conn = new Conexion();
    $sql = "insert into notas (valor, id_usuario, id_ficha, ficha_tipo) values ($nota, $id_usuario, $id_ficha, '$tipo')";
    $conn->exec($sql);
  }

  static function remove_nota($id_usuario, $id_ficha, $tipo)
  {
    $conn = new Conexion();
    $sql = "delete from notas where id_usuario = $id_usuario and id_ficha = $id_ficha and ficha_tipo = '$tipo')";
    $conn->exec($sql);
  }

  static function get_nota_media($id_ficha, $tipo)
  {
    $conn = new Conexion();
    $sql = "select round(avg(valor), 1) from notas where id_ficha = $id_ficha and ficha_tipo = '$tipo'";
    return $conn->consulta($sql)[0][0];
  }

  static function get_nota($id_usuario, $id_ficha, $tipo)
  {
    $conn = new Conexion();
    $sql = "select valor from notas where id_usuario = $id_usuario and id_ficha = $id_ficha and ficha_tipo = '$tipo'";
    return $conn->consulta($sql);
  }

  static function modificar_nota($nota, $id_usuario, $id_ficha, $tipo)
  {
    $conn = new Conexion();
    $sql = "update notas set valor = $nota where id_usuario = $id_usuario and id_ficha = $id_ficha and ficha_tipo = '$tipo'";
    $conn->exec($sql);
  }

  function __get($name)
  {
    return $this->$name;
  }
}

?>