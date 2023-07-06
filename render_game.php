<?php


function render_games($game)
{
    if ($game['prix'] == 0) {
        // Si le prix est égal à zéro, alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon, formater le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }
?>
    <div class="card m-2" style="width: 15rem;">
        <img class="card-img-top game_image" src="../images/games/<?php echo $game['image_path'] ?>" alt="image de <?php echo $game['image_path'] ?>">
        <div class="card-body">
            <h5 class="card-title game_name"><?php echo $game['titre']; ?></h5>
            <p class="card-text game_price"><?php echo (intval($game['prix']) / 100) ?>€</p>
            <a href="../detail.php?toy_id=<?php echo $game['id'] ?>" class="btn btn-primary btn-hover btn-sm">Voir détail</a>
        </div>
    </div>
<?php
}



function render_games_by_console($game)
{
    if ($game['prix'] == 0) {
        // Si le prix est égal à zéro, alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon, formater le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }
?>
    <div class="card m-2" style="width: 15rem;">
        <img class="card-img-top game_image" src="../images/games/<?php echo $game['image_path'] ?>" alt="image de <?php echo $game['image_path'] ?>">
        <div class="card-body">
            <h5 class="card-title game_name"><?php echo $game['titre']; ?></h5>
            <p class="card-text game_price"><?php echo (intval($game['prix']) / 100) ?>€</p>
            <a href="../detail.php?toy_id=<?php echo $game['id'] ?>" class="btn btn-primary btn-hover btn-sm">Voir détail</a>
        </div>
    </div>
<?php
}
