<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur de monnaie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 300px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Convertisseur de monnaie</h2>
        <form action="" method="POST">
            <label for="amount">Dirham: </label>
            <input type="number" id="amount" name="amount" step="0.01" required value="1">
            
            <label for="currency">Convertir en: </label>
            <select id="currency" name="currency">
                <option value="EUR">Euro (EUR)</option>
                <option value="USD">Dollar US (USD)</option>
            </select>
            
            <input type="submit" name="convert" value="convertir">
        </form>

        <?php
        if (isset($_POST['convert'])) {
            $amount = $_POST['amount'];
            $currency = $_POST['currency'];

            // Taux de conversion (exemple)
            $rate_EUR = 0.1; // 1 Dirham = 0.1 Euro
            $rate_USD = 0.11; // 1 Dirham = 0.11 USD

            $result = 0;
            if ($currency == "EUR") {
                $result = $amount * $rate_EUR;
            } elseif ($currency == "USD") {
                $result = $amount * $rate_USD;
            }

            echo "<div class='result'>Résultat: " . number_format($result, 2) . " " . $currency . "</div>";
        }
        ?>
    </div>
</body>
</html>