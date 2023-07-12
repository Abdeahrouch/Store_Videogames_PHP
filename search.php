<?php require_once './backend/config.php' ?>
<?php require_once './backend/get_games.php' ?>
<?php require_once './render_game.php' ?>
<?php require_once './template/header.php' ?>
<?php require_once './template/navbar.php' ?>
<?php




$matchingGames = [];

if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];

  // Appel de la fonction pour obtenir les jeux correspondants à la recherche
  $matchingGames = get_and_search_all_games($searchTerm);
}

if (!empty($matchingGames)) {
  foreach ($matchingGames as $game) {
    if ($game['disponible']) {
      echo $game['nom'] . "<br>";
    }
  }
}
?>