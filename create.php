<?php
//Initialisation de la sesion
session_start();
//Définition du texte à coller ainsi qu'à son titre dans des variable temporaire
$text = htmlentities($_POST['text']);
$title = htmlentities($_POST['title']);

//Si on a entré une url customisée
if($_POST['custom'] != null) {
    //Définition de l'url customisée entrée sur l'interface, dans une variable temporaire
    $folder = $_POST['custom'];

    //Si le dossier (url du site) n'existe pas
    if(!is_dir($folder)) {
        //Création du dossier (url du site)
        mkdir($folder);
        //Définition du fichier pour le texte à afficher
        $file = $folder."/index.php";
        $content = "<!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8' />
                <title>MyTxt</title>
                <meta content='MyTxt' property='og:title'>
                <meta content='Afficheur de textes fait par Straky' property='og:description'>
                <meta content='http://mytxt.tk' property='og:url'>
                <meta content='http://mytxt.tk/logo.png' property='og:image'>
                <meta content='#9b9b9b' data-react-helmet='true' name='theme-color'>
                <link rel='stylesheet' href='../style.css' />
                <link rel='icon' type='image/png' href='../favicon.png' />
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            </heaed>
            <body>
                <center><h1>$title</h1></center>
                <div class='show'>$text</div>
            </body>
        </html>";
        touch($file);
        //Rajout dans le fichier index, le code de l'interface ainsi que le texte à coller
        file_put_contents($file, $content);
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre texte est disponible à cette adresse : <a href='".$generate."' target='_blank'>".$generate."<br><br><br><br>";
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
    //Si le dossier (url du site) existe
    else {
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "L'URL a déjà été attribuée à un texte";
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
}
//Si on a pas entré d'url customisée
else {
    //Définition d'une fonction
    start:
    //Définition d'une longeur aléatoire de caractères entre 4 et 8 dans une variable temporaire
    $length = rand(5, 9);
    //Définition d'un texte aléatoire (url du site), dans une variable temporaire
    $folder = bin2hex(random_bytes(($length-($length%2))/2));

    //Si le dossier (url du site) n'existe pas
    if(!is_dir($folder)) {
        //Création du dossier (url du site)
        mkdir($folder);
        //Définition du fichier pour le texte à afficher
        $file = $folder."/index.php";
        $content = "<!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8' />
                <title>MyTxt</title>
                <meta content='MyTxt' property='og:title'>
                <meta content='Afficheur de textes fait par Straky' property='og:description'>
                <meta content='http://mytxt.tk' property='og:url'>
                <meta content='http://mytxt.tk/logo.png' property='og:image'>
                <meta content='#9b9b9b' data-react-helmet='true' name='theme-color'>
                <link rel='stylesheet' href='../style.css' />
                <link rel='icon' type='image/png' href='../favicon.png' />
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            </heaed>
            <body>
                <center><h1>$title</h1></center>
                <div class='show'>$text</div>
            </body>
        </html>";
        touch($file);
        //Rajout dans le fichier index, le code de l'interface ainsi que le texte à coller
        file_put_contents($file, $content);
        //Définition de l'url de la page dans une variable
        $generate = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/" . $folder;
        //Définition d'un message d'alerte dans une variable de session
        $_SESSION['message'] = "Votre texte est disponible à cette adresse : <a href='".$generate."' target='_blank'>".$generate;
        //Redirection vers la page d'accueil
        header("Location: index.php");
    }
    //Si le dossier (url du site) existe
    else {
        //Saut vers l'instruction de génération de dossier (url du site) et de création de la redirection
        goto start;
    }
}
?>
