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
                    <th>Produit</th>
                    <th>Fournisseur</th>
                    <th class="hidden-phone">Prix d'achat</th>
                    <th class="hidden-phone">Prix de vente (HT)</th>
                    <th class="hidden-phone">Stock</th>
                  </tr>
                </thead>
                  
                <tbody>
                    <!--    gradeA = vert
                            gradeC = bleu-violet
                            gradeU = gris
                            gradeX = rouge
                            gradeW = blanc
                    -->
                    <tr class="gradeU">
                        <td class="center">Chanel N°5 20 ml</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">39</td>
                        <td class="center hidden-phone">45</td>
                        <td class="center hidden-phone">0</td>
                    </tr>
                    
                    <tr class="gradeU">
                        <td class="center">Hugo Boss 30 ml </td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">35</td>
                        <td class="center hidden-phone">46.10</td>
                        <td class="center hidden-phone">0</td>
                    </tr>
                    
                    <tr class="gradeU">
                        <td class="center">Hugo Boss 30 ml </td>
                        <td class="center">Makeup.com</td>
                        <td class="center hidden-phone">40</td>
                        <td class="center hidden-phone">46</td>
                        <td class="center hidden-phone">0</td>
                    </tr>
                    
                    <tr class="gradeU">
                        <td class="center">Chanel N°5 20 ml</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">39</td>
                        <td class="center hidden-phone">45</td>
                        <td class="center hidden-phone">0</td>
                    </tr>
                    
                    <tr class="gradeX">
                        <td class="center"> HUGO WOMAN 30 ml</td>
                        <td class="center">Makeup.com</td>
                        <td class="center hidden-phone">65</td>
                        <td class="center hidden-phone">80</td>
                        <td class="center hidden-phone">3</td>
                    </tr>
                    
                    <tr class="gradeX">
                        <td class="center">HUGO WOMAN 30 ml</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">50</td>
                        <td class="center hidden-phone">80</td>
                        <td class="center hidden-phone">4</td>
                    </tr>
                    
                    
                    <tr class="gradeX">
                        <td class="center">Boss Bottled Night 20 ml</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">65</td>
                        <td class="center hidden-phone">80</td>
                        <td class="center hidden-phone">5</td>
                    </tr>
                    
                    
                    <tr class="gradeX">
                        <td class="center">Boss The Scent Intense For Her 30 ml</td>
                        <td class="center">MTFBWU.com</td>
                        <td class="center hidden-phone">79</td>
                        <td class="center hidden-phone">12O</td>
                        <td class="center hidden-phone">4</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">Boss Bottled Night 20 ml</td>
                        <td class="center">MTFBWU.com</td>
                        <td class="center hidden-phone">89</td>
                        <td class="center hidden-phone">120</td>
                        <td class="center hidden-phone">20</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">La Petite Robe Noire</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">90</td>
                        <td class="center hidden-phone">120</td>
                        <td class="center hidden-phone">50</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">La Petite Robe Noire</td>
                        <td class="center">MTFBWU.com</td>
                        <td class="center hidden-phone">100</td>
                        <td class="center hidden-phone">150</td>
                        <td class="center hidden-phone">20</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">Mon Guerlain</td>
                        <td class="center">MTFBWU.com</td>
                        <td class="center hidden-phone">200</td>
                        <td class="center hidden-phone">250</td>
                        <td class="center hidden-phone">30</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">Mon Guerlain</td>
                        <td class="center">Nocibé</td>
                        <td class="center hidden-phone">120</td>
                        <td class="center hidden-phone">250</td>
                        <td class="center hidden-phone">15</td>
                    </tr>
                    
                    <tr class="gradeW">
                        <td class="center">Mon Guerlain</td>
                        <td class="center">Makeup.com</td>
                        <td class="center hidden-phone">120</td>
                        <td class="center hidden-phone">250</td>
                        <td class="center hidden-phone">30</td>
                    </tr>
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