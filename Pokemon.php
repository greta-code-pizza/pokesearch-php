<?php

class Pokemon {
    private const MAX_HP = 100;

    // Méthode de classe qui concerne les pokémons et pas un pokémon
    public static function find(array $pokemons, string $search):array {
      $res = [];
      $length = strlen($search);

      foreach($pokemons as $pokemon) {
        if(substr($pokemon->name, 0, $length) === $search) {
          // Ajoute à $res le pokemon courant
          array_push($res, $pokemon);
        }
      }

      return $res;
    }

    // ------ 

    public int $id;
    public string $name;
    private string $type;
    private int $hp;

    function __construct(int $id, string $name, string $type, int $hp) {
      $this->id = $id;
      $this->name = $name;
      $this->type = $type;

      if($hp > self::MAX_HP) {
        $this->hp = 100;
      } else {
        $this->hp = $hp;
      }
    }


    public function about():string {
      return $this->name . " est de type " . $this->type . " | " . $this->hp;
    }

    public function image():string {
      return "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . $this->id . ".png";
    }

    public function heal():void {
      $currentHeal = 10;

      if($this->hp < self::MAX_HP - $currentHeal) {
        $this->hp += $currentHeal;
      } else {
        $this->hp = self::MAX_HP;
      }
    }

    public function sufferDamage():void {
      $currentDamage = 10;

      if($this->hp > $currentDamage) {
        $this->hp -= $currentDamage;
      } else {
        $this->hp = 0;
      }
    }

    public function isAlive():bool {
      return $this->hp > 0;
    }

    public function isHealable(): bool {
      return $this->hp !== 100;
    }
  }


