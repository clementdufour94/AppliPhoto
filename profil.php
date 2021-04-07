
<?php include "inc\header.php" ?>
<?php if (isset($_GET['ajout'])) { ?>
    <div class="alert alert-success" role="alert">
        Vos informations ont été mis à jour !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>




<?php if (!empty($_GET['id'])) { ?>
    <?php $result = $pdo->query("SELECT * FROM users WHERE id= " . $_GET['id']);
    $prof = $result->fetch(PDO::FETCH_OBJ) ?>

    <div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $prof->pseudo  ?></h4>
                                    <p class="text-secondary mb-1">Inscription :</p>
                                    <p class="text-muted font-size-sm"><?php echo $prof->inscription  ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (is_null($prof->site) && ($prof->instagram) && ($prof->twitter) && ($prof->facebook)) { ?>

                    <?php } else { ?><div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <?php if ($prof->site !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>Website</h6>
                                        <a href="<?php echo $prof->site  ?>" target="_blank"><small><span class="text-secondary"><?php echo $prof->site  ?></span></small></a>
                                    </li>
                                <?php } ?>



                                <?php if ($prof->twitter !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>Twitter</h6>
                                        <a href="<?php echo $prof->twitter  ?>" target="_blank"><small><span class="text-secondary"><?php echo $prof->twitter  ?></span></small></a>
                                    </li>


                                <?php } ?>

                                <?php if ($prof->instagram !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>Instagram</h6>
                                        <a href="<?php echo $prof->instagram  ?>" target="_blank"><small><span class="text-secondary"><?php echo $prof->instagram  ?></span></small></a>
                                    </li>
                                <?php } ?>





                                <?php if ($prof->facebook !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>Facebook</h6>
                                        <a href="<?php echo $prof->facebook  ?>" target="_blank"><small><span class="text-secondary"><?php echo $prof->facebook  ?></span></small></a>
                                    </li>
                                <?php } ?>







                            </ul>
                        </div>
                    <?php } ?>








                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $prof->nom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $prof->prenom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $prof->email  ?>
                                </div>
                            </div>


                        </div>
                    </div>

                    <?php

                    $id = $_GET['id'];
                    $articlesParPage = 4;
                    $articlesTotalesReq = $pdo->query("SELECT id FROM article where auteur_id='$id'");
                    $articlesTotales = $articlesTotalesReq->rowCount();
                    $pagesTotales = ceil($articlesTotales / $articlesParPage);

                    if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
                        $_GET['page'] = intval($_GET['page']);
                        $pageCourante = $_GET['page'];
                    } else {
                        $pageCourante = 1;
                    }
                    $depart = ($pageCourante - 1) * $articlesParPage; ?>








                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>Contributions :</h4>

                            <div class="row">


                                <?php






                                $result = $pdo->query("SELECT * FROM article where auteur_id='$id' order by date desc LIMIT " . $depart . "," . $articlesParPage);
                                while ($art = $result->fetch(PDO::FETCH_OBJ)) {
                                ?>



                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                        <a href="article.php?id=<?php echo $art->id ?>" class="fancybox" rel="ligthbox">
                                            <img src="assets/images/<?php echo $art->img ?>" class="zoom img-fluid" alt="">
                                            <h3><?php echo $art->titre ?></h3>
                                        </a>
                                    </div>


                                <?php }  ?>






                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $pagesTotales; $i++) {

                                        if ($i == $pageCourante) {
                                            echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="profil.php?id=' . $id . '&amp;page=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>


                        </div>
                    </div>













                </div>
            </div>
        </div>
    </div>











<?php } else { ?>









    <?php





    $login = $_SESSION['pseudo'];


    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
    $data = mysqli_fetch_assoc($requete);
    $aut = $data['id'];



    $result = $pdo->query("SELECT * FROM users where id='$aut' ");
    $profil = $result->fetch(PDO::FETCH_OBJ); ?>







    <div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $profil->pseudo  ?></h4>
                                    <p class="text-secondary mb-1">Inscription :</p>
                                    <p class="text-muted font-size-sm"><?php echo $profil->inscription  ?></p>

                                    <?php
                                    if ($profil->admin == 1) { ?>
                                        
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier une  photo</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer une photo</a>
                                        <a href="admin.php" class="btn btn-outline-primary">Administration</a>
                                        
                                        

                                    <?php }else{ ?>
                                        <a href="modifphotos.php" class="btn btn-outline-primary">Modifier une photo</a>
                                        <a href="suppphoto.php" class="btn btn-outline-danger">Supprimer une photo</a>
                                        

                                    <?php }
                                    ?>
                                    
                                    




                                </div>
                            </div>
                        </div>
                    </div>
                
                                    
                    <?php 
                    if (is_null($profil->site) && ($profil->instagram) && ($profil->twitter) && ($profil->facebook)) { 
                        ?>
                    

                    <?php } else {  ?>

                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">

                                <?php if ($profil->site !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>Website</h6>
                                        <a href="<?php echo $profil->site  ?>" target="_blank"><small><span class="text-secondary"><?php echo $profil->site  ?></span></small></a>
                                    </li>

                                <?php } ?>



                                <?php if ($profil->twitter !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>Twitter</h6>
                                        <a href="<?php echo $profil->twitter  ?>" target="_blank"><small><span class="text-secondary"><?php echo $profil->twitter  ?></span></small></a>
                                    </li>

                                <?php } ?>

                                <?php if ($profil->instagram !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>Instagram</h6>
                                        <a href="<?php echo $profil->instagram  ?>" target="_blank"><small><span class="text-secondary"><?php echo $profil->instagram  ?></span></small></a>
                                    </li>
                                <?php } ?>




                                <?php if ($profil->facebook !== NULL) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>Facebook</h6>


                                        <a href="<?php echo $profil->facebook  ?>" target="_blank"><small><span class="text-secondary"><?php echo $profil->facebook  ?></span></small></a>
                                    </li>
                                <?php } ?>


                            </ul>
                        </div>

                    <?php  } ?>





                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $profil->nom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $profil->prenom  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $profil->email  ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                    $login = $_SESSION['pseudo'];


                    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
                    $data = mysqli_fetch_assoc($requete);
                    $aut = $data['id'];



                    $articlesParPage = 4;
                    $articlesTotalesReq = $pdo->query("SELECT id FROM article where auteur_id='$aut'");

                    $articlesTotales = $articlesTotalesReq->rowCount();
                    $pagesTotales = ceil($articlesTotales / $articlesParPage);

                    if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
                        $_GET['page'] = intval($_GET['page']);
                        $pageCourante = $_GET['page'];
                    } else {
                        $pageCourante = 1;
                    }
                    $depart = ($pageCourante - 1) * $articlesParPage; ?>

                    <div class="card mb-3">
                        <div class="card-body">

                            <h4>Mes contributions :</h4>

                            <div class="row">



                                <?php






                                $result = $pdo->query("SELECT * FROM article where auteur_id='$aut' ORDER by date desc LIMIT " . $depart . "," . $articlesParPage);
                                while ($art = $result->fetch(PDO::FETCH_OBJ)) {
                                ?>



                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                        <a href="article.php?id=<?php echo $art->id ?>" class="fancybox" rel="ligthbox">
                                            <img src="assets/images/<?php echo $art->img ?>" class="zoom img-fluid" alt="">
                                            <h3><?php echo $art->titre ?></h3>
                                        </a>
                                    </div>


                                <?php }  ?>








                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $pagesTotales; $i++) {

                                        if ($i == $pageCourante) {
                                            echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="profil.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>


                        </div>
                    </div>












                    <?php



                    $login = $_SESSION['pseudo'];


                    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
                    $data = mysqli_fetch_assoc($requete);
                    $aut = $data['id']; //id mec connecté 

                    // if id_auteur de fav = id mec connecté alors recuperer id_article correspondant 





                    $requete2 = mysqli_query($conn, "SELECT id_auteur from fav  where id_auteur='$aut'");
                    $data2 = mysqli_fetch_assoc($requete2);
                    if (isset($data2)) { ?>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h4>Mes favoris :</h4>
                                <div class="row">





                                    <?php
                                    $id_auteur = $data2['id_auteur'];

                                    $favoriesParPage = 4;
                                    $result2 = $pdo->query("SELECT id_article FROM fav where id_auteur='$id_auteur' ");

                                    $favoriesTotales = $result2->rowCount();
                                    $pagesfavoriesTotales = ceil($favoriesTotales / $favoriesParPage);

                                    if (isset($_GET['favorie']) and !empty($_GET['favorie']) and $_GET['favorie'] > 0 and $_GET['favorie'] <= $pagesfavoriesTotales) {
                                        $_GET['favorie'] = intval($_GET['favorie']);
                                        $pagefavorieCourante = $_GET['favorie'];
                                    } else {
                                        $pagefavorieCourante = 1;
                                    }
                                    $departfavorie = ($pagefavorieCourante - 1) * $favoriesParPage;
                                    $result2 = $pdo->query("SELECT id_article FROM fav where id_auteur='$id_auteur' LIMIT " . $departfavorie . "," . $favoriesParPage);



                                    while ($fav = $result2->fetch(PDO::FETCH_OBJ)) {
                                        $id_article = $fav->id_article;
                                        $result = $pdo->query("SELECT * FROM article where id='$id_article' order by date desc ");





                                        while ($art = $result->fetch(PDO::FETCH_OBJ)) { ?>



                                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                                <a href="article.php?id=<?php echo $art->id ?>" class="fancybox" rel="ligthbox">
                                                    <img src="assets/images/<?php echo $art->img ?>" class="zoom img-fluid" alt="">
                                                    <h3><?php echo $art->titre ?></h3>
                                                </a>
                                            </div><?php
                                        }
                                    } ?>

                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php
                                        for ($j = 1; $j <= $pagesfavoriesTotales; $j++) {

                                            if ($j == $pagefavorieCourante) {
                                                echo '<li class="page-item"><a class="page-link">' . $j . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="profil.php?favorie=' . $j . '   ">' . $j . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </nav>



                            </div>
                        </div>










                    <?php }




                    ?>
















                </div>
            </div>
        </div>
    </div>

<?php } ?>














<?php include "inc\/footer.php" ?>