<?php
require_once 'connexiondb.php';
$sql = "INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES ('" . $_POST['datee'] . "', " . $_POST['patients'] . ")";
$connexion->query($sql);
header('Location: list-rdv.php');