<?php

  include 'bd/bd.php';  

  header('Acces-Control-Allow-Origin');

  if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['id'])){
        $query = "SELECT * FROM framweorks where id=".$_GET['id'];
        $resultado = metodoGet($query);
        echo json_encode($resultado->fecth(PDO::FETCH_ASSOC));
    }else{
        $query = "SELECT * FROM framweorks";
        $resultado = metodoGet($query);
        echo json_encode($resultado->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();
  }

  if($_SERVER["METHOD"] == "POST"){
      unset($_POST["METHOD"]);
      $nombre = $_POST["nombre"];
      $lanzamiento = $_POST["lanzamiento"];
      $desarrollador = $_POST["desarrollador"];
      $query = "INSERT INTO frameworks(nombre, lanzamiento, desarrollador) values ('$nombre','$lanzamiento','$desarrollador')";
      $queryAutoIncrement = "SELECT MAX(id) as id FROM frameworks";
      $resultado = metodoPost($query, $queryAytoIncrement);
      echo json_encode($resultado);
      header("HTTP/1.1 200 OK");
      exit();
  }

  if($_SERVER["METHOD"] == "PUT"){
    $id = $_GET["id"];
    $nombre = $_POST["nombre"];
    $lanzamiento = $_POST["lanzamiento"];
    $desarrollador = $_POST["desarrollador"];
    $query = "UPDATE frameworks set nombre='$nombre', lanzamiento='$lanzamiento', desarrollador='$desarrollador' WHERE id='$id'";
    $resultado = metodoPut($query);
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();

    if($_SERVER["METHOD"] == "DELETE"){
        unset($_POST["METHOD"]);
        $id = $_GET["id"];
        $query = "DELETE FROM frameworks WHERE id='$id'";
        $resultado = metodoDelete($query);
        echo json_encode($resultado);
        header("HTTP/1.1 200 OK");
        exit();
}

header("HTTP/1.1 400 Bad Request");



?>