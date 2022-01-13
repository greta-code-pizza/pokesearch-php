<?php

require_once("./Pokemon.php");
session_start();

$id = $_GET["id"];
$action = $_GET["action"];

if(isset($_SESSION["all"])) {
  foreach($_SESSION["all"] as $pokemon) {
    if($pokemon->id == $id) {
      $pokemon->$action();
    }
  }
}

header("Location: index.php");
