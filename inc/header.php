<?php
// Initialiser la session
session_start();
 include "data\data.php" 
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appli photo</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet"> 



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> -->











                <?php
                if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) { ?>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profil.php">Votre profil</a>
                            <a class="dropdown-item" href="modifprofil.php">Modifier votre profil</a>
                            <a class="dropdown-item" href="ajout.php">Ajouter une photo</a>
                            <a class="dropdown-item" href="logout.php">Se déconnecter</a>


                        </div>
                    </li>
                    

                <?php } else { ?>




                    <li class="nav-item active">
                        <a class="nav-link" href="signin.php">Se connecter</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="signup.php">S'inscrire</a>
                    </li>

                <?php } ?>




            </ul>
            <form class="form-inline my-2 my-lg-0" action ="verif-form.php" method = "get">
                <input class="form-control mr-sm-2" type="search" name = "terme" placeholder="Pont" aria-label="Search">
                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name = "recherche" value = "Rechercher" >
            </form>
        </div>
    </nav>





























</head>


<body>