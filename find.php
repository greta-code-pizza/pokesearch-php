<?php
$name = $_POST["search"];

$bulbasaur = [
  "id" => 1,
  "name" => "bulbasaur"
];
$blastoise = [
  "id" => 9,
  "name" => "blastoise"
];
$butterfree = [
  "id" => 12,
  "name" => "butterfree"
];


$all = [$bulbasaur, $blastoise, $butterfree];
$pokemons = [];

foreach($all as $pokemon) {
  $length = strlen($name);

  if(substr($pokemon["name"], 0, $length) === $name) {
    array_push($pokemons, $pokemon);
  }
}

require('./index.php');
