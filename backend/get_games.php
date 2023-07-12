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

            echo "<h1>Il n'y a pas de jeu</h1>";
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
    $query = "SELECT c.id, c.label, COUNT(j.id) AS nombre_jeux
    FROM console AS c
    INNER JOIN game_console AS g
    ON c.id = g.console_id
    INNER JOIN jeu AS j
    ON g.jeu_id = j.id
    GROUP BY c.id, c.label";

    //on execute la requete
    if ($result = mysqli_query($connection, $query)) {
        //on vérifie si on a des résultats
        if (mysqli_num_rows($result) > 0) {
            //on parcours les resultats
            while ($game = mysqli_fetch_assoc($result)) {  ?>

                <li><a class="dropdown-item" href="../console.php?console_id=<?php echo $game['id'] ?>">

                        <?php echo $game['label'] ?> (<?php echo $game['nombre_jeux'] ?>)
                    </a>
                </li>
<?php
            }
        }
    }
}


function get_console_games_id($game)
{
    //on récupère la connexion à la base de données
    global $connection;
    //on crée la requete sql
    $query = "SELECT j.id, j.titre,j.prix,j.image_path, c.label
    FROM jeu as j 
    INNER JOIN game_console as g 
    on g.jeu_id = j.id 
    INNER JOIN console as c
    on g.console_id = c.id 
    WHERE c.id = ?";

    // Exécution de la requête

    // Vérification des résultats
    if ($stmt = mysqli_prepare($connection, $query)) {
        //on doit binder les parametres
        mysqli_stmt_bind_param(
            $stmt, //on lui donne la requete préparée(la variable qui est devant mysqli_prepare)
            'i', //on lui donne les types de paramètres de chaque ? (i = integer, s = string, d = double)
            $game //on lui donne valeurs des ? dans l'ordre
        );
        //on execute la requete
        if (mysqli_stmt_execute($stmt)) {
            //on récupère le résultat de la requete
            $result = mysqli_stmt_get_result($stmt);
            //on vérifie que l'on a des resultats
            if (mysqli_num_rows($result) > 0) {
                while ($game = mysqli_fetch_assoc($result)) {
                    //ici le rendu html d'un jouet
                    render_games($game);
                }
            }
        }
    }
}

function get_game_detail($game_id)
{
    // Récupération de la connexion à la base de données
    global $connection;

    // Requête SQL pour obtenir les détails du jeu
    // Requête SQL pour obtenir les détails du jeu
    $query = "
    SELECT
        j.image_path,
        j.titre,
        j.description,
        j.date_sortie,
        r.image_path AS image_pegi,
        r.label,
        nm.note_media ,
        nu.note_utilisateur
    FROM
        jeu j
        INNER JOIN restriction_age r ON j.age_id = r.id
        INNER JOIN note nm ON j.note_id = nm.id
        INNER JOIN note nu ON j.note_id = nu.id
    WHERE
        j.id = ?";


    // Exécution de la requête préparée
    if ($stmt = mysqli_prepare($connection, $query)) {
        // Liaison des paramètres
        mysqli_stmt_bind_param($stmt, 'i', $game_id);

        // Exécution de la requête
        if (mysqli_stmt_execute($stmt)) {
            // Récupération des résultats
            $result = mysqli_stmt_get_result($stmt);

            // Vérification des résultats
            if (mysqli_num_rows($result) > 0) {
                while ($game = mysqli_fetch_assoc($result)) {
                    // Appel de la fonction qui affiche les jeux
                    render_game_detail($game);
                }
            }
        }
    }
}


function get_games_by_price_asc()
{
    // Récupération de la connexion à la base de données
    global $connection;

    $query = "SELECT * FROM jeu ORDER BY prix ASC";


    // 3 - Première condition lorsqu'on execute la requête :

    if ($result = mysqli_query($connection, $query)) {
        // 4 - On vérifie que l'on a au moins un résultat :
        if (mysqli_num_rows($result) > 0) {
            // 5 - On passe le résultat dans un tableau associatif avec mysqli_fetch_assoc() :
            while ($game = mysqli_fetch_assoc($result)) {
                // 6 - Ici c'est le rendu HTML
                render_game_by_price($game);
            }
        } else {
            // 7 - Si je n'est pas au moins un résultat, rendu HTML pour informer l'utilisateur

            echo "<h1>Il n'y a pas de jeu</h1>";
        }
    } else {
        // 8 - Ici on gère l'erreur si la connexion n'est pas bonne ou la requête est mal écrite
        die("Erreur dans la requête SQL : $query");
    }
}


function get_games_by_price_desc()
{
    // Récupération de la connexion à la base de données
    global $connection;

    $query = "SELECT * FROM jeu ORDER BY prix DESC";


    // 3 - Première condition lorsqu'on execute la requête :

    if ($result = mysqli_query($connection, $query)) {
        // 4 - On vérifie que l'on a au moins un résultat :
        if (mysqli_num_rows($result) > 0) {
            // 5 - On passe le résultat dans un tableau associatif avec mysqli_fetch_assoc() :
            while ($game = mysqli_fetch_assoc($result)) {
                // 6 - Ici c'est le rendu HTML
                render_game_by_price($game);
            }
        } else {
            // 7 - Si je n'est pas au moins un résultat, rendu HTML pour informer l'utilisateur

            echo "<h1>Il n'y a pas de jeu</h1>";
        }
    } else {
        // 8 - Ici on gère l'erreur si la connexion n'est pas bonne ou la requête est mal écrite
        die("Erreur dans la requête SQL : $query");
    }
}


function get_and_search_all_games() {

    global $connection;

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
  
    // Requête SQL pour rechercher les jeux correspondants
    $query = "SELECT * FROM jeu WHERE titre LIKE '%" . $searchTerm . "%'";
  
    // Exécutez la requête et récupérez les jeux correspondants
   
//on execute la requete
if ($result = mysqli_query($connection, $query)) {
    //on vérifie si on a des résultats
    if (mysqli_num_rows($result) > 0) {
        //on parcours les resultats
        while ($game = mysqli_fetch_assoc($result)) {  
            //ici le rendu d jouet
            render_games($game);
            }
        } else {
            // 7 - Si je n'est pas au moins un résultat, rendu HTML pour informer l'utilisateur

            echo "<h1>Il n'y a pas de jeu correspondant</h1>";
        }
            
        }
    }
