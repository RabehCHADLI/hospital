<?php
require_once 'connexiondb.php';


$sql = 'SELECT * FROM `patients`';
$dataObject = $connexion->query($sql);
$data = $dataObject->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $key ) {
    if($key['id'] == $_POST['id'] ){
        $sql = "UPDATE `patients`
        SET `lastname` = '{$_POST['nom']}',
            `firstname` = '{$_POST['prenom']}',
            `birthdate` = '{$_POST['datee']}',
            `phone` = '{$_POST['phone']}',
            `mail` = '{$_POST['mail']}'
        WHERE `id` = {$_POST['id']}";
        $connexion->query($sql);
    }
}
header('Location: recherche-patient.php');