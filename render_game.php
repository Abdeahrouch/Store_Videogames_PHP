<?php





function render_games($game)

{
    if ($game['prix'] == 0) {
        // Si mon prix est égale à 0 alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon je formate le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }

?>

    <div class="card m-2" style="width: 15rem;">
        <img class="card-img-top game_image" src="../images/games/<?php echo $game['image_path'] ?>" alt="image de <?php echo $game['image_path'] ?>">
        <div class="card-body">
            <h5 class="card-title game_name"><?php echo $game['titre']; ?></h5>
            <p class="card-text game_price"><?php echo $game['prix']; ?></p>
            <a href="../detail.php?game_id=<?php echo $game['id'] ?>" class="btn btn-primary btn-hover btn-sm">Voir détail</a>
        </div>

    </div>

<?php

}


function render_game_by_console($game)
{
    // Accéder aux valeurs spécifiques du jeu
    $console_label = $game['console_label'];
    $game_count = $game['game_count'];

?>

    <div class="card m-2" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $console_label; ?></h5>
            <p class="card-text"> <?php echo $game_count; ?></p>
        </div>
    </div>
<?php

}

function render_game_detail($game)
{
?>
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4">
                <img class="rounded-start game_img" src="../images/games/<?php echo $game['image_path'] ?>" alt="Image de <?php echo $game['titre']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $game['titre'] ?></h5>
                    <p class="card-text fw-bold game_description"><?php echo $game['description'] ?></p>
                    <p class="card-text game_date">Date de sortie : <?php echo $game['date_sortie'] ?></p>
                    <p class="card-text "><img class="game_age" src="../images/pegi/<?php echo $game['image_pegi']; ?> " alt=" <?php echo $game['label']; ?>"> age: <?php echo $game['label']; ?>+</p>
                    <div class="div-avis">
                        <p class="card-text game_avis">Avis de presse : <?php echo $game['note_media'] ?></p>
                        <p class="card-text game_avis_user">Avis d'utilisateur : <?php echo $game['note_utilisateur'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
