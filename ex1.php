<?php
// Initialisation des points et du coût
$points = 100;
$permis_coute = 1000;
$cout_total = 0; // coût total qui sera calculé plus tard.
 
// Tableau associatif pour les victimes et leurs points
$victim_points = [
    'poule' => 1,
    'chien' => 3,
    'vache' => 5,
    'meilleurami' => 10
];

// Vérification si le formulaire a été soumis
if (isset($_POST['submit'])) {
    $points_perdus = 0;

    // Calcul des points perdus
    foreach ($victim_points as $victim => $point) {
        $quantity = isset($_POST[$victim]) ? (int)$_POST[$victim] : 0; // Récupération de la quantité
        $points_perdus += $quantity * $point; // Calcul des points perdus
    }

    // Calcul des points restants
    $points -= $points_perdus;

    // Calcul du nombre de permis supplémentaires nécessaires
    if ($points < 100) {
        $permis_necessaires = ceil((100 - $points) / 100);
        $cout_total = $permis_necessaires * $permis_coute;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Chasse</title>
</head>
<body>
    <h1>Formulaire de Chasse</h1>
    <form method="post">
        <label for="poule">Nombre de poules :</label>
        <input type="number" name="poule" min="0" value="0"><br><br>

        <label for="chien">Nombre de chiens :</label>
        <input type="number" name="chien" min="0" value="0"><br><br>

        <label for="vache">Nombre de vaches :</label>
        <input type="number" name="vache" min="0" value="0"><br><br>

        <label for="meilleurami">Nombre de meilleurs amis :</label>
        <input type="number" name="meilleurami" min="0" value="0"><br><br>

        <input type="submit" name="submit" value="Calculer">
    </form>

    <?php if (isset($cout_total)): ?>
        <h2>Résultats</h2>
        <p>Points restants : <?php echo $points; ?></p>
        <p>Permis supplémentaires nécessaires : <?php echo isset($permis_necessaires) ? $permis_necessaires : 0; ?></p>
        <p>Coût total : <?php echo $cout_total; ?> francs</p>
    <?php endif; ?>
</body>
</html>