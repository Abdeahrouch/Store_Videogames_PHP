<?php require_once './backend/config.php' ?>

<?php require_once './backend/get_games.php' ?>
<?php require_once './render_game.php' ?>


<?php require_once './template/header.php' ?>
<?php require_once './template/navbar.php' ?>

<?php
// Appel de la fonction pour obtenir et afficher les jeux correspondants à la recherche
if (isset($_GET['search'])) {
  get_and_search_all_games();
}
?>

<!-- Formulaire de recherche -->
<form method="GET" action="">
  <input type="text" name="search" placeholder="Rechercher un jeu...">
  <input type="submit" value="Rechercher">
</form>

<!-- Section pour afficher les jeux correspondants -->
<div class="jeux-correspondants">
  <!-- Les jeux correspondants seront affichés ici -->
</div>


<div class=" principal d-flex flex-wrap justify-content-center gap-4 ">

    <?php
    get_all_games();

    ?>
</div>
<?php require_once './template/footer.php' ?>