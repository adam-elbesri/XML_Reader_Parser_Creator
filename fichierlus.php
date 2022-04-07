<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichier déjà lus</title>
</head>
<body>
    <h1> Fichiers déjà lus</h1>
</body>
</html>


<?php
$files = glob("lus/*.xml");
if($files==null)
{
    echo "Aucun fichier déjà lu <br>";
}
foreach($files as $file){

   
        lecture_fichier($file);


     }            




function lecture_message($message)

{
echo " Lecture du message ".$message->typeMessage->children()->getName()." <br>";
$type_de_message=$message->typeMessage->children()->getName();
echo "<br> Date d'envoi du message : ".$message->dateEnvoi."<br>";
echo "Durée de validitée du message : ".$message->dureeValidite."<br><br>";


if($type_de_message=="demandeConference"){

    $all_conferences=$message->typeMessage->demandeConference->children();
    foreach($all_conferences as $conf){
        echo "Id de la conférence : ".$conf->id."<br>";
        echo "Sujet de la conférence : ".$conf->sujet."<br>";
        echo "Lieu de la conférence : ".$conf->lieu."<br>";
        echo "Date de la conférence : ".$conf->date."<br>";
        echo "Durée de la conférence : ".$conf->dureeConference."<br>";
        echo "<br>";
        		echo "<input type=button onclick=window.location.href='/docnum/reponse/reponseconference.php'; value=Répondre Répondre au messgae />";
echo "<br><br><br>";
        
        

    }

}

if($type_de_message=="demandeListeFormation"){

    $all_formations=$message->typeMessage->demandeListeFormation->children();
    foreach($all_formations as $form){
      
            echo "Id de la formation : ".$form->id."<br>";
            $all_fillieres=$form->branche->children();
            foreach($all_fillieres as $filliere)
            {
                echo "Fillière de la formation : ".$filliere."<br>";
                
            }
                echo "<br>";
        		echo "<input type=button onclick=window.location.href='/docnum/reponse/reponselisteformation.php'; value=Répondre Répondre au messgae />";
                echo "<br><br><br>";             

    }
}

if($type_de_message=="demandeStage"){

    $all_dmStage=$message->typeMessage->demandeStage->children();
    foreach($all_dmStage as $stage){
      
            echo "Id du stage : ".$stage->id;
            echo "<br>";
            echo "Objet du stage :".$stage->objet;
            echo "<br>";
            echo "Description du stage : ".$stage->description;
            echo "<br>";
            echo "Lieu du stage : ".$stage->lieu;
            echo "<br>";
            echo "Rémunération du stage : ".$stage->remuneration;
            echo "<br>";
            echo "Date de début du stage : ".$stage->date_de_stage->dateDebut;
            echo "<br>";
            echo "Durée du stage : ".$stage->date_de_stage->duree;

                echo "<br>";
        		echo "<input type=button onclick=window.location.href='/docnum/reponse/reponsestage.php'; value=Répondre Répondre au messgae />";
                echo "<br><br><br>";          
                 

    }

}

if($type_de_message=="reponseConference"){
    $contenu=$message->typeMessage->reponseConference->reponseGenerique;
    foreach($contenu as $rep){
            echo "Message : ".$rep->msg;
            echo "<br>";
            echo "Id du message précédent : ".$rep->idMsgPrecedent;
            echo "<br> <br>";

    

    }
}

}












function lecture_fichier($file)
{
    echo "<br> Lecture du Fichier ".$file."<br>";
$xml=simplexml_load_file($file) or die("Error: Cannot create object");
echo " <br> Le fichier contient ".$xml->nbMessages." messages <br>";
$all_messages=$xml->xpath("message");
    foreach($all_messages as $message)
    {
        echo "<br>//////////////////////////////////////////////////////////////<br>";

        
            lecture_message($message);
      
    }

echo "coucou";
//TO DO

}







?>
?>