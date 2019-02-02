
<?php
	include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<body>
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
                        ");
                    }
                ?>
                </tbody>
              </table>
            </div>
        </div>                      
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