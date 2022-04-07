<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse liste de formation</title>
</head>
<body>
    <h1>Demandes déjà reçues</h1>

<?php     
$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "SELECT * from  demandelisteformation";
        $statement = $connect->prepare($query);
        $statement->execute();
        $demandes = $statement->fetchAll();
        echo "<table>";
        echo " <tr>
            <th>Id message</th>
            <th>Id</th>
            <th>Fillière</th>
        </tr>";
        foreach($demandes as $demande){
            echo " <tr>
            <th>".$demande['id_message']."</th>
            <th>".$demande['id']."</th>
            <th>".$demande['filliere']."</th>
             </tr>";
        }
        echo "</table>";


        ?>

<h1>Formulaire réponse liste de formation </h1>



<form action="first_xml.php" method="post"> 
    <input name="reponselisteformation" type="hidden" value="true" >

Destinataire : <input type="text" name="destinataire"><br>

ID  du message: <input type="number" name="id_message"><br>
Durée de validitée du message : <input type="number" name="dureevaliditee"><br><br>

ID message précédent : <input type="number" name="id"><br>
Fillière: <input type="text" name="filliere"><br>
Titre: <input type="text" name="titre"><br>
Description: <input type="text" name="description"><br>






<input type="submit">




</form>
</body>
</html>