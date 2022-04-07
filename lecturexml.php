<!DOCTYPE html>
<html>
<body>
    <h1> Lecture des fichiers non lus </h1>

<?php

// taille supérieur a 10KO
// si il a deja été traiter
// PAS DE RESPECT DE LA DTD
// contenu vide 
// SI LE NB MESSAGE DE LENTETE NE CORRESPOND PAS
// plus que 10000 Caractères 
// SI CONTENU NON ASCI
// MESSAGE PERIMEE
// MESSAGE AC DUREE DE VALIDITE SUPERIEUR A 3 MOIS

function deplacer_fichier_lus($file)
{
    $destinationFilePath="lus/".$file;
    $destinationFilePath=str_replace("nonlus/","",$destinationFilePath);
    if( !rename($file, $destinationFilePath) ) {  
    echo "Le fichier n'a pas été déplacé dans /lus!";  
    }  
    else {  
    echo "Le ficier".$file." a été deplacé dans /lus";  
    }
}

function deplacer_fichier_rejected($file)
{
     $destinationFilePath="rejected/".$file;
    $destinationFilePath=str_replace("nonlus/","",$destinationFilePath);
    if( !rename($file, $destinationFilePath) ) {  
    echo "Le fichier n'a pas été déplacé dans /rejected!";  
    }  
    else {  
    echo "Le ficier".$file." a été deplacé dans /rejected";  
    }
}


$files = glob("nonlus/*.xml");
if($files==null)
{
    echo "Aucun fichier à traiter <br>";
}
foreach($files as $file){

    $raison_rejet="";

     if(verification_fichier($file,$raison_rejet))
     {
        echo " <br> Le fichier ".$file." est valide ! <br>";
        lecture_fichier($file);
        deplacer_fichier_lus($file);

     }  
     else
     {
        echo "Le fichier n'as pas été traité car ".$raison_rejet."<br>";
        $checkfile2="rejected/".$file;
        $checkfile2= str_replace("nonlus/","",$checkfile2);
        if(!(file_exists($checkfile2) && filesize($checkfile2)==filesize($file))){
        deplacer_fichier_rejected($file);
        }

     }            
}
//print_r($xml);

function lecture_message($message)

{
echo " Le message est valide ! <br>";
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
        
        $connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
        $query = "INSERT INTO demandeconference
        (id, id_message, sujet, lieu, date, dureeConference) 
        VALUES(:id, :id_message, :sujet, :lieu, :date, :dureeConference);
        ";
        $statement = $connect->prepare($query);
        echo "id messg :".$message['id']."<br>";
        $statement->execute(
            array(
            ':id'   => $conf->id,
            ':id_message'   => $message['id'],
            ':sujet'  => $conf->sujet,
            ':lieu'  => $conf->lieu,
            ':date' => $conf->date,
            ':dureeConference'   => $conf->dureeConference
            )
            );

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
                $connect = new PDO('mysql:host=localhost;dbname=testing','root', '');
                    $query = "
                INSERT INTO demandelisteformation
                (id, id_message, filliere) 
                VALUES(:id, :id_message, :filliere);
                ";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                    ':id'   => $form->id,
                    ':id_message'  => $message['id'],
                    ':filliere'  => $filliere
                    ));
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
                  $connect = new PDO('mysql:host=localhost;dbname=testing','root', '');

                $query = "
            INSERT INTO demandestage
            (id_message, id, objet, description, lieu, remuneration, datedebut, duree) 
            VALUES(:id_message, :id, :objet, :description, :lieu, :remuneration, :datedebut, :duree);
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                ':id'   => $stage->id,
                ':id_message'   => $message['id'],
                ':objet'  => $stage->objet,
                ':description'  => $stage->description,
                ':lieu' => $stage->lieu,
                ':remuneration'   => $stage->remuneration,
                ':datedebut' => $stage->date_de_stage->dateDebut,
                ':duree' => $stage->date_de_stage->duree,
                ));

    }

}

if($type_de_message=="reponseConference"){
    $contenu=$message->typeMessage->reponseConference->reponseGenerique;
    foreach($contenu as $rep){
            echo "Message : ".$rep->msg;
            echo "<br>";
            echo "Id du message précédent : ".$rep->idMsgPrecedent;
            echo "<br> <br>";

    $connect = new PDO('mysql:host=localhost;dbname=testing','root', '');

    $query = "
     INSERT INTO reponseconference
   (id_message, id_message_precedent, message) 
   VALUES(:id_message, :id_message_precedent, :msg);
  ";
   $statement = $connect->prepare($query);
   $statement->execute(
    array(
     ':id_message'   => $message['id'],
     ':id_message_precedent'   => $rep->idMsgPrecedent,
     ':msg'  => $rep->msg
    ));

    }
}

}






