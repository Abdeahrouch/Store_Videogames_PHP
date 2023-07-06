<?php
function get_stores()
{
    global $connection;
    //on crée la requete
    $query = "SELECT * FROM jeu";

    //on execute la requete
    if ($result = mysqli_query($connection, $query)) {
        //on vérifie si on a des résultats
        if (mysqli_num_rows($result) > 0) {
            //on parcours les resultats
            while ($game = mysqli_fetch_assoc($result)) { ?>

                <li>
                    <a class="dropdown-item" href="game_details.php?id=<?php echo $game['id'] ?>">
                        <?php echo $game['titre']; ?>
                    </a>
                </li>
<?php
            }
        }
    }
}
?>
