<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création fichier</title>
</head>
<body>
    <h1> Quel message voulez-vous composer ?</h1>

<p>Composer une demande de conference
<input type="button" value="Composer" onClick="window.location = 'demandeconference.php'">
</p>
<p>Composer une reponse de conference
<input type="button" value="Composer" onClick="window.location = 'reponseconference.php'">
</p>
<p>Composer une reponse a une liste de formation
<input type="button" value="Composer" onClick="window.location = 'reponselisteformation.php'">
</p>
<p>Composer une reponse de stage
<input type="button" value="Composer" onClick="window.location = 'reponsestage.php'">
</p>

</body>
</html>

<?php
$date=getdate();
$id="ID".$date['year'].$date['mon'].$date['mday'].$date['hours'].$date['minutes'].$date['seconds'];
$filename=$date['year']."_".$date['mon']."_".$date['mday']."-".$date['hours']."h".$date['minutes']."m".$date['seconds']."s.xml";
echo $filename;
$filename="temp_files/".$filename;
$dtd=file_get_contents('dtd.xml');
$f=fopen($filename,"w");
fwrite($f,$dtd);
fclose($f);

$id="<fichierGlobal id=".$id.">/";
//echo "<br> ID EST : ".$id;

?>