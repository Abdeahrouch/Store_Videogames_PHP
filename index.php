<?php require_once './backend/config.php' ?>

<?php require_once './backend/get_games.php' ?>
<?php require_once './render_game.php' ?>


<?php require_once './template/header.php' ?>
<?php require_once './template/navbar.php' ?>

<div class="d-flex flex-wrap justify-content-center gap-4 ">

    <?php
    get_all_games();

    ?>
</div>
<?php require_once './template/footer.php' ?>