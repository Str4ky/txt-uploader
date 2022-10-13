<?php
//Démarrage de la session
session_start();
//Remettre une variable de session de message à rien
$_SESSION['message_edit'] = '';
//Si la variable de session d'un message existe pas
if (!isset($_SESSION['message_delete']))
{   
    //Déclaration d'une variable de session pour un message
    $_SESSION['message_delete'] = '';
}

//Déclaration d"une variable du nom de l'hôte
$host = $_SERVER['REMOTE_ADDR'];
//Décodage d'une valeur en base64 pôur la vérification de l'hôte
$verif = votre_ip;
//Si le nom d'hôte est égal à celui du développeur
if ($host != $verif) {
    //Retour à la page d'accueil
    header('Location: index.php');
}

//Déclaration d'une variable de dossier
$folder = $_POST['url'];
//Déclaration d'une variable de fichier
$file = $folder.'/index.php';
//Suppression du fichier index
unlink($file);
//Suppression du dossier de la redirection
rmdir($folder);
//Déclaration d'une variable de session en tant que message d'alerte
$_SESSION['message_delete'] = 'Redirection supprimée avec succès';
?>
            
<script>
//Redirection vers la page d'administration
location.replace("admin.php")
</script>
