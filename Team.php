<?php

require_once("./Trainer.php");

class Team {
  private string $name;
  private array $trainers;

  function __construct(string $name, array $trainers) {
    $this->name = $name;
    $this->trainers = $trainers;
  }

  public function infos() {
    return "La team " . $this->name . " est composé de " . $this->trainersNames() . " qui ont " . $this->totalPokemons() . " Pokemons";
  }

  private function totalPokemons(): int {
    $total = 0;

    foreach($this->trainers as $trainer) {
      $total += $trainer->countPokemons();
    }

    return $total;
  }

  private function trainersNames(): string {
    $names = "";

    foreach($this->trainers as $trainer) {
      $names .= $trainer->name . ", ";
    }

    return $names;
  }
}
