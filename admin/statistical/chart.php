<div class="row">
  <div class="row frmtitle grid-margin">

  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript"></script>
  <div class="row frmcontent">
    <div class="row mb10 frmdsloai">
      <h2 class="card-title">Biểu đồ thống kê</h2>
      <div id="myChart" style="width:100%; max-width:100%; height:500px;">
      </div>


      <script>
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            <?php
            $tongdm = count($listthongke);
            $i = 1;
            foreach ($listthongke as $thongke) {
              extract($thongke);
              if ($i == $tongdm) $dauphay = "";
              else $dauphay = ",";
              echo " ['" . $thongke['categori_name'] . "', " . $thongke['countpr'] . "]" . $dauphay;
              $i += 1;
            }

            ?>
          ]);

          var options = {
            // title: 'Biểu đồ thống kê',
            is3D: true
          };

          var chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);
        }
      </script>



    </div>

  </div>
</div>
<div class="thaotac">
  <div class="">
    <a href="index.php?act=list_statistical"><input class="btn btn-primary mt-2" type="button" value="Xem thống kê"></a>
  </div>
</div>