<?php
require_once './backend/config.php';
require_once './template/header.php';
require_once './template/navbar.php';

// Effectuez une requête SQL pour récupérer tous les jeux de la table "jeu"
$query = "SELECT * FROM jeu";

// Exécutez la requête et récupérez les résultats
$result = mysqli_query($connection, $query);

if ($result) {
    // Vérifiez si des jeux existent dans la base de données
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        // Parcourez les jeux et affichez-les
        while ($game = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<a href='game_details.php?id={$game['id']}'>";
            echo $game['titre'];
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun jeu trouvé.";
    }
} else {
    echo "Erreur de requête : " . mysqli_error($connection);
}

require_once './template/_footer.php';
?>
