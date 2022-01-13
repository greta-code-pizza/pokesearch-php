<?php

require_once("./Pokemon.php");

class Trainer {
  public string $name;
  public array $pokemons;

  function __construct(string $name, array $pokemons) {
    $this->name = $name;
    $this->pokemons = $pokemons;
  }

  public function infos(): string {
    return $this->name . " dresse " . $this->numberOfPokemons() . " Pokemons";
  }

  public function countPokemons(): int {
    return count($this->pokemons);
  }
}
