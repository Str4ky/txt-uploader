<?php
//Initialisation de la sesion
session_start();
//Vérification de l'existence d'une variable de session
 if(isset($_SESSION['message'])) {
     //Définition d'une variable temporaire, ou son contenu est égal à la variable de session
    $message = $_SESSION['message'];
    //Suppression du contenu de la variable de session
    $_SESSION['message'] = "";
 }
 else {
     //Initialisation d'une variable temporaire
    $message = "";
    //Initialisation d'une variable de session
    $_SESSION['message'] = "";
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>MyTxt</title>
        <meta content="MyTxt" property="og:title">
        <meta content="Afficheur de textes fait par Straky" property="og:description">
        <meta content="http://mytxt.tk" property="og:url">
        <meta content="http://mytxt.tk/logo.png" property="og:image">
        <meta content="#9b9b9b" data-react-helmet="true" name="theme-color">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" type="image/png" href="favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </heaed>

    <body>
        <center>
            <h1>MyTxt ✏️</h1>
            <h3>Par <a href="https://github.com/Str4ky" target="_blank" style="color: white;">Straky</a> | <a href="https://github.com/Str4ky/txt-uploader" target="_blank" style="color: white;">Code source</a></h3>
                <br><br>
            <form method="post" action="create.php">
                <h3>Titre du document :</h3>
                    <!-- Zone d'entrée de texte pour le titre du document -->
                    <input type="text" name="title" id="title" placeholder="Entrez une URL personnalisée" class="text" required/>
                <h3>Texte à coller :</h3>
                    <!-- Zone d'entrée de texte pour le texte à coller -->
                    <textarea name="text" id="text" placeholder="Entrez votre texte à coller" class="text" required></textarea>
                <br><br>
                <h3>URL personnalisée (optionnel) :</h3>
                    <!-- Zone d'entrée optionnelle de texte pour une url customisée -->
                    <input type="text" name="custom" id="custom" placeholder="Entrez une URL personnalisée" class="text" />
                <br><br>
                    <!-- Bouton de génération -->
                    <button type="submit" class="button red-pink">✏️ Partager votre texte</button>
            </form>
            <br><br>
            <?php
            //Affichage d'un message d'alerte
            echo $message;
            //Déclaration d"une variable du nom de l'hôte
            $host = $_SERVER['REMOTE_ADDR'];
            //Décodage d'une valeur en base64 pôur la vérification de l'hôte
            $verif = votre_ip;
            //Si le nom d'hôte est égal à celui du développeur
            if ($host == $verif) {
                //Affichage d'un bouton d'administration
                echo "<a href='admin.php' class='button purple' style='text-decoration: none;'>🔧 Administration</a>";
            }
            ?>
        </center>
    </body>

</html>
