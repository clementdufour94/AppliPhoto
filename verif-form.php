<?php include "inc\header.php";





if (isset($_GET["recherche"]) and $_GET["recherche"] == "Rechercher") {
    $_GET["terme"] = htmlentities($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
    $terme = $_GET["terme"];
    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
    $terme = addslashes($terme); //pour ajouter des slashes pour prendre en compte les apostrophes

    $articlesParPage = 8;
    $articlesTotalesReq = $pdo->prepare('SELECT id FROM article WHERE titre LIKE ? OR description LIKE ? OR auteur LIKE ? OR img LIKE ? OR id LIKE ? OR categorie LIKE ? OR date LIKE ?');
    $articlesTotalesReq->execute(array("%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%"));
    $articlesTotales = $articlesTotalesReq->rowCount();
    $pagesTotales = ceil($articlesTotales / $articlesParPage);

    if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    } else {
        $pageCourante = 1;
    }
    $depart = ($pageCourante - 1) * $articlesParPage;

    if (isset($terme)) {
        $terme = strtolower($terme);
        $select_terme = $pdo->prepare('SELECT titre, description, auteur, img, id, categorie, date FROM article WHERE titre LIKE ? OR description LIKE ? OR auteur LIKE ? OR img LIKE ? OR id LIKE ? OR categorie LIKE ? OR date LIKE ? ORDER BY date DESC LIMIT ' . $depart . ',' . $articlesParPage);
        $select_terme->execute(array("%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%", "%" . $terme . "%"));
    } else {
        $message = "Vous devez entrer votre requete dans la barre de recherche";
    }
}

$trouve = false;
$afficheaucun = false;









?>















<div class="container page-top">
    <div class="row">
        <?php while ($terme_trouve = $select_terme->fetch()) { ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="article.php?id=<?php echo $terme_trouve['id'] ?>" class="fancybox" rel="ligthbox">
                    <img src="assets/images/<?php echo $terme_trouve['img']  ?>" class="zoom img-fluid" alt="">
                    <h3><?php echo $terme_trouve['titre']  ?></h3>
                    <?php $trouve = true; ?>
                </a>
            </div>








        <?php
        } ?>


    </div>
</div>


<?php
if (!$trouve and !$afficheaucun) { ?>
    <div class="alert alert-danger" role="alert">
        Aucun résultat trouvé.
    </div>
<?php $afficheaucun = true;
} else {  ?>





    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $pagesTotales; $i++) {

                if ($i == $pageCourante) {
                    echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="verif-form.php?recherche=Rechercher&terme=' . $terme . '&page=' . $i . '">' . $i . '</a></li>';
                }
            }
            ?>
        </ul>
    </nav>

    

<?php }

$select_terme->closeCursor();

?>


<?php include "inc\/footer.php" ?>