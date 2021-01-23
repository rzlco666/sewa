<?php 

  require("includes/sidebar.php");
  require("proses_admin.php");

 ?>
    <div class="main-panel">
      <?php 

      require("includes/navbar.php");

     ?>

      <div class="content">
        <div class="container-fluid">
          <h4>Dashboard</h4>
          <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $user = $admin -> list_user();
                    ?>
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Total Pengguna</p>
                  <h3 class="card-title"><?php echo mysqli_num_rows($user); ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="listuser.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $alatdj = $admin -> data_alatdj();
                    ?>
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Data Alat DJ</p>
                  <h3 class="card-title"><?php echo mysqli_num_rows($alatdj); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="alatdj.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $histori = $admin -> histori_sewa();
                    ?>
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Data Penyewaan</p>
                  <h3 class="card-title"><?php echo mysqli_num_rows($histori); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="sewa.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                </div>
                <div class="card-body">
                  <h4 class="card-title">Grafik Penyewaan</h4>
                      <canvas id="myChart"></canvas>
                      <script>
                      var ctx = document.getElementById('myChart').getContext('2d');
                      var myChart = new Chart(ctx, {
                          type: 'pie',
                          data: {
                              labels: ['XDJ 1000 MK2', 'XDJ-RX', 'CDJ 2000NXS'],
                              datasets: [{
                                  label: '# of Votes',
                                  data: [
                                        <?php
                                        $alatdj1 = $admin -> alat_dj1();
                                        echo mysqli_num_rows($alatdj1);
                                         ?>, 
                                         <?php
                                        $alatdj2 = $admin -> alat_dj2();
                                        echo mysqli_num_rows($alatdj2);
                                         ?>, 
                                         <?php
                                         $alatdj3 = $admin -> alat_dj3();
                                          echo mysqli_num_rows($alatdj3);
                                         ?>],

                                  backgroundColor: [
                                      'rgba(255, 99, 132, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)'
                                  ],
                                  borderColor: [
                                      'rgba(255, 99, 132, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)'
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                      ticks: {
                                          beginAtZero: true
                                      }
                                  }]
                              }
                          }
                      });
                      </script>
                 
                </div>
              </div>
            </div>
            <div class="col-md-6  ">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                </div>
                <div class="card-body">
                  <h4 class="card-title">Total Penyewaan</h4>
                      <canvas id="myChart2"></canvas>
                      <script>
                      var ctx = document.getElementById('myChart2').getContext('2d');
                      var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: ['Des', 'Jan', 'Feb','Mar'],
                              datasets: [{
                                  label: 'Penyewaan',
                                  data: [
                                        <?php
                                        $pen = $admin -> penyewaan();
                                        echo mysqli_num_rows($pen);
                                         ?>],
                                  backgroundColor: [
                                      'rgba(255, 99, 132, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)'
                                  ],
                                  borderColor: [
                                      'rgba(255, 99, 132, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)'
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                      ticks: {
                                          beginAtZero: true
                                      }
                                  }]
                              }
                          }
                      });
                      </script>
                </div>
              </div>
            </div>
        </div>
      </div>


      <?php 

      require("includes/footer2.php");

     ?>
      