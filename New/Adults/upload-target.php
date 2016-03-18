<html lang="fr">
    <head>
        <title>Upload</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
        $session = session_start();

        $root = "../";
        require "../includes.php";

        use Aws\DynamoDb\Exception\DynamoDbException;

// If the member is logged in
        if (isset($_SESSION['email'])) {

            // Constants
            $target = '../Uploads/';    // Destination
            $infosFile = array();
            $date = date('Y-m-d H:i:s');

            // If there is a file
            if (!empty($_FILES['file']['name'])) {
                // Count # of uploaded files in array
                $total = count($_FILES['file']['name']);
                for ($i = 0; $i < $total; $i++) {
                    // Take the extension info
                    $extension = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
                    $length = filesize($_FILES['file']['tmp_name'][$i]); //in Bytes
                    // Check if there is an error
                    if (isset($_FILES['file']['error'][$i]) && UPLOAD_ERR_OK === $_FILES['file']['error'][$i]) {
                        // Rename the file
                        $realname = basename($_FILES['file']['name'][$i]);
                        $name = md5(uniqid('')) . '.' . $extension;
                        // Upload
                        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target . $name)) {

                            // Add the new element in the database
                            try {
                                $client = LocalDBClientBuilder::get(); //DynamoDbClientBuilder::get();

                                $array = array();

                                $owner = $_SESSION['email'];
                                $title = $_POST['title'];
                                $firstdate = $_POST['firstdate'];
                                $firsthour = $_POST['firsthour'];
                                $lastdate = $_POST['lastdate'];
                                $lasthour = $_POST['lasthour'];

                                $array['name'] = array('S' => $name);
                                $array['owner'] = array('S' => $owner);
                                $array['realname'] = array('S' => $realname);
                                $array['date'] = array('S' => $date);
                                $array['length'] = array('N' => $length);
                                $array['title'] = array('S' => $title);
                                /* $array['test'] = array('L' => array(
                                  array('M' => array(
                                  'type' => array('S' => 'mobile'),
                                  'number' => array('S' => '5555555555')
                                  )),
                                  array('M' => array(
                                  'type' => array('S' => 'home'),
                                  'number' => array('S' => '5555555556')
                                  )),
                                  )); */
                                $targets = array();
                                if (isset($_POST['target'])) {
                                    if (is_array($_POST['target'])) {

                                        foreach ($_POST['target'] as $value) {
                                            array_push($targets, "$value");
                                        }
                                    } else {
                                        $value = $_POST['target'];
                                        array_push($targets, "$value");
                                    }
                                }


                                $array['targets'] = array('SS' => $targets);
                                $array['firstdate'] = array('S' => $firstdate . " " . $firsthour);
                                $array['lastdate'] = array('S' => $lastdate . " " . $lasthour);
                                //...Add anything in the array...

                                $client->putItem(array(
                                    'TableName' => 'Contents',
                                    'Item' => $array
                                ));


                                echo "Fichier envoyé avec succès.";
                            } catch (DynamoDbException $e) {
                                echo 'Exception dynamoDB reçue : ' . $e->getMessage();
                            } catch (Exception $e) {
                                echo 'Exception reçue : ' . $e->getMessage();
                            }
                        } else {
                            echo "ERREUR : Problème lors du déplacement de votre fichier dans notre site !";
                        }
                    } else {

                        echo "ERREUR : Une erreur interne a empêché l'upload du fichier";
                    }
                }
            } else {

                echo"ERREUR : Aucun fichier sélectionné.";
            }
        }
        ?>
    </body>
</html>