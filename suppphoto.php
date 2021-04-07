<?php include "inc\header.php";



if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $login = $_SESSION['pseudo'];

    $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
    $data = mysqli_fetch_assoc($requete);
    $aut = $data['id'];

    $requete2 = mysqli_query($conn, "SELECT auteur_id from article  where id='$id'");
    $data2 = mysqli_fetch_assoc($requete2);
    $aut_id = $data2['auteur_id'];

    if ($aut == $aut_id) {
        $requete3 = mysqli_query($conn, "SELECT titre from article  where id='$id'");
        $data3 = mysqli_fetch_assoc($requete3);
        $supp = $data3['titre'];
        $pdo->query("DELETE FROM article WHERE id='$id' "); ?>
        <div class="alert alert-danger" role="alert">
            Vous avez supprimé la photo : <?php echo $supp  ?>

            <button type="button" class="close" data-dismiss="alert" name="delete" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>


    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Une erreur est survenue !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


<?php }
}














$login = $_SESSION['pseudo'];

$requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
$data = mysqli_fetch_assoc($requete);
$aut = $data['id'];


$articlesParPage = 8;
$articlesTotalesReq = $pdo->query("SELECT id FROM article WHERE auteur_id= $aut ");
$articlesTotales = $articlesTotalesReq->rowCount();
$pagesTotales = ceil($articlesTotales / $articlesParPage);

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
} else {
    $pageCourante = 1;
}
$depart = ($pageCourante - 1) * $articlesParPage;



$result = $pdo->query("SELECT * FROM article WHERE auteur_id= $aut ORDER BY date DESC LIMIT  " . $depart . ',' . $articlesParPage) ?>
<div style="text-align: center">
    <h2>Suppression des photos</h2>
</div>
<div class="container page-top">
    <div class="row">


        <?php while ($photo = $result->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="suppphoto.php?id=<?php echo $photo->id ?>" class="fancybox" rel="ligthbox">
                    <img src="assets/images/<?php echo $photo->img  ?>" class="zoom img-fluid" alt="">
                    <h3><?php echo $photo->titre  ?></h3>
                </a>
            </div>
        <?php
        }

        ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $pagesTotales; $i++) {

                if ($i == $pageCourante) {
                    echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="suppphoto.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            ?>
        </ul>
    </nav>


</div>






<?php include "inc\/footer.php" ?>