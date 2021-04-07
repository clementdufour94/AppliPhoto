<?php include "inc\header.php";
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) { ?>
  <?php if (!empty($_GET)) { ?>
    <?php $result = $pdo->query("SELECT * FROM article WHERE id= " . $_GET['id']);
    while ($photo = $result->fetch(PDO::FETCH_OBJ)) { ?>



      <div class="container">

        <div class="row">



          <div class="col-lg-9">

            <div class="card mt-4">
              <img class="card-img-top img-fluid" src="assets/images/<?php echo "$photo->img" ?>" alt="">

              <div class="card-body">
                <h3 class="card-title"><?php echo "$photo->titre" ?></h3>
                <p class="card-text"><?php echo "$photo->description" ?> </p>

                <small class="text-muted"><a href="profil.php?id=<?php echo $photo->auteur_id ?>"><?php echo "$photo->auteur" ?></a> le <?php echo "$photo->date" ?></small>


                <?php
                $login = $_SESSION['pseudo'];
                $requete = mysqli_query($conn, "SELECT id from users  where pseudo='$login'");
                $data = mysqli_fetch_assoc($requete);
                $aut = $data['id'];

                $requete2 = mysqli_query($conn, "SELECT pseudo from users  where pseudo='$login'");;
                $data2 = mysqli_fetch_assoc($requete2);
                $autnom = $data2['pseudo'];

                $id = $_GET['id'];

                ?>

                <?php


                $result = $pdo->query("SELECT * FROM fav  where id_article='$id' AND id_auteur='$aut' ");
                $favorie = $result->fetch(PDO::FETCH_OBJ);

                if (empty($favorie)) { ?>

                  <form action="article.php?id=<?php echo $photo->id ?>" method="POST">
                    <button type="submit" name="fav" class="test">
                      <p align="right"><i class="far fa-star fa-2x" style="color: yellow;"></i></p>
                    </button>

                  </form>



                <?php } else { ?>

                  <form action="article.php?id=<?php echo $photo->id ?>" method="POST">
                    <button type="submit" action="article.php?id=<?php echo $photo->id ?>" name="suppfav" class="test">
                      <p align="right"><i class="fas fa-star fa-2x" style="color: yellow;"></i></p>
                    </button>


                  </form>







                <?php }



                if (isset($_POST["fav"])) {
                  $req = $pdo->exec("INSERT into fav (id_auteur, id_article ) values ('$aut', '$id')"); ?>
                  <script>
                    window.location = window.location.href;
                  </script>
                <?php }
                if (isset($_POST["suppfav"])) {
                  $req = $pdo->exec("DELETE FROM fav WHERE id_auteur='$aut' AND id_article='$id' "); ?>
                  <script>
                    window.location = window.location.href;
                  </script>
                <?php }







                ?>
                








                  <br>
                
                <small class="text"><i class="fas fa-tag fa-2x"></i> <?php echo $photo->categorie ?> </small>
                  
                
              </div>
              
              
            </div>
            <!-- /.card -->


            <?php



            if (isset($_POST["comment"]) && !empty($_POST["comment"])) {
              $comment = $_POST["comment"];
              $comment = addslashes($comment);

              // requete pour exécuter la commande insert 
              $req = $pdo->exec("INSERT into commentaire (user, user_nom, article, commentaire, date_publication ) values ('$aut', '$autnom', '$id','$comment',CURRENT_TIMESTAMP)");
            }
            ?>
            <?php $id = $_GET['id'];
            $result = $pdo->query("SELECT * FROM commentaire where article='$id' order by date_publication desc "); ?>
            <div class="card card-outline-secondary my-4">
              <div class="card-header">
                Commentaires
              </div>
              <div class="card-body">
                <?php
                while ($com = $result->fetch(PDO::FETCH_OBJ)) {
                ?>
                  <p><?php echo $com->commentaire ?> </p>
                  <small class="text-muted">Ecrit par <a href="profil.php?id=<?php echo $com->user ?>"><?php echo $com->user_nom ?></a> le <?php echo $com->date_publication ?></small>
                  <hr>
                <?php }  ?>



                <form action="article.php?id=<?php echo $photo->id ?>" method="POST" enctype=" multipart/form-data">
                  <textarea class="form-control" name="comment" required></textarea>
                  <input class="btn btn-success" type="submit" action="article.php?id=<?php echo $photo->id ?>" value="Poster un commentaire">
                </form>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-lg-9 -->

        </div>

      </div>
    <?php } ?>

  <?php } else { ?>
    <div class="alert alert-danger" role="alert">
      Impossible d'afficher les détails de cette photo
    </div>
  <?php } ?>


  <?php include "inc\/footer.php" ?>



<?php } else {
  header("Location: signin.php");
} ?>