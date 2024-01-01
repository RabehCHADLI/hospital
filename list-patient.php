<?php
require_once "connexiondb.php";


$sql = 'SELECT * FROM `patients`';
$dataObject = $connexion->query($sql);
$data = $dataObject->fetchAll(PDO::FETCH_ASSOC);
$sqlrdv = 'SELECT * FROM `appointments`';
$dataObjectrdv = $connexion->query($sqlrdv);
$datardv = $dataObjectrdv->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body id ='bgbody'>
<header>
    <nav class="navbar navbar-expand-lg bg-info-subtle">
  <div class="container">
    <a class="navbar-brand" href="index.php">HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        
        <a class="nav-link active" aria-current="page" href="Ajout-Patient.php">Ajout-Patient</a>
        <a class="nav-link" href="list-patient.php">Liste Patient </a>
        <a class="nav-link" href="recherche-patient.php">Rechercher Patient</a>
        <a class="nav-link" href="ajout-rdv.php">Ajout-RDV</a>
        <a class="nav-link" href="list-rdv.php">Liste-RDV</a>
        
      </div>
    </div>
  </div>
</nav>
</header>

<div class='container'>
    <?php
    foreach ($data as $key) { ?>
        <div class='p-2 col-3 bg-light rounded-4 mb-5'>
            <p> <?php echo "<span class='fw-bold'> Nom : </span>" . $key['lastname'] . "<br>"; ?> </p>
            <p> <?php echo "<span class='fw-bold'> Prenom : </span>" . $key['firstname'] . "<br>"; ?> </p>
            <p> <?php echo "<span class='fw-bold'> Date de naissance : </span>" . $key['birthdate'] . "<br>"; ?> </p>
            <p> <?php echo "<span class='fw-bold'> Mail : </span>" . $key['mail'] . "<br>"; ?> </p>
            <p> <?php echo "<span class='fw-bold'> Phone : </span>" . $key['phone'] . "<br>"; ?> </p>
            <?php
            $rdvTrouve = false;
            foreach ($datardv as $keyrdv) {
                if ($key['id'] == $keyrdv['idPatients']) {
                    $rdvTrouve = true;
                    ?>
                    <p> <?php echo "<span class='fw-bold'> rdv : </span>" . $keyrdv['dateHour'] . "<br>"; ?> </p>
                    <?php
                    break;
                }
            }

            if ($rdvTrouve == false) {
                ?>
                <p> <?php echo "<span class='fw-bold'> rdv : </span>" . 'Aucun' . "<br>"; ?> </p>
                <?php
            }
            ?>
        </div>
    <?php } ?>
</div>




















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>