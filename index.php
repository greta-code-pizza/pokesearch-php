<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokesearch</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <img id="logo" src="logo.png" alt="logo pokedex" />

  <form action="find.php" method="post">
    <input type="text" name="search" id="searchbar" />
    <input type="submit" value="Afficher les pokemons trouvés">
  </form>

  <?php if(isset($pokemons)) { ?>
      <div id="searchlist" >
        <ul id='ulSearchlist'>
          <?php foreach($pokemons as $pokemon) { ?>
            <li class=<?= $pokemon->isAlive() ? "alive" : "dead"; ?>>
              <img src=<?= $pokemon->image(); ?> />
              <a href="#"><?= $pokemon->about(); ?></a>

              <?php if($pokemon->isAlive() && $pokemon->isHealable()) { ?>
                <br/>
                <a href="./action.php?id=<?= $pokemon->id ?>&action=heal">Soigner !</a>
              <?php }; ?>

              <?php if($pokemon->isAlive()) { ?>
                <br/>
                <a class="btn-box" href="./action.php?id=<?= $pokemon->id ?>&action=sufferDamage">Cogner !</a>
              <?php }; ?>

            </li>  
          <?php }; ?>
        </ul>
    </div>
  <?php }; ?>
</body>
</html>
