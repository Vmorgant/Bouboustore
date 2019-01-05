
<?php
	include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>
<section id="container">
      <header id="header"></header>
      
      <aside id="asideJS"></aside>
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <main>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Ajout de Client </h3>
            <div class="row mb table-sized">  
            <!-- page start-->
                <div class="col-lg-9 main-chart">
                        <form action="/back/traitementClient.php" method="post">
                            <p>Nom : <input type="text" name="nom" required /></p>
                            <p>Prenom: <input type="text" name="prenom" required /></p>
                            <p>Mail: <input type="email" name="email" required /></p>
                            <p>Telephone: <input type="tel" name="tel" required /></p>
                            <p>Langue : <input list="langue" type="text" name="langue" id="langue"></p>
                                <datalist id="langue">	
                                        <?php
                                            $QueryLangue = "SELECT DISTINCT langue FROM `client`";
                                            $Langue= $Connect->query($QueryLangue);
                                            while ($Data = mysqli_fetch_array($Langue) ){
                                                $i=0;
                                                echo "<option value='$Data[$i]'>";
                                                $i++;
                                            }
                                        ?>
                                </datalist>
                            <p>Date de début de contrat : <input type="date" name="dateDebut" required /></p>
                            <p>Date de fin de contrat : <input type="date" name="dateFin" required /></p>
                            <p>Numéro de CB <input type="text" name="numCB" /></p>
                            <p><input type="submit" value="Valider" name = "Valider"></p>
                        </form>
                </div>
            </div>
        </section>
    </section>
</html>
<?php
	mysqli_close($Connect);
?>