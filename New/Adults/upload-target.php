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
    if (!empty($_FILES['file_to_upload']['name'])) {
        // Take the extension info
        $extension = pathinfo($_FILES['file_to_upload']['name'], PATHINFO_EXTENSION);
        $length = filesize($_FILES['file_to_upload']['tmp_name']); //in Bytes
        // Check if there is an error
        if (isset($_FILES['file_to_upload']['error']) && UPLOAD_ERR_OK === $_FILES['file_to_upload']['error']) {
            // Rename the file
            $realname = basename($_FILES['file_to_upload']['name']);
            $name = md5(uniqid('')) . '.' . $extension;
            // Upload
            if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $target . $name)) {

                // Add the new element in the database
                try {
                    $client = LocalDBClientBuilder::get(); //DynamoDbClientBuilder::get();

                    $array = array();

                    $owner = $_SESSION['email'];

                    $array['name'] = array('S' => $name);
                    $array['owner'] = array('S' => $owner);
                    $array['realname'] = array('S' => $realname);
                    $array['date'] = array('S' => $date);
                    $array['length'] = array('N' => $length);
                    //...Add anything in the array...
                    
                    $client->putItem(array(
                        'TableName' => 'Contents',
                        'Item' => $array
                    ));

                    echo 'Fichier envoyé avec succès.';
                } catch (DynamoDbException $e) {
                    echo 'Exception dynamoDB reçue : ', $e->getMessage();
                } catch (Exception $e) {
                    echo 'Exception reçue : ', $e->getMessage();
                }
            } else {
                header('HTTP/1.1 500 Internal Server Error');
                header('Content-type: text/plain');
                $msg = "ERREUR : Problème lors du déplacement de votre fichier dans notre site !";
                exit($msg);
            }
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-type: text/plain');
            $msg = "ERREUR : Une erreur interne a empêché l'upload de l'image";
            exit($msg);
        }
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        $msg = "ERREUR : Aucun fichier sélectionné.";
        exit($msg);
    }
}
?>