<?php

//toujours passer par l'index, c'est le point d'entrée
include 'lib/autoload.php';
include 'lib/pdo.php';
session_start();


if (isset($_GET['fermer'])) {
//    var_dump($_GET);
    session_destroy();
    header("Location: index.php");
    exit;
}

$pm = new personnageManager($pdo);
/////////////////////////////
if (!isset($_SESSION['courant'])) {

//var_dump($perso);
    if (isset($_POST['ok'])) {
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $perso = new Personnage($_POST);


        if ($perso->getErreur()) {
            $erreur = implode(', ', $perso->getErreur());
        } else {

//var_dump($pm->persoExist($perso));
            if ($pm->persoExist($perso)) {
                $message1 = 'le personnage existe déjà';
            } else {
                $perso = $pm->insertPerso($perso);
                $message2 = 'le personnage est crée';
                $_SESSION['courant'] = $perso;
                header("Location: index.php");
                exit;
            }
        }
    } elseif (isset($_POST['jouer'])) {
        $perso = $pm->getPersoById($_POST['liste']);
//        var_dump($perso);
        $_SESSION['courant'] = $perso;
        header("Location: index.php");
        exit;
//        var_dump($_SESSION);
    }

    $liste = $pm->getListe();
//var_dump($liste);
//////////////////////////////
    include 'vue/creation.html.php';
} else {

    $perso = $_SESSION['courant'];

    if (isset($_POST['go'])) {
        $paf = $pm->getPersoById($_POST['choix']);
        $attaque = $perso->frapper($paf);
//        var_dump($paf);

        if ($attaque == Personnage::FRAPPER) {

            $pm->update($paf);
            $message = $paf->getNom() . ' a été frappé! ' . $paf->getNom() . ' à ' . $paf->getDegats() . ' points de dégâts';
        } elseif ($attaque == Personnage::TUER) {

            $pm->delete($paf);
            $message = $paf->getNom() . ' est mort';
        }
    }

    $liste = $pm->getAllOpposants($perso);
//    var_dump($liste);
////////////////////////////////////
    include 'vue/jeu.html.php';
}







//        //si attaque = FRAPPER
//        if($attaque = $perso->frapper($paf)){
//            //update degats en BDD et message indiquant le total des dégats
//        $pm->update($paf);
//        $message = $perso->getNom . 'a été frappé! Il lui reste'. $paf->getDegats();
//        }elseif($attaque = $perso->tuer($paf)){
//            //si attaque = TUER
//        $pm->delete($paf);
//        $message = $perso->getNom . 'est mort';
//        delete et message perso est mort

