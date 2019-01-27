
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
    <header id="header">
        <?php
        include("header.html");
        ?>
    </header>

    <aside id="asideJS">
        <?php
        include("aside.html");
        ?>
    </aside>
   
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Ajout de Produit </h3>
        <div class="row mb table-sized"> 
		<div> 
				<form action="back/traitementProduit.php" method="post">
                    <p>Nom : <input type="text" name="nom" required /></p>
                    <p>Descriptif: <input type="text" name="descriptif" /></p>
                    <p>Commentaire: <input type="text" name="commentaire" /></p>
                    <p>Image: <input type="text" name="image" /></p>
                    <p>Categorie : <input list="categorie" type="text" name="choixCategorie" id="choixCategorie" required></p>
                        <datalist id="categorie">	
                                <?php
                                    $QueryCategorie = "SELECT DISTINCT `categorieProduit` FROM `categorie`";
                                    $Categorie= $Connect->query($QueryCategorie);
                                    while ($Data = mysqli_fetch_array($Categorie) ){
                                        echo "<option value='.$Data[0].'>";
                                    }
                                ?>
						</datalist>
						
						<p>Fournisseur : <input list="fournisseur" type="text" name="choixFournisseur" id="choixFournisseur" required></p>
                        <datalist id="fournisseur">	
                                <?php
                                    $QueryFournisseur = "SELECT DISTINCT `nom` FROM `fournisseur`";
                                    $Fournisseur= $Connect->query($QueryFournisseur);
                                    while ($Data = mysqli_fetch_array($Fournisseur) ){
                                        echo "<option value=.'$Data[0].'>";
                                    }
                                ?>
						</datalist>
					<p>Prix achat: <input type="number" name="prix" required /></p>
					<p>Devise : <input list="devise" type="text" name="choixDevise" id="choixDevise" required></p>
                        <datalist id="devise">	
                                <?php
                                    $QueryDevise = "SELECT DISTINCT `abreviation` FROM `devise`";
                                    $Devise= $Connect->query($QueryDevise);
                                    while ($Data = mysqli_fetch_array($Devise) ){
                                        echo "<option value='.$Data[0].'>";
                                    }
                                ?>
						</datalist>
					<p><input type="submit" value="Valider" name = "Valider"></p>
				</form>
        </div>
        </section>
    </section>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Nos produits </h3>
            <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info"> 
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th class="hidden-phone">Descriptif</th>
                    <th class="hidden-phone">Commentaire</th>
                    <th class="hidden-phone">Image</th>
                  </tr>
                </thead>
                <?php
                    $QueryProduit = "SELECT `nom`,`descriptif`,`commentaire`,`image` FROM `produit`";
                    $Result= $Connect->query($QueryProduit);
                    while ($Produit = mysqli_fetch_array($Result) ){
                        echo "<tr><td>".$Produit[0]."</td><td>".$Produit[1]."</td><td>".$Produit[2]."</td><td><img src=".$Produit[3]."></td></tr>";
                    }
                ?>
              </table>
            </div>
        </section>
    </section>
</section>
          <footer id="footer site-footer  ">
              <?php
              include("footer.html");
              ?>
          </footer>
</body>
</html>
<?php
	mysqli_close($Connect);
?>