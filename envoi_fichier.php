<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINAL</title>
</head>
<body>
    <h1>FINAL FILES </h1>

    		<input type=button onclick=window.location.href="/docnum/index"; value=Accueil creer un fichier />

</body>
</html>

<?php
$files = scandir('temp_files/', SCANDIR_SORT_DESCENDING);
$newest_file = $files[0];
$destinationFilePath="final_files/".$newest_file;
$file="temp_files/".$newest_file;
$string=file_get_contents($file);
$substring=substr_count($string, "</message>");
echo " il ya auant de message : ".$substring."<br>";
$fp = fopen($file,'a');

$xmldoc="";
$xmldoc .= "<nbMessages>".$substring."</nbMessages>".PHP_EOL;
$xmldoc .= "</fichierGlobal>";

fwrite($fp, $xmldoc);
fclose($fp);
//deplacer fichier

if( !rename($file, $destinationFilePath) ) {  
    echo "Le fichier n'a pas été déplacé dans /final_files!";  
    }  
    else {  
    echo "Le ficier".$file." a été deplacé dans /final_files";  
    }




//ajouter les messages à la bdd de composition
// reponses aux fichier reçu
// tester  non ascii chars
// tester if périmé ac des additions de date

?>


