<?php include "inc\header.php" ?>
<?php if (isset($_GET['ajout'])) { ?>
    <div class="alert alert-success" role="alert">
        Votre photo à été publié !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<div class="container page-top">


    <div>
        <form action="" method="post">
            <select class="form-control" name="type">
                <?php $result = $pdo->query("SELECT * FROM categorie");
                while ($categorie = $result->fetch(PDO::FETCH_OBJ)) { ?>

                    <option name="catego" value="<?php echo $categorie->nom_categorie ?>"><?php echo $categorie->nom_categorie ?></option>

                <?php } ?>
            </select>
            <br>

            <div style="text-align: center">
                <button class="btn btn-outline-success my-2 my-sm-0">Rechercher la catégorie</button>
            </div>









        </form>
    </div>
    <br>





    <?php


    if (isset($_POST['type'])) {
        $_POST['type'] = htmlentities($_POST['type']);
        $nomcatego = $_POST["type"];
        $nomcatego = addslashes($nomcatego);
        $cat = $nomcatego;





        $articlesParPage = 8;
        $articlesTotalesReq = $pdo->query("SELECT id FROM article WHERE categorie = '$cat'");
        $articlesTotales = $articlesTotalesReq->rowCount();
        $pagesTotales = ceil($articlesTotales / $articlesParPage);

        if (isset($_GET['cat']) and !empty($_GET['cat']) and $_GET['cat'] > 0 and $_GET['cat'] <= $pagesTotales) {
            $_GET['cat'] = intval($_GET['cat']);
            $pageCourante = $_GET['cat'];
        } else {
            $pageCourante = 1;
        }
        $depart = ($pageCourante - 1) * $articlesParPage;



        $result2 = $pdo->query("SELECT * FROM article WHERE categorie= '$cat' ORDER BY date DESC LIMIT " . $depart . ',' . $articlesParPage) ?>

        <div class="row">


            <?php while ($photo2 = $result2->fetch(PDO::FETCH_OBJ)) {
            ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="article.php?id=<?php echo $photo2->id ?>" class="fancybox" rel="ligthbox">
                        <img src="assets/images/<?php echo $photo2->img  ?>" class="zoom img-fluid" alt="">
                        <h3><?php echo $photo2->titre  ?></h3>
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
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>






    <?php } else {

        $articlesParPage = 8;
        $articlesTotalesReq = $pdo->query('SELECT id FROM article ');
        $articlesTotales = $articlesTotalesReq->rowCount();
        $pagesTotales = ceil($articlesTotales / $articlesParPage);

        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourante = $_GET['page'];
        } else {
            $pageCourante = 1;
        }
        $depart = ($pageCourante - 1) * $articlesParPage;








        $result = $pdo->query('SELECT * FROM article ORDER BY date DESC LIMIT ' . $depart . ',' . $articlesParPage); ?>
        <div class="row">


            <?php while ($photo = $result->fetch(PDO::FETCH_OBJ)) {
            ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="article.php?id=<?php echo $photo->id ?>" class="fancybox" rel="ligthbox">
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
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>

    <?php }




    ?>






</div>



<?php include "inc\/footer.php" ?>