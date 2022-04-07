<?php
$files = scandir('temp_files/', SCANDIR_SORT_DESCENDING);
$newest_file = $files[0];
$file="temp_files/".$newest_file;
$date=getdate();
$dateEnvoi=$date['mday']."-".$date['mon']."-".$date['year'];
$id_fichier="ID".$date['year'].$date['mon'].$date['mday'].$date['hours'].$date['minutes'].$date['seconds'];
// DEMANDE CONFERENCE ////////////////////
if(isset($_POST['demandeconference'])){
echo "Le fichier XML est dans le dossier messagecreated";
$id = $_POST['id'];
$id_message = $_POST['id_message'];
$dureevaliditee = $_POST['dureevaliditee'];

$sujet = $_POST['sujet'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];
$dureeconference = $_POST['dureeconference'];

$rootELementStart = "<demandeConference>";
$rootElementEnd = "</demandeConference>";
$xml_doc="";

$xml_doc .= "<message id=\"".$id_message."\">".PHP_EOL;
$xml_doc .= "<dateEnvoi>".$dateEnvoi." </dateEnvoi>".PHP_EOL;
$xml_doc .= "<dureeValidite>".$dureevaliditee." </dureeValidite>".PHP_EOL;
$xml_doc .= "<typeMessage>".PHP_EOL;
$xml_doc .= $rootELementStart.PHP_EOL;
$xml_doc .= "<conf>".PHP_EOL;
$xml_doc .= "<id>".PHP_EOL;
$xml_doc .= $id.PHP_EOL;
$xml_doc .= "</id>".PHP_EOL;
$xml_doc .= "<sujet>".PHP_EOL;
$xml_doc .= $sujet.PHP_EOL;
$xml_doc .= "</sujet>".PHP_EOL;
$xml_doc .= "<lieu>".PHP_EOL;
$xml_doc .= $lieu.PHP_EOL;
$xml_doc .= "</lieu>".PHP_EOL;
$xml_doc .= "<date>".PHP_EOL;
$xml_doc .= $date.PHP_EOL;
$xml_doc .= "</date>".PHP_EOL;
$xml_doc .= "<dureeConference>".PHP_EOL;
$xml_doc .= $dureeconference.PHP_EOL;
$xml_doc .= "</dureeConference>".PHP_EOL;
$xml_doc .= "</conf>".PHP_EOL;
$xml_doc .= $rootElementEnd.PHP_EOL;
$xml_doc .= "</typeMessage>".PHP_EOL;
$xml_doc .= "</message>".PHP_EOL.PHP_EOL;


$fp = fopen($file,'a');
$write = fwrite($fp,$xml_doc);
$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "INSERT INTO creation_demandeconference
        (id, id_message, sujet, lieu, date, dureeConference) 
        VALUES(:id, :id_message, :sujet, :lieu, :date, :dureeConference);
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
            ':id'   => $id,
            ':id_message'   => $id_message,
            ':sujet'  => $sujet,
            ':lieu'  => $lieu,
            ':date' => $date,
            ':dureeConference'   => $dureeconference
            )
            );

} 




/////// REPONSE CONFERENCE //////////
if(isset($_POST['reponseconference'])){
echo "Le fichier XML est dans le dossier messagecreated";
$id = $_POST['id'];
$id_message = $_POST['id_message'];
$dureevaliditee = $_POST['dureevaliditee'];
$reponse = $_POST['reponse'];

$rootELementStart = "<reponseConference>";
$rootElementEnd = "</reponseConference>";
$xml_doc="";
$xml_doc .= "<message id=\"".$id_message."\">".PHP_EOL;
$xml_doc .= "<dateEnvoi>".$dateEnvoi." </dateEnvoi>".PHP_EOL;
$xml_doc .= "<dureeValidite>".$dureevaliditee." </dureeValidite>".PHP_EOL;
$xml_doc .= "<typeMessage>".PHP_EOL;

$xml_doc .= $rootELementStart.PHP_EOL;
$xml_doc .= "<reponseGenerique>".PHP_EOL;
$xml_doc .= "<idMsgPrecedent>".PHP_EOL;
$xml_doc .= $id.PHP_EOL;
$xml_doc .= "</idMsgPrecedent>".PHP_EOL;
$xml_doc .= "<msg>".PHP_EOL;
$xml_doc .= $reponse.PHP_EOL;
$xml_doc .= "</msg>".PHP_EOL;
$xml_doc .= "</reponseGenerique>".PHP_EOL;
$xml_doc .= $rootElementEnd.PHP_EOL;
$xml_doc .= "</typeMessage>".PHP_EOL;
$xml_doc .= "</message>".PHP_EOL.PHP_EOL;

$default_dir = "messagecreated/reponseconference_";
$default_dir .= $default_dir .".xml";
$fp = fopen($file,'a');
$write = fwrite($fp,$xml_doc);
fclose($fp);
$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "INSERT INTO creation_reponseconference
        (id_message, id_message_precedent, message) 
        VALUES(:id_message, :id_message_precedent, :message);
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
            ':id_message'   => $id_message,
            ':id_message_precedent'   => $id,
            ':message'  => $reponse,
            )
            );

} 

