<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse demande de conférence</title>
</head>
<body>


<h1>Demandes déjà reçues</h1>
<?php     
$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "SELECT * from  demandeconference";
        $statement = $connect->prepare($query);
        $statement->execute();
        $demandes = $statement->fetchAll();
        echo "<table>";
        echo " <tr>
            <th>Id message</th>
            <th>Id</th>
            <th>Sujet</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>Durée conférence</th>
        </tr>";
        foreach($demandes as $demande){
            echo " <tr>
            <th>".$demande['id_message']."</th>
            <th>".$demande['id']."</th>
            <th>".$demande['sujet']."</th>
            <th>".$demande['lieu']."</th>
            <th>".$demande['date']."</th>
            <th>Durée ".$demande['dureeConference']."</th>
            </tr>";
        }
        echo "</table>";


        ?>

<h1>Formulaire Réponse DEMANDE DE CONFERENCE</h1>



<form action="first_xml.php" method="post"> 
    <input name="reponseconference" type="hidden" value="true" >
Destinataire : <input type="text" name="destinataire"><br>

ID  du message: <input type="number" name="id_message"><br>
Durée de validitée du message : <input type="number" name="dureevaliditee"><br><br>

ID message précédent : <input type="number" name="id"><br>
Reponse : <input type="text" name="reponse"> <br>





<input type="submit">




</form>
</body>
</html>