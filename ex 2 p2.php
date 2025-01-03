<?php
// Initialisation des variables
$result = 0;
$operand1 = '';
$operand2 = '';
$operation = '';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $operation = $_POST['operation'];

    // Tableau associatif pour les opérations
    $operations = [
        'addition' => function($a, $b) { return $a + $b; },
        'soustraction' => function($a, $b) { return $a - $b; },
        'multiplication' => function($a, $b) { return $a * $b; },
        'division' => function($a, $b) { return $b != 0 ? $a / $b : 'Erreur : Division par zéro'; }
    ];

    // Effectuer le calcul
    if (array_key_exists($operation, $operations)) {
        $result = $operations[$operation]($operand1, $operand2);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Calculatrice</h1>
        <form method="post" class="mt-4">
            <div class="form-group">
                <input type="number" name="operand1" class="form-control" value="<?php echo htmlspecialchars($result); ?>" required>
            </div>
            <div class="form-group">
                <label>Choisissez une opération :</label><br>
                <div class="form-check">
                    <input type="radio" name="operation" value="addition" class="form-check-input" id="addition" <?php if ($operation == 'addition') echo 'checked'; ?>>
                    <label class="form-check-label" for="addition">Addition (+)</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="operation" value="soustraction" class="form-check-input" id="soustraction" <?php if ($operation == 'soustraction') echo 'checked'; ?>>
                    <label class="form-check-label" for="soustraction">Soustraction (-)</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="operation" value="multiplication" class="form-check-input" id="multiplication" <?php if ($operation == 'multiplication') echo 'checked'; ?>>
                    <label class="form-check-label" for="multiplication">Multiplication (×)</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="operation" value="division" class="form-check-input" id="division" <?php if ($operation == 'division') echo 'checked'; ?>>
                    <label class="form-check-label" for="division">Division (÷)</label>
                </div>
            </div>
            <div class="form-group">
                <input type="number" name="operand2" class="form-control" value="" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calculer</button>
        </form>
      
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
