
<?php
	include_once 'connect.php';
?>
<html lang="fr">
	<div class="content">
		<div> 
				<form action="produit.php" method="post">
                    <p>Nom : <input type="text" name="nom" required /></p>
                    <p>Descriptif: <input type="text" name="descriptif" required /></p>
                    <p>Commentaire: <input type="text" name="commentaire" required /></p>
                    <p>Image: <input type="text" name="image" required /></p>
                    <input list="categorie" type="text" name="choixCategorie" id="choixCategorie" required></p>
                        <datalist id="categorie">	
                                <?php
                                    $QueryCategorie = "SELECT DISTINCT categorieProduit FROM `categorie`";
                                    $Categorie= $Connect->query($QueryCategorie);
                                    while ($Data = mysqli_fetch_array($Categorie) ){
                                        $i=0;
                                        echo "<option value='$Data[$i]'>";
                                        $i++;
                                    }
                                ?>
                        </datalist>
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