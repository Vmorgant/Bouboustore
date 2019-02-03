
<?php
	include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
    include("header.html");
  ?>
   
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
                                    while ($Data = $Categorie->fetch_array) {
                                        echo "<option value='.$Data[0].'>";
                                    }
                                ?>
						</datalist>
						
						<p>Fournisseur : <input list="fournisseur" type="text" name="choixFournisseur" id="choixFournisseur" required></p>
                        <datalist id="fournisseur">	
                                <?php
                                    $QueryFournisseur = "SELECT DISTINCT `nom` FROM `fournisseur`";
                                    $Fournisseur= $Connect->query($QueryFournisseur);
									
                                    while ($Data = $Fournisseur->fetch_array){
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
                        echo "<tr><td>".utf8_encode($Produit[0])."</td><td>".utf8_encode($Produit[1])."</td><td>".utf8_encode($Produit[2])."</td><td><img src=".$Produit[3]." class=\"img-circle\" width=\"50\"></td></tr>";
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
