<?php 



 $p= strip_tags($_POST['pays'].'%');
 $p2= strip_tags('%'.$_POST['pays'].'%');

//   $p="T%";
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pays;charset=utf8', 'root', 'toor');
    
 
    $sql="SELECT  nom_fr_fr FROM pays WHERE nom_fr_fr LIKE '".$p."' LIMIT 5";

    $reponse = $bdd->query($sql);
 $donnees = $reponse->fetchAll();
 //echo json_encode($donnees);

      $sql2="SELECT nom_fr_fr FROM pays WHERE nom_fr_fr LIKE '".$p2."' AND nom_fr_fr NOT LIKE '".$p."' LIMIT 3";
      $reponse2 = $bdd->query($sql2); 
       
         $donnees2 = $reponse2->fetchAll();

    $data=array_merge($donnees,$donnees2);  
    echo json_encode($data);
   



}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



?>