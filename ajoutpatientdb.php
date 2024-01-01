<?php
require_once 'connexiondb.php';

$sql = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES ('" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['datee'] . "', '" . $_POST['phone'] . "', '" . $_POST['mail'] . "')";var_dump($sql);

$connexion->query($sql);
header('Location: index.php');