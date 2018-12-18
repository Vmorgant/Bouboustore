
<?php
	include_once 'connect.php';
?>
<html lang="fr">
		<div> 
				<form action="client.php" method="post">
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
				</form>
		</div>
</html>
<?php
	mysqli_close($Connect);
?>