<?php
function getPage($db){
// Inscrire vos contrôleurs ici
$lesPages['accueil'] = "actionAccueil;0";
$lesPages['connexion'] = "actionConnexion;0";
$lesPages['patients'] = "actionPatients;0";
$lesPages['consultation'] = "actionConsultation;0";
$lesPages['materiel'] = "actionMateriel;0";
$lesPages['inscrire'] = "actionInscrire;0";
$lesPages['gererpa'] = "actionGererpa;0";
$lesPages['gererc'] = "actionGererc;0";
$lesPages['gererm'] = "actionGererm;0";
$lesPages['mentions'] = "actionMention;0";

if ($db!=null){ 
 if(isset($_GET['page'])){
 // Nous mettons dans la variable $page, la valeur qui a été passée dans le lien
 $page = $_GET['page']; }
 else{
 // S'il n'y a rien en mémoire, nous lui donnons la valeur « accueil » afin de lui afficher une page
 //par défaut
 $page = 'accueil';
 }
 if (!isset($lesPages[$page])){
 // Nous rentrons ici si cela n'existe pas, ainsi nous redirigeons l'utilisateur sur la page d'accueil
 $page = 'accueil';
 }
$explose = explode(";",$lesPages[$page]) ;
$role = $explose[1] ;

if ($role != 0){
  if(isset($_SESSION['login'])){
  if(isset($_SESSION['role'])){
  if($role!=$_SESSION['role']){
  $contenu = 'actionAccueil';
 }
 else{
 $contenu = $explose[0];
 }
 }
 else{
 $contenu = 'actionAccueil';
 }
 }
 else{
 $contenu = 'actionAccueil';
 }
 }else{
 $contenu = $explose[0];
 }

}
else{
 $contenu = 'actionMaintenance';
}
// La fonction envoie le contenu
return $contenu;
}

?>
