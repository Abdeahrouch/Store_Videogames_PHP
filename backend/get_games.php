<?php
function get_all_games()
{

    // 1 - Connexion à la base de données :

    global $connection;

    // 2 - Écrire la requête SQL :

    $query = "SELECT * FROM jeu";



    // 3 - Première condition lorsqu'on execute la requête :

    if ($result = mysqli_query($connection, $query)) {
        // 4 - On vérifie que l'on a au moins un résultat :
        if (mysqli_num_rows($result) > 0) {
            // 5 - On passe le résultat dans un tableau associatif avec mysqli_fetch_assoc() :
            while ($game = mysqli_fetch_assoc($result)) {
                // 6 - Ici c'est le rendu HTML
                render_games($game);
            }
        } else {
            // 7 - Si je n'est pas au moins un résultat, rendu HTML pour informer l'utilisateur

            echo "<h1>Il n'y a pas de jouet</h1>";
        }
    } else {
        // 8 - Ici on gère l'erreur si la connexion n'est pas bonne ou la requête est mal écrite
        die("Erreur dans la requête SQL : $query");
    }
}



function get_games_by_console()
{
    global $connection;
    //on crée la requete
    $query = "SELECT console.name, COUNT(jeu.console_id) AS total
            FROM console
            INNER JOIN jeu
            ON console.id = jeu.console_id
            GROUP BY console.id";

    //on execute la requete
    if ($result = mysqli_query($connection, $query)) {
        //on vérifie si on a des résultats
        if (mysqli_num_rows($result) > 0) {
            //on parcours les resultats
            while ($consoleplusgame = mysqli_fetch_assoc($result)) { ?>

                <li>
                    <a class="dropdown-item" href="../detail.php?console_id=<?php echo $consoleplusgame['id'] ?>">
                        <?php echo $consoleplusgame['name'] ?> ( <?php echo $consoleplusgame['total'] ?> )
                    </a>
                </li>
<?php
            }
        }
    }
}
