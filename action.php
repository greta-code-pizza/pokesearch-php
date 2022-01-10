<?php

require_once("./Pokemon.php");
session_start();

$id = $_GET["id"];
$action = $_GET["action"];

foreach($_SESSION["all"] as $pokemon) {
  if($pokemon->id == $id) {
    $pokemon->$action();
  }
}

header("Location: index.php");