/////// REPONSE stage //////////
if(isset($_POST['reponsestage'])){
echo "Le fichier XML est dans le dossier messagecreated";
$id = $_POST['id'];
$id_message = $_POST['id_message'];
$dureevaliditee = $_POST['dureevaliditee'];
$objet = $_POST['objet'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$datedenaissance = $_POST['datedenaissance'];
$lieudenaissance = $_POST['lieudenaissance'];
$lieuresidence = $_POST['lieuderesidence'];
$photo = $_POST['photo'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$titre_formation = $_POST['titre_formation'];
$date_formation = $_POST['date_formation'];
$lieu_formation = $_POST['lieu_formation'];
$mention_formation = $_POST['mention_formation'];
$description_formation = $_POST['description_formation'];
$titre_experience = $_POST['titre_experience'];
$date_experience = $_POST['date_experience'];
$lieu_experience = $_POST['lieu_experience'];
$fonction_experience = $_POST['fonction_experience'];
$description_experience = $_POST['description_experience'];
$description_generale = $_POST['description_generale'];

$rootELementStart = "<reponseStage>";
$rootElementEnd = "</reponseStage>";
$xml_doc="";



$xml_doc .= "<message id=\"".$id_message."\">".PHP_EOL;
$xml_doc .= "<dateEnvoi>".$dateEnvoi." </dateEnvoi>".PHP_EOL;
$xml_doc .= "<dureeValidite>".$dureevaliditee." </dureeValidite>".PHP_EOL;
$xml_doc .= "<typeMessage>".PHP_EOL;

$xml_doc .= $rootELementStart.PHP_EOL;
$xml_doc .= "<stage>".PHP_EOL;
$xml_doc .= "<id>".PHP_EOL;
$xml_doc .= $id.PHP_EOL;
$xml_doc .= "</id>".PHP_EOL;
$xml_doc .= "<objet>".PHP_EOL;
$xml_doc .= $objet.PHP_EOL;
$xml_doc .= "</objet>".PHP_EOL;
$xml_doc .= "<cv>".PHP_EOL;

$xml_doc .= "<nom>".PHP_EOL;
$xml_doc .= $nom.PHP_EOL;
$xml_doc .= "</nom>".PHP_EOL;

$xml_doc .= "<prenom>".PHP_EOL;
$xml_doc .= $prenom.PHP_EOL;
$xml_doc .= "</prenom>".PHP_EOL;
$xml_doc .= "<dateNaissance>".PHP_EOL;
$xml_doc .= $datedenaissance.PHP_EOL;
$xml_doc .= "</dateNaissance>".PHP_EOL;
$xml_doc .= "<lieuNaissance>".PHP_EOL;
$xml_doc .= $lieudenaissance.PHP_EOL;
$xml_doc .= "</lieuNaissance>".PHP_EOL;
$xml_doc .= "<photo>".PHP_EOL;
$xml_doc .= $photo.PHP_EOL;
$xml_doc .= "</photo>".PHP_EOL;
$xml_doc .= "<email>".PHP_EOL;
$xml_doc .= $email.PHP_EOL;
$xml_doc .= "</email>".PHP_EOL;
$xml_doc .= "<telephone>".PHP_EOL;
$xml_doc .= $telephone.PHP_EOL;
$xml_doc .= "</telephone>".PHP_EOL;

$xml_doc .= "</cv>".PHP_EOL;

$xml_doc .= "<formation>".PHP_EOL;

$xml_doc .= "<titre_formation>".PHP_EOL;
$xml_doc .= $titre_formation.PHP_EOL;
$xml_doc .= "</titre_formation>".PHP_EOL;
$xml_doc .= "<date_formation>".PHP_EOL;
$xml_doc .= $date_formation.PHP_EOL;
$xml_doc .= "</date_formation>".PHP_EOL;
$xml_doc .= "<lieu_formation>".PHP_EOL;
$xml_doc .= $lieu_formation.PHP_EOL;
$xml_doc .= "</lieu_formation>".PHP_EOL;
$xml_doc .= "<mention_formation>".PHP_EOL;
$xml_doc .= $mention_formation.PHP_EOL;
$xml_doc .= "</mention_formation>".PHP_EOL;
$xml_doc .= "<description_formation>".PHP_EOL;
$xml_doc .= $description_formation.PHP_EOL;
$xml_doc .= "</description_formation>".PHP_EOL;

$xml_doc .= "</formation>".PHP_EOL;


$xml_doc .= "<experience>".PHP_EOL;

$xml_doc .= "<titre_experience>".PHP_EOL;
$xml_doc .= $titre_experience.PHP_EOL;
$xml_doc .= "</titre_experience>".PHP_EOL;
$xml_doc .= "<date_experience>".PHP_EOL;
$xml_doc .= $date_experience.PHP_EOL;
$xml_doc .= "</date_experience>".PHP_EOL;
$xml_doc .= "<lieu_experience>".PHP_EOL;
$xml_doc .= $lieu_experience.PHP_EOL;
$xml_doc .= "</lieu_experience>".PHP_EOL;
$xml_doc .= "<fonction_experience>".PHP_EOL;
$xml_doc .= $fonction_experience.PHP_EOL;
$xml_doc .= "</fonction_experience>".PHP_EOL;
$xml_doc .= "<description_experience>".PHP_EOL;
$xml_doc .= $description_experience.PHP_EOL;
$xml_doc .= "</description_experience>".PHP_EOL;

$xml_doc .= "</experience>".PHP_EOL;

$xml_doc .= "<description_generale>".PHP_EOL;
$xml_doc .= $description_generale.PHP_EOL;
$xml_doc .= "</description_generale>".PHP_EOL;




$xml_doc .= "</stage>".PHP_EOL;
$xml_doc .= $rootElementEnd.PHP_EOL;
$xml_doc .= "</typeMessage>".PHP_EOL;
$xml_doc .= "</message>".PHP_EOL.PHP_EOL;


$fp = fopen($file,'a');
$write = fwrite($fp,$xml_doc);

} 

/////// REPONSE     Liste de formation  //////////
if(isset($_POST['reponselisteformation'])){
echo "Le fichier XML est dans le dossier messagecreated";

$id = $_POST['id'];

$id_message = $_POST['id_message'];
$dureevaliditee = $_POST['dureevaliditee'];
$titre = $_POST['titre'];
$description = $_POST['description'];
$filliere= $_POST['filliere'];

$rootELementStart = "<reponseListeFormation>";
$rootElementEnd = "</reponseListeFormation>";
$xml_doc="";



$xml_doc .= "<message id=\"".$id_message."\">".PHP_EOL;
$xml_doc .= "<dateEnvoi>".$dateEnvoi." </dateEnvoi>".PHP_EOL;
$xml_doc .= "<dureeValidite>".$dureevaliditee." </dureeValidite>".PHP_EOL;
$xml_doc .= "<typeMessage>".PHP_EOL;



$xml_doc .= $rootELementStart.PHP_EOL;
$xml_doc .= "<form>".PHP_EOL;

$xml_doc .= "<id>".PHP_EOL;
$xml_doc .= $id.PHP_EOL;
$xml_doc .= "</id>".PHP_EOL;
$xml_doc .= "<filliere>".PHP_EOL;
$xml_doc .= $filliere.PHP_EOL;
$xml_doc .= "</filliere>".PHP_EOL;
$xml_doc .= "<titre>".PHP_EOL;
$xml_doc .= $titre.PHP_EOL;
$xml_doc .= "</titre>".PHP_EOL;
$xml_doc .= "<description>".PHP_EOL;
$xml_doc .= $description.PHP_EOL;
$xml_doc .= "</description>".PHP_EOL;
$xml_doc .= "</form>".PHP_EOL;
$xml_doc .= $rootElementEnd.PHP_EOL;
$xml_doc .= "</typeMessage>".PHP_EOL;
$xml_doc .= "</message>".PHP_EOL.PHP_EOL;




$fp = fopen($file,'a');
$write = fwrite($fp,$xml_doc);

$connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "INSERT INTO creation_reponselisteformation
        (id_message, id_message_precedent, filliere, titre, description) 
        VALUES(:id_message, :id_message_precedent, :filliere, :titre, :description);
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
            ':id_message'   => $id_message,
            ':id_message_precedent'   => $id,
            ':filliere'  => $filliere,
            ':titre'  => $titre,
            ':description'  => $description,
            )
            );

} 








?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<br />
	<br />
	
		<input type=button onclick=window.location.href="/docnum/ajouter_message"; value=Ajouter Ajouter un autre message />
		<br><br>
        <input type=button onclick=window.location.href="/docnum/envoi_fichier"; value=ENVOI Envoyer le fichier />
</body>
</html>