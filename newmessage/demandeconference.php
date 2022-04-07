<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de conférence</title>
</head>
<body>


<h1>Formulaire DEMANDE DE CONFERENCE</h1>



<form action="/docnum/second_xml.php" method="post"> 
    <input name="demandeconference" type="hidden" value="true" >


ID  du message: <input type="number" name="id_message"><br>
Durée de validitée du message : <input type="number" name="dureevaliditee"><br><br>



ID : <input type="number" name="id"><br>
Sujet: <input type="text" name="sujet"><br>
Lieu: <input type="text" name="lieu"><br>
Date: <input type="date" name="date"><br>
Durée de conférence: <input type="text" name="dureeconference"><br>




<input type="submit">




</form>
</body>
</html>