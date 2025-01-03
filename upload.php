<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Choisissez un fichier à télécharger :</label>
        <input type="hidden" name=MAX_FILE_SIZE value="100000">
        <input type="file"  name="photo" >
        <input type="submit" name="ok" value="Telecharger votre fichier">
    </form>
</body>
</html>
<?php
if(isset($_POST['ok'])){
    $dossier='fichier/';
    $fichier=basename($_FILES['photo']['name']);
    
    // Remplacement des caractères accentués par des caractères non accentués
    $fichier = strtr($fichier, [
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
        'à' => 'a', 'â' => 'a', 'ä' => 'a',
        'ô' => 'o', 'ö' => 'o',
        'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'ç' => 'c'
    ]);

    // Remplacement de tous les caractères spéciaux par des caractères non spéciaux
    $fichier = preg_replace('/[^a-zA-Z0-9._-]/', '_', $fichier); // Remplace les caractères spéciaux par un underscore
                            // le motif    remplacent  sujet   
    // Vérification de l'extension du fichier
    $extension = pathinfo($fichier, PATHINFO_EXTENSION);
    $extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif']; // Ajoutez les extensions autorisées ici

    if(in_array($extension, $extensions_autorisees)){
        // Vérification de la taille du fichier
        if(filesize($_FILES['photo']['tmp_name']) <= 100000 ){
            // echo"erreur1";
            //var_dump($_FILES['photo']);

            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.$fichier))
                echo "SUCCES";
            else 
                echo "erreur lors du téléchargement.";
        } else {
            echo "Le fichier est trop lourd.";
        }
    } else {
        echo "Extension non autorisée.";
    }
}
?>