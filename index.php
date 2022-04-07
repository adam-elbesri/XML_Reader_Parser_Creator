<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil </title>
</head>
<body>
<h1> Application Quartier communicantt</h1>

<p>Lire les messages reçus dans le répertoire 
<input type="button" value="Lire" onClick="window.location = 'lecturexml.php'">
</p>



<p>Composer un message 
<input type="button" value="Composer" onClick="window.location = 'ajouter_fichier.php'">
</p>

<p>Voir les messages déjà reçus
<input type="button" value="Voir" onClick="window.location = 'fichierlus.php'">
</p>
</body>
</html>

<?php  $folder_path = "temp_files/";
   
// List of name of files inside
// specified folder
$files = glob($folder_path.'/*'); 
   
// Deleting all the files in the list
foreach($files as $file) {
   
    if(is_file($file)) 
    
        // Delete the given file
        unlink($file); 
}
?>

