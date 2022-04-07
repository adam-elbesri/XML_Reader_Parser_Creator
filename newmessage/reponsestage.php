<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse stage </title>
</head>
<body>
    <h1>Demandes déjà reçues</h1>

    <?php     
$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "SELECT * from  demandestage";
        $statement = $connect->prepare($query);
        $statement->execute();
        $demandes = $statement->fetchAll();
        echo "<table>";
        echo " <tr>
            <th>Id message</th>
            <th>Id</th>
            <th>Objet</th>
            <th>Description</th>
            <th>Lieu</th>
            <th>Rémunération</th>
            <th>Date début</th>
            <th>Durée </th>
        </tr>";
        foreach($demandes as $demande){
            echo " <tr>
            <th>".$demande['id_message']."</th>
            <th>".$demande['id']."</th>
            <th>".$demande['objet']."</th>
            <th>".$demande['description']."</th>
            <th>".$demande['lieu']."</th>
            <th>".$demande['remuneration']."</th>
            <th>".$demande['datedebut']."</th>
            <th>".$demande['duree']."</th>
            </tr>";
        }
        echo "</table>";


        ?>


<h1>Formulaire Réponse stage</h1>



<form action="/docnum/second_xml.php" method="post"> 
    <input name="reponsestage" type="hidden" value="true" >



ID  du message: <input type="number" name="id_message"><br>
Durée de validitée du message : <input type="number" name="dureevaliditee"><br><br>


ID message précédent : <input type="number" name="id"><br>
Objet : <input type="text" name="objet"><br>

<p>CV </p>


<p> Etat civil</p>
Nom: <input type="text" name="nom"><br>
Prénom: <input type="text" name="prenom"><br>
Date de naissance : <input type="date" name="datedenaissance"><br>
Lieu de naissance: <input type="text" name="lieudenaissance"><br>
Lieu de résidence: <input type="text" name="lieuderesidence"><br>
Photo: <input type="text" name="photo"><br>
email: <input type="text" name="email"><br>
Téléphone: <input type="number" name="telephone"><br>

<p> Formations</p>

Titre: <input type="text" name="titre_formation"><br>
Date: <input type="date" name="date_formation"><br>
Lieu : <input type="text" name="lieu_formation"><br>
Mention : <input type="text" name="mention_formation"><br>
Description: <br> <textarea type="text" name="description_formation"> </textarea><br>



<p> Experience</p>

Titre: <input type="text" name="titre_experience"><br>
Date: <input type="date" name="date_experience"><br>
Lieu : <input type="text" name="lieu_experience"><br>
Fonction : <input type="text" name="fonction_experience"><br>
Description: <input type="text" name="description_experience"><br>

<p>Description générale </p>
<input type="text" name="description_generale">

<br><br>
<input type="submit">




</form>
</body>
</html>