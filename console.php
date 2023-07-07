<?php require_once './backend/config.php' ?>

<?php require_once './backend/get_games.php' ?>
<?php require_once './render_game.php' ?>


<?php require_once './template/header.php' ?>
<?php require_once './template/navbar.php';
?>
<?php $game = intval($_GET['console_id']) ?>
<div class="d-flex flex-wrap justify-content-center gap-4 ">
    <?php
    get_console_games_id($game);
    ?>
</div>

<?php require_once './template/footer.php' ?>