<?php
include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
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
        <h3><i class="fa fa-angle-right"></i> Produits</h3>
        <div class="row mb table-sized">
            
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix de vente</th>
                    <th>Fournisseur</th>
                    <th>Marge</th>
                    <th>Prix achat</th>
                    <th class="hidden-phone">Descriptif</th>
                  </tr>
                </thead>
                  
                <tbody>
                  <?php
                    $QueryProduit = "SELECT categorieProduit.nom AS \"catégorie\",produit.nom,produit.descriptif,prixPublic.prix AS \"prix de vente\" ,fournisseur.nom AS \"fournisseur\",prixPublic.marge,prixFournisseur.prix AS \"prix d'achat\" FROM produit INNER JOIN categorieProduit ON produit.id_categorie = categorieProduit.id_categorie INNER JOIN prixPublic ON produit.id_produit = prixPublic.id_produit INNER JOIN propose ON propose.id_produit=produit.id_produit INNER JOIN fournisseur ON fournisseur.id_fournisseur=propose.id_fournisseur INNER JOIN prixFournisseur ON prixFournisseur.id_prix_fournisseur=propose.id_prix_fournisseur";
                    $res=$Connect->query($QueryProduit);
                    while ($Produit = mysqli_fetch_assoc($res) ){
						 if($Produit["prix de vente"] > $Produit["prix d'achat"]){
                        $grade="gradeA";
                      }
                      else if($Produit["prix de vente"] < $Produit["prix d'achat"]){
                        $grade="gradeX";
                      }
                      else{
                        $grade="gradeW";
                      }
                      echo'
                      <tr class='.$grade.'>
                        <td class=\"center\">'.$Produit["nom"].'</td>
                        <td class=\"center\">'.utf8_encode($Produit["catégorie"]).'</td>
                        <td class=\"center\">'.$Produit["prix de vente"].'</td>
                        <td class=\"center\">'.$Produit["fournisseur"].'</td>
                        <td class=\"center\">'.$Produit["marge"].'</td>
                        <td class=\"center\">'.$Produit["prix d'achat"].'</td>
                        <td class=\"center hidden-phone\">'.utf8_encode($Produit["descriptif"]).'</td>
                      </tr>';
                    }
                  ?>  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
          </main>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer id="footer">
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="js/general.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
		headers: { 0: { sorter: false} }
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>