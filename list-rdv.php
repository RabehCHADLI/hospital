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
<?php
if (!empty($_POST['patients'])) {
    $patient = false;
    foreach ($datardv as $keyrdv) {
        if ($keyrdv['idPatients'] == $_POST['patients']) {
            $patient = true;
            break; 
        }
    }

    if ($patient) {
        foreach ($data as $key) {
            if ($key['id'] == $_POST['patients']) {
                echo "<div  class='col-3 bg-light rounded-4 mb-5 p-2'>";
                echo "<p>"  . $key['firstname'] . " a rendez-vous le : " . $keyrdv['dateHour'] . '<br>';?>
                <form action="updateRDV.php" method="post">
                    <input type="hidden" value = '<?php echo $key['id'] ?>'>
                    <input type="datetime-local" name="datee">
                    <button class='btn-danger' type="submit">Modifier rdv</button>
                </form>
                <?php echo '</div>'?>
           <?php }
        }
    } else {
        echo "<p class='col-3 bg-light rounded-4 mb-5'>Aucun rendez-vous trouvé pour le patient.</p>";?>
        <form action="list-rdv.php" method="post">
            <select name="patients" id="">
            <?php
            foreach ($data as $key) { ?>
                <option value="<?php echo $key['id'] ?>"> <?php echo $key['firstname'] ?> </option>
            <?php }
            ?>
            </select>
            <button type="submit">Afficher RDV</button>
        </form>
   <?php }
} else {
    ?>
    <form action="list-rdv.php" method='post'>
        <select name="patients">
            <?php
            foreach ($data as $key) { ?>
                <option value="<?php echo $key['id'] ?>"> <?php echo $key['firstname'] ?> </option>
            <?php }
            ?>
        </select>
        <button type="submit">Afficher RDV</button>
    </form>
<?php } ?>























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>