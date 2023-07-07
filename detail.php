<?php require_once './backend/config.php' ?>
<?php require_once './backend/get_games.php' ?>
<?php require_once './render_game.php' ?>
<?php require_once './template/header.php' ?>
<?php require_once './template/navbar.php' ?>

<?php
$game_id = intval($_GET['game_id']);

?>

<div class="d-flex flex-wrap justify-content-center gap-4 col-md-10">
    <?php get_game_detail($game_id); ?>
</div>

<?php require_once './template/footer.php' ?>