function verification_message($message,$xml,&$rejet_message)
{
    echo "<br> Vérification du message : ".$message->typeMessage->children()->getName(). "<br>";
    $valide=true;
    $rejet_message="";
    $dureeValiditee=$message->dureeValidite;
    $dateenvoi=$message->dateEnvoi;
    $dateenvoi=$dateenvoi->__toString();
    $time = strtotime($dateenvoi);

    $newformat = date('Y-m-d',$time);
//echo $newformat;echo "<br>";
$days=$dureeValiditee;
$date1=date('Y-m-d', strtotime($newformat. ' + '.$days.' days'));
$date=getdate();
$date2=$date['year']."-".$date['mon']."-".$date['mday'];


    if($date1<$date2){
        $rejet_message=" Message périmée";
        return $valide=false;
    }

    if($dureeValiditee>90){
        $rejet_message=" Durée de validité supérieure à 3 mois";
        return $valide=false;
    }



$type_de_message=$message->typeMessage->children()->getName();


if($type_de_message=="demandeConference"){

    $total_length=0;
    //return $valide=false;

    $all_conferences=$message->typeMessage->demandeConference->children();
    foreach($all_conferences as $conf){
      
        foreach($conf as $element){
            $element=$element->__toString();
            if( mb_check_encoding($element, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
           
            $string_length = strlen($element) - substr_count($element, ' ');
            $total_length=$total_length+$string_length;
        }

    }
    if($total_length==0)
    {
        $rejet_message=" Contenu vide";
        return $valide=false;
        
    }
}

if($type_de_message=="demandeListeFormation"){
    $total_length=0;

    $all_formations=$message->typeMessage->demandeListeFormation->children();
    foreach($all_formations as $form){
      
            $string_length = strlen($form->id) - substr_count($form->id, ' ');
            $total_length=$total_length+$string_length;
            $all_fillieres=$form->branche->children();
            foreach($all_fillieres as $filliere)
            {
                $stringFilliere=$filliere->__toString();
                if( mb_check_encoding($stringFilliere, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
                }
                $string_length = strlen($stringFilliere) - substr_count($stringFilliere, ' ');
                $total_length=$total_length+$string_length;
            }

    }
    if($total_length==0)
        {
            $rejet_message=" Contenu vide";
            return $valide=false;

        }
}

if($type_de_message=="demandeStage"){
    $total_length=0;

    $all_dmStage=$message->typeMessage->demandeStage->children();
    foreach($all_dmStage as $stage){
      
            $stringStage=$stage->id->__toString();
            
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

            $stringStage=$stage->objet->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;           

            $stringStage=$stage->description->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

            $stringStage=$stage->lieu->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

            $stringStage=$stage->remuneration->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

            $stringStage=$stage->date_de_stage->dateDebut->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

            $stringStage=$stage->date_de_stage->duree->__toString();
            if( mb_check_encoding($stringStage, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            $string_length = strlen($stringStage) - substr_count($stringStage, ' ');
            $total_length=$total_length+$string_length;

    }
    if($total_length==0)
        {
            $rejet_message=" Contenu vide";
            return $valide=false;

        }
}

if($type_de_message=="reponseConference"){
   $total_length=0;
    $contenu=$message->typeMessage->reponseConference->reponseGenerique;
    foreach($contenu as $rep){
            $stringRep=$rep->msg->__toString();
            if( mb_check_encoding($stringRep, 'ASCII')==false){
                $rejet_message=" Caractère non ASCII détécté";
                return $valide=false;
            }
            //echo " ça c le truc to string:".$stringRep."fin";
            $string_length = strlen($stringRep) - substr_count($stringRep, ' ');
            $total_length=$total_length+$string_length;

            $stringRep=$rep->idMsgPrecedent->__toString();
            $string_length = strlen($stringRep) - substr_count($stringRep, ' ');
            $total_length=$total_length+$string_length;
    }
    if($total_length==0)
        {
            $rejet_message=" Contenu vide";
            return $valide=false;

        }
}
return $valide;
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

        $rejet_message="";
        if(verification_message($message,$xml,$rejet_message))
        {
            lecture_message($message);
        }
        else
        {
            echo "<br> Le message ".$message->typeMessage->children()->getName()." a été rejeté <br>";
            echo " <br> Raison du rejet du message : ".$rejet_message."<br>";
        }
    }

echo "coucou";
//TO DO

}






function verification_fichier($file,&$raison_rejet)
{
    $valide=true;
    

    echo " Verification du fichier ".$file." en cours <br> <br>";



    //taille du fichier
    if(filesize($file) > 10000)
    {
        $raison_rejet=" sa taille est supérieure à 10 Ko";
        return $valide=false;

    }

    //DTD
    $dom = new DOMDocument;
    $dom->load($file);
    if (!$dom->validate()) {
    
        $raison_rejet=$raison_rejet." il ne respecte pas la DTD ";
        return $valide=false;

    }
    
    // si deja traité
    $checkfile="lus/".$file;
    $checkfile= str_replace("nonlus/","",$checkfile);
    $checkfile2="rejected/".$file;
    $checkfile2= str_replace("nonlus/","",$checkfile2);
    if( (file_exists($checkfile) && filesize($checkfile)==filesize($file)) || (file_exists($checkfile2) && filesize($checkfile2)==filesize($file)) ) 
    {
        $raison_rejet=$raison_rejet." il a déjà été traité";
        return $valide=false;

    }

    //Checksum nb messages
    $xml=simplexml_load_file($file) or die ("Error:cannont read file");
    $checksum=$xml->nbMessages;
    //if($xml->destinataire->getName()!==EDF)
    $nb_messages=count($xml->xpath("message"));
    
    
    if($checksum != $nb_messages)
    {
        $raison_rejet=$raison_rejet. " Le nombre de messages ne correspond pas au checksum";
        return $valide=false;

    }

    return $valide;
}
?>

</body>
</html>