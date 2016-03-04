<?php

$session = session_start();

// si le membre est connecte
if (isset($_SESSION['email'])) {


    // Constantes
    $target = '../Uploads/';    // Repertoire cible
    $maxsize = 20000000;    // Taille max en octets du fichier
    // Tableaux de donnees
    $tabExt = array('jpg', 'png', 'jpeg');    // Extensions autorisees
    $infosImg = array();

    // On remplit la table posts
    $date = date('Y-m-d H:i:s');


    /* $description = $_POST['description'];
      $theme = $_POST['theme'];
      $sql = 'INSERT INTO posts VALUES("","' . $nombrocante . '", "' . $description . '", "' . $date . '", "' . $_SESSION['id'] . '", "' . $theme . '")';
     */
    /*     * **********************************************************
     * Script d'upload pour photo 1
     * *********************************************************** */

    // On verifie si le champ est rempli
    if (!empty($_FILES['file']['name'])) {
        // Recuperation de l'extension du fichier
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        // On verifie l'extension du fichier
        if (in_array(strtolower($extension), $tabExt)) {
            // On verifie la taille de l'image
            if (filesize($_FILES['file']['tmp_name']) <= $maxsize && filesize($_FILES['file']['tmp_name']) > 0) {
                // Parcours du tableau d'erreurs
                if (isset($_FILES['file']['error']) && UPLOAD_ERR_OK === $_FILES['file']['error']) {
                    // On renomme le fichier en un nom dur a trouver
                    $nomImage = md5(uniqid('')) . '.' . $extension;

                    // Si c'est OK, on teste l'upload
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target . $nomImage)) {

                        //require_ones("accueil_adultes.php");
                        //header('Location: accueil_adultes.php');
                        ob_start();
                        echo "Fichier envoyé avec succès.<br />Redirection automatique dans 2 secondes...";
                        header("Location: accueil_adultes.php");
                        ob_end_flush();
                        
                        /* $sqlresult = mysqli_query($db, $sql);
                          if ($sqlresult) {

                          //on r&eacute;cup&egrave;re post_id de la table pr&eacute;c&eacute;dente
                          $query2 = mysqli_query($db, "SELECT * FROM posts WHERE post_date ='$date'") or die('selection date impossible' . mysqli_error($db));
                          $data = mysqli_fetch_assoc($query2); //Lit une ligne de r&eacute;sultat mysqli dans un tableau associatif
                          //on remplit la table pictures
                          $sql2 = 'INSERT INTO pictures VALUES("","' . $nomImage . '", "' . $_SESSION['id'] . '", "' . $data['post_id'] . '")';
                          $sqlresult2 = mysqli_query($db, $sql2) or die('insert pictures impossible' . mysqli_error($db));

                          if ($sqlresult2)
                          $ok1 = 1;
                          else
                          echo "Erreur dans la base de donn&eacute;es. Veuillez r&eacute;essayer." . mysqli_error($db);
                          } else
                          echo "Erreur dans la base de donn&eacute;es. Veuillez r&eacute;essayer." . mysqli_error($db);
                         * 
                         */
                    } else {
                        // Sinon on affiche une erreur systeme
                        echo 'Probl&egrave;me lors du d&eacute;placement de votre image dans notre site !';
                    }
                } else {
                    echo 'Une erreur interne a emp&ecirc;ch&eacute; l\'uplaod de l\'image';
                }
            } else {
                // Sinon erreur sur le type de l'image
                echo 'Votre premi&egrave;re image d&eacute;passe la taille maximale autoris&eacute;e de 2Mo';
            }
        } else {
            // Sinon on affiche une erreur pour l'extension
            echo 'L\'extension de votre photo 1 est incorrecte !';
        }
    }

    /*if (isset($message))
        echo $message;*/




    /* if (( $ok1 == 1 || empty($_FILES['file']['name']) ) && ( $ok2 == 1 || empty($_FILES['photo2']['name']) )) { //si (file vide ou sans erreur) et (photo2 vide ou sans erreur)
      if (empty($sqlresult)) {
      $sqlresult = mysqli_query($db, $sql);
      if (empty($data)) {
      $query2 = mysqli_query($db, "SELECT * FROM posts WHERE post_date ='$date'") or die('selection date impossible' . mysqli_error($db));
      $data = mysqli_fetch_assoc($query2); //Lit une ligne de r&eacute;sultat mysqli dans un tableau associatif
      }
      }


      echo "Brocante cr&eacute;&eacute;e avec succ&egrave;s<br />Redirection automatique dans 2 secondes...";
      header("Refresh: 2; url=../post/brocante_display.php?brocante=" . $data['post_id']);
      } */
}
?>