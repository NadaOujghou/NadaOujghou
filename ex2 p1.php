<?php
$result = '';
$error = '';
$operand1 = '';
$operand2 = '';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des opérandes et de l'opération
    $operand1 = isset($_POST['operand1']) ? floatval($_POST['operand1']) : 0; //operateur ternaire
    $operand2 = isset($_POST['operand2']) ? floatval($_POST['operand2']) : 0;
    $operation = $_POST['operation'];

    // Vérification de la division par 0
    if ($operation === 'division' && $operand2 == 0) {
        $error = "Erreur : Division par zéro n'est pas autorisée.";
    } else {
        // Calcul en fonction de l'opération choisie
        switch ($operation) {
            case 'addition':
                $result = $operand1 + $operand2;
                break;
            case 'soustraction':
                $result = $operand1 - $operand2;
                break;
            case 'multiplication':
                $result = $operand1 * $operand2;
                break;
            case 'division':
                $result = $operand1 / $operand2;
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Simple</title>
</head>
<body>
    <h1>Calculatrice Simple</h1>
    
    <form method="post">
        <label for="operand1">Premier opérande:</label>
        <input type="number" name="operand1" id="operand1" value="<?php echo htmlspecialchars($operand1); ?>" required><br>

        <label>Opération:</label><br>
        <label><input type="radio" name="operation" value="addition" required <?php echo (isset($operation) && $operation == 'addition') ? 'checked' : ''; ?>> Addition</label><br>
        <label><input type="radio" name="operation" value="soustraction" <?php echo (isset($operation) && $operation == 'soustraction') ? 'checked' : ''; ?>> Soustraction</label><br>
        <label><input type="radio" name="operation" value="multiplication" <?php echo (isset($operation) && $operation == 'multiplication') ? 'checked' : ''; ?>> Multiplication</label><br>
        <label><input type="radio" name="operation" value="division" <?php echo (isset($operation) && $operation == 'division') ? 'checked' : ''; ?>> Division</label><br>

        <label for="operand2">Deuxième opérande:</label>
        <input type="number" name="operand2" id="operand2" value="<?php echo htmlspecialchars($operand2); ?>" required><br>

        <button type="submit">Calculer</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php elseif ($result !== ''): ?>
        <p>Le résultat est: <?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>
