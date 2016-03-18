
<?php

$root = "../";
require "../includes.php";

use Aws\DynamoDb\Exception\DynamoDbException;

//Select all the children
try {
    //$client = DynamoDbClientBuilder::get();
    $client = LocalDBClientBuilder::get();
    $tableName = 'Contents';
    $iterator = $client->getIterator('Scan', array(
        'TableName' => $tableName,
        'ScanFilter' => array(
            'owner' => array(
                'AttributeValueList' => array(
                    array('S' => $_SESSION['email'])
                ),
                'ComparisonOperator' => 'CONTAINS'
            ),
        )
    ));

    // Each item will contain the attributes we added
    $k = 1;
    foreach ($iterator as $item) {
        // Grab the time number value
        echo 'Fichier n°'.$k.':</br>'
                . 'Titre : '. $item['title']['S'].'</br>'
                . 'Nom : <a href="../Uploads/' . $item['name']['S'] .'">'. $item['realname']['S'] . '</a></br>'
                . 'Taille : '. $item['length']['N'] .' octets</br>'
                . 'Date d\'ajout : '. $item['date']['S'].'</br>'
                . 'Date de début : '. $item['firstdate']['S'].'</br>'
                . 'Date de fin : '. $item['lastdate']['S'].'</br>';
        $total = count($item['targets']['SS']);
        if ($total > 0) {
            echo "Enfants destinataires :</br>";
           
            for ($i = 0; $i < $total; $i++) {
                echo $item['targets']['SS'][$i]. '</br>';
            }
        }

       $k++;
       echo "</br>";
    }
} catch (DynamoDbException $e) {
    echo "Unable to query:\n";
    echo $e->getMessage() . "\n";
}
?>
           
