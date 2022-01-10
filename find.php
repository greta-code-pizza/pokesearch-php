<?php

require_once("./Pokemon.php");

session_start();

// Récupère la valeur de l'input search que je stock dans
// $name
$name = $_POST["search"];

// 3 tableaux associatifs contenant deux jeux de clés valeurs :
  // L'id du pokémon pour afficher l'image
  // Le nom du pokémon

//


if($_SESSION['all']) {
  $all = $_SESSION['all'];
} else {
  $bulbasaur = new Pokemon(1, "bulbasaur", "plant", 100);
  $blastoise = new Pokemon(9, "blastoise", "water", 20); 
  $butterfree = new Pokemon(12, "butterfree", "fly", 0); 

  $all = [$bulbasaur, $blastoise, $butterfree];
}

$_SESSION["all"] = $all;

$pokemons = [];

// strlen = string length = taille d'une chaine de caractère
// si $name = "bu" alors strlen($name) => 2
$length = strlen($name);

foreach($all as $pokemon) {
  //$pokemon["name"] => "butterfree"
  // Substring ça permet de récupérer une partie de la chaine de caractère
  //  => 1er param : la chaine de caractère
  // => 2em param : le début de ma chaine 
  // => 3em param : le nombre d'éléments à partir 
  // substr("butterfree", 0, 2) => "bu"

  // 2 éléments à partir de l'indice 0
  // butterfree => ["b", "u", "t", "t", ...] 
  // => "bu"


  if(substr($pokemon->name, 0, $length) === $name) {
    // Ajoute à $pokemons le pokemon courant
    array_push($pokemons, $pokemon);
  }
}

require('./index.php');
