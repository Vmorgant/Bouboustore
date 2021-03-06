
<?php
  include_once 'connect.php';
  $QueryPireVente = "SELECT `nom`,`image`,`quantite` from `produit` NATURAL JOIN (SELECT id_produit,COUNT(*)*quantite AS quantite FROM `livraison` GROUP BY `id_produit` ORDER BY `quantite` ASC LIMIT 1) AS maxProduit";
  $res=$Connect->query($QueryPireVente);
  if ($res) {
  	$PireVente= $res->fetch_assoc();
  }
  $QueryMeilleureVente = "SELECT `nom`,`image`,`quantite` from `produit` NATURAL JOIN (SELECT id_produit,COUNT(*)*quantite AS quantite FROM `livraison` GROUP BY `id_produit` ORDER BY `quantite` DESC LIMIT 1) AS maxProduit";
  $res2=$Connect->query($QueryMeilleureVente);
  if ($res2){
	  $MeilleureVente = $res2->fetch_assoc();
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
    include("header.html");
  ?>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
              
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Chiffre d'affaires </h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                <li><span>10.000</span></li>
                <li><span>8.000</span></li>
                <li><span>6.000</span></li>
                <li><span>4.000</span></li>
                <li><span>2.000</span></li>
                <li><span>0</span></li>
              </ul>
              <div class="bar">
                <div class="title">MAI</div>
                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
              </div>
              <div class="bar ">
                <div class="title">JUIN</div>
                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
              </div>
              <div class="bar">
                <div class="title">JUILLET</div>
                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
              </div>
              <div class="bar">
                <div class="title">AOÛT</div>
                <div class="value tooltips" data-original-title="5.500" data-toggle="tooltip" data-placement="top">55%</div>
              </div>
              <div class="bar">
                <div class="title">SEPTEMBRE</div>
                <div class="value tooltips" data-original-title="7.200" data-toggle="tooltip" data-placement="top">72%</div>
              </div>
              <div class="bar">
                <div class="title">OCTOBRE</div>
                <div class="value tooltips" data-original-title="7.200" data-toggle="tooltip" data-placement="top">72%</div>
              </div>
              <div class="bar">
                <div class="title">NOVEMBRE</div>
                <div class="value tooltips" data-original-title="3.000" data-toggle="tooltip" data-placement="top">30%</div>
              </div>
            </div>
            <!--custom chart end-->
              
            <div class="col-md-3 mb">
              <!-- TOP Produit -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>Produit le plus vendu</h5>
                </div>
                <p><img src=<?php echo $MeilleureVente["image"]; ?> class="img-circle" width="50"></p>
                <p><b><?php echo $MeilleureVente["nom"]; ?></b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">Nombre de vente</p>
                    <p><?php echo $MeilleureVente["quantite"]; ?></p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">Profit total</p>
                    <p>100€</p>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="col-md-3 mb">
              <!-- TOP Catégorie -->
              <div class="green-panel pn">
                <div class="green-header">
                  <h5>Catégorie la plus vendue</h5>
                </div>
                <p><img src="img/parfum.jpg" class="img-circle" width="50"></p>
                <p><b>Parfum</b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">Nombre de vente</p>
                    <p>200</p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">Profit total</p>
                    <p>10000€</p>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="col-md-3 mb">
              <!-- LOW Produit -->
              <div class="darkblue-panel pn">
                <div class="darkblue-header">
                  <h5>Produit le moins vendu</h5>
                </div>
                <p><img src=<?php echo $PireVente["image"]; ?> class="img-circle" width="50"></p>
                <p><b><?php echo $PireVente["nom"]; ?></b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">Nombre de vente</p>
                    <p><?php echo $PireVente["quantite"]; ?></p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">Profit total</p>
                    <p>30€</p>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="col-md-3 mb">
              <!-- LOW Catégorie -->
              <div class="green-panel pn">
                <div class="green-header">
                  <h5>Catégorie la moins vendue</h5>
                </div>
                <p><img src="img/rougeaLevre.jpg" class="img-circle" width="50"></p>
                <p><b>Rouge à lèvre</b></p>
                <div class="row">
                  <div class="col-md-6">
                    <p class="small mt">Nombre de vente</p>
                    <p>10</p>
                  </div>
                  <div class="col-md-6">
                    <p class="small mt">Profit total</p>
                    <p>200€</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4>Compte rendu journalier</h4>
              <canvas id="newchart" height="130" width="130"></canvas>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
              <div class="panel-body">
                <div class="chart">
                  <div class="centered">
                    <span>Chiffre d'affaires du jour</span>
                    <strong>149,99 € | 15%</strong>
                  </div>
                  <br>
                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                </div>
              </div>
            </div>
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">Activé recente</h4>
            <!-- First Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>A l'instant</muted>
                  <br/>
                  <a href="#">Paul Rudd</a> a acheté un parfum.<br/>
                </p>
              </div>
            </div>
            <!-- Second Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>Il y a 3 heures</muted>
                  <br/>
                  <a href="#">Diana Kennedy</a> a acheté un coffret bien-être.<br/>
                </p>
              </div>
            </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
      <?php
        include("footer.html");
      ?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="js/general.js"></script>
  <script src="lib/chart-master/Chart.js"></script>
  <script>
    var doughnutData = [{
        value: 70,
        color: "#4ECDC4"
      },
      {
        value: 30,
        color: "#fdfdfd"
      }
    ];
    var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
  </script>

  <script src="js/src/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
    
</body>

</html>
<?php
	mysqli_close($Connect);
?>
