<?php
// Déclaration du tableau multidimensionnel pour les matières et les notes
$matieres = [
    "java" => [14, 15],
    "html" => [13, 18],
    "php" => [17, 15]
];

// Fonction pour afficher les données
function affichage($data) {
    foreach ($data as $key => $value) {
        echo "$key : ";
        if (is_array($value)) {
            affichage($value);
        } else {
            echo "$value";
        }
        echo "<br>";
    }
}



// Affichage des matières avec leurs notes
affichage($matieres);

// Déclaration du tableau multidimensionnel pour les étudiants avec leurs notes
$etudiants = [
    "ali" => ["java" => [14, 5], "html" => [13, 15], "php" => [17, 14]],
    "salah" => ["java" => [12, 13], "html" => [10, 14.5], "php" => [13, 4]],
    "sami" => ["java" => [10, 15], "html" => [13.5, 18], "php" => [15, 19]]
];

echo "<hr>";

// Affichage des données des étudiants
affichage($etudiants);

echo "<hr>";

$tab5 = ["java", "html", "js", "css", "angular", "nodejs"];

echo "<table border=1>
<tr>
<th>Nom matiere</th>
</tr>";

// Utilisation de la boucle foreach pour parcourir un tableau
foreach ($tab5 as $matiere) {
    echo "<tr><td>$matiere</td></tr>";
}

echo "</table>";
?>