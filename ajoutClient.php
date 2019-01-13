
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
<body>
    <section id="container">
        <header id="header"></header>
        
        <aside id="asideJS"></aside>
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
                                <p>Langue : <select name="langue">
												<option value="fr">Français</option>
												<option value="ang">Anglais</option>
												<option value="esp">Espagnol</option>
												<option value="ru">Russe</option>
								  			</select>
								</p>
                                <p>Date de début de contrat : <input type="date" name="dateDebut" required /></p>
                                <p>Date de fin de contrat : <input type="date" name="dateFin" required /></p>
                                <p>Numéro de CB <input type="text" name="numCB" /></p>
                                <p><input type="submit" value="Valider" name = "Valider"></p>
                            </form>
                    </div>
                </div>
            </section>
        </section>
        <section id="container">
        <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th >Mail</th>
                    <th >Téléphone</th>
                    <th >Langue</th>
                    <th >Fin du contrat</th>
                    <th >Point de fidélité</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $QueryClient = "SELECT nom,prenom,mail,telephone,langue,date_fin_contrat,point_fidelite FROM client";
                    $clientList= $Connect->query($QueryClient);
                    while ($Data = mysqli_fetch_array($clientList) ){
                        echo("
                        <tr>
                            <td class='center'>".$Data[0]."</td>
                            <td class='center'>".$Data[1]."</td>
                            <td class='center'>".$Data[2]."</td>
                            <td class='center'>".$Data[3]."</td>
                            <td class='center'>".$Data[4]."</td>
                            <td class='center'>".$Data[5]."</td>
                            <td class='center'>".$Data[6]."</td>
                        </tr>
                        ")
                    }
                ?>
                </tbody>
              </table>
            </div>
        </div>                      
        </section>
    </body>
</html>
<?php
	mysqli_close($Connect);
?>