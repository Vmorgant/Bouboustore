
<?php
	include_once 'connect.php';
?>
<html lang="fr">
	<div>
		<div> 
				<form action="produit.php" method="post">
                    <p>Nom : <input type="text" name="nom" required /></p>
                    <p>Descriptif: <input type="text" name="descriptif" /></p>
                    <p>Commentaire: <input type="text" name="commentaire" /></p>
                    <p>Image: <input type="text" name="image" /></p>
                    <p>Categorie : <input list="categorie" type="text" name="choixCategorie" id="choixCategorie" required></p>
                        <datalist id="categorie">	
                                <?php
                                    $QueryCategorie = "SELECT DISTINCT `categorieProduit` FROM `categorie`";
                                    $Categorie= $Connect->query($QueryCategorie);
                                    $i=0;
                                    while ($Data = mysqli_fetch_array($Categorie) ){
                                        echo "<option value='$Data[$i]'>";
                                        $i++;
                                    }
                                ?>
						</datalist>
						
						<p>Fournisseur : <input list="fournisseur" type="text" name="choixFournisseur" id="choixFournisseur" required></p>
                        <datalist id="fournisseur">	
                                <?php
                                    $QueryFournisseur = "SELECT DISTINCT `nom` FROM `fournisseur`";
                                    $Fournisseur= $Connect->query($QueryFournisseur);
                                    $i=0;
                                    while ($Data = mysqli_fetch_array($Fournisseur) ){
                                        echo "<option value='$Data[$i]'>";
                                        $i++;
                                    }
                                ?>
						</datalist>
					<p>Prix achat: <input type="number" name="prix" required /></p>
					<p>Devise : <input list="devise" type="text" name="choixDevise" id="choixDevise" required></p>
                        <datalist id="devise">	
                                <?php
                                    $QueryDevise = "SELECT DISTINCT `abreviation` FROM `devise`";
                                    $Devise= $Connect->query($QueryDevise);
                                    $i=0;
                                    while ($Data = mysqli_fetch_array($Devise) ){
                                        echo "<option value='$Data[$i]'>";
                                        $i++;
                                    }
                                ?>
						</datalist>
					<p><input type="submit" value="Valider" name = "Valider"></p>
				</form>
		</div>
		<div>
			<?php
				$QueryProduit = "SELECT `nom`,`descriptif`,`commentaire`,`image` FROM `produit`";
				$Result= $Connect->query($QueryProduit);
				echo "<table> ";
				echo"<tr><th>nom</th><th>descriptif</th> <th>commentaire</th> <th>image</th></tr>";
				while ($Produit = mysqli_fetch_array($Result) ){
					echo " <tr><td>".$Produit[0]."</td><td>".$Produit[1]."</td><td>".$Produit[2]."</td><td>".$Produit[3]."</td></tr>";
				}
			?>
		</div>
	</div>
</html>
<?php
	mysqli_close($Connect);
?>