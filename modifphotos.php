<?php include "inc\header.php";
if (isset($_GET['modif'])) { ?>
    <div class="alert alert-success" role="alert">
        Votre photo à bien été modifié !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php }


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
    <h2>Modification des photos</h2>
</div>
<div class="container page-top">

    <div class="row">


        <?php while ($photo = $result->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="modifphoto.php?id=<?php echo $photo->id ?>" class="fancybox" rel="ligthbox">
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
                    echo '<li class="page-item"><a class="page-link" href="modifphoto.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            ?>
        </ul>
    </nav>
</div>




<?php include "inc\/footer.php" ?>