<?php

require_once("./Pokemon.php");
require_once("./Trainer.php");
require_once("./Team.php");

session_start();

// Récupère la valeur de l'input search que je stock dans
// $name
$name = $_POST["search"];

// 3 tableaux associatifs contenant deux jeux de clés valeurs :
  // L'id du pokémon pour afficher l'image
  // Le nom du pokémon

$bulbasaur = new Pokemon(1, "bulbasaur", "plant", 100);
$blastoise = new Pokemon(9, "blastoise", "water", 20); 
$butterfree = new Pokemon(12, "butterfree", "fly", 0); 

$sashaPkm = [$bulbasaur, $blastoise];
$regisPkm = [$butterfree];

$all = [...$sashaPkm, ...$regisPkm];


if(isset($_SESSION['all'])) {
  $all = $_SESSION['all'];
} 

  // Version avec des dresseurs pokemons
  //
  // $sashaPokemons = [$bulbasaur, $blastoise];
  // $totoPokemons = [$butterfree];

  // $sasha = new Trainer("sasha", $sashaPokemons);
  // $toto = new Trainer("toto", $totoPokemons);

  // $all = [...$sashaPokemons, ...$totoPokemons];


$_SESSION["all"] = $all;

$sasha = new Trainer("sasha", $sashaPkm);
$regis = new Trainer("regis", $regisPkm);

$team = new Team("Wtf", [$sasha, $regis]);

$pokemons = Pokemon::find($all, $name);


require('./index.php');
