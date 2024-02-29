<?php
session_start();

$tab_mat = [];

if (isset($_GET['action']) && $_GET['action'] == "delmat") {
    unset($_SESSION['tab_mat'][$_GET['jour']][$_GET['heure']]);
    header("location: emploi.php");
}

if (isset($_GET['action']) && $_GET['action'] === "videremploi") {
    unset($_SESSION['tab_mat']);
    header("location: emploi.php");
}

if (isset($_SESSION['tab_mat'])) {
    $tab_mat = ($_SESSION['tab_mat']);
}

if (isset($_POST["submit"])) {
    $jour = $_POST["jour"];
    $heure = $_POST["heure"];
    $matiere = $_POST["matiere"];
    $tab_mat[$jour][$heure] = $matiere;
    $_SESSION['tab_mat'] = $tab_mat;
}

$heures = ['08-09', '09-10', '10-11', '11-12', '12-13', '13-14', '14-15', '15-16', '16-17'];
$jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du temps</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="emploi.php" method="post">
        <label for="jour">Jour</label>
        <select name="jour" id="jour" required>
            <option value="">---Choisir le jour---</option>
            <?php foreach ($jours as $jour) echo "<option value='$jour'>$jour</option>"; ?>
        </select>
        <label for="heure">Heure</label>
        <select name="heure" id="heure" required>
            <option value="">---Choisir l'heure---</option>
            <?php foreach ($heures as $heure) echo "<option value='$heure'>$heure</option>"; ?>
        </select>
        <label for="matiere">Matière</label>
        <input type="text" name="matiere" required>
        <button type="submit" name="submit">Envoyer</button>
        <button type="button" onclick="window.print()">Imprimer emploi</button>
        <button type="button" onclick="window.location.href='emploi.php?action=videremploi'">Nouveau emploi</button>
    </form>
    <hr>

    <h1>Emploi du temps</h1>
    <small><?php echo date("d/m/Y H:i:s"); ?></small>
    <table border="1">
        <tr>
            <td></td>
            <?php foreach ($heures as $heure) echo "<td>$heure</td>"; ?>
        </tr>
        <?php
        foreach ($jours as $jour) {
            echo "<tr><td>$jour</td>";
            foreach ($heures as $heure) {
                if (isset($tab_mat[$jour][$heure])) {
                    echo "<td>" . $tab_mat[$jour][$heure] . "<a href='emploi.php?jour=$jour&heure=$heure&action=delmat'><button>X</button></a></td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
