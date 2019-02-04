
<?php
	include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
    include("header.html");
  ?>

    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Ajout de Client </h3>
                <div class="row mb table-sized">  
                <!-- page start-->
                    <div class="col-lg-9 main-chart">
                            <form action="/back/traitementClient.php" method="post">
                                <div class="field" ><p>Nom :</p><input type="text" name="nom" required /></div>
                                <div class="field" ><p>Prenom: </p><input type="text" name="prenom" required /></div>
                                <div class="field" ><p>Mail: </p><input type="email" name="email" required /></div>
                                <div class="field" ><p>Telephone: </p><input type="tel" name="tel" required /></div>
                                <div class="field" ><p>Langue : </p><select name="langue">
												<option value="fr">Français</option>
												<option value="ang">Anglais</option>
												<option value="esp">Espagnol</option>
												<option value="ru">Russe</option>
								  			</select>
                                </div>
                                <div class="field" ><p>Date de début de contrat : </p><input type="date" name="dateDebut" required /></div>
                                <div class="field" ><p>Date de fin de contrat : </p><input type="date" name="dateFin" required /></div>
                                <div class="field" ><p>Numéro de CB </p><input type="text" name="numCB" /></div>
                                <p><input type="submit" value="Valider" name = "Valider"></p>
                            </form>
                    </div>
                </div>
            <div class="adv-table myTable">
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
                        ");
                    }
                ?>
                </tbody>
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