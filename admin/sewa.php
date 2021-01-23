<?php 
  session_start();
  require("includes/sidebar.php");

 ?>
    <div class="main-panel">
      <?php 

      require("includes/navbar.php");

     ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">History Sewa</h4>
                  <p class="card-category">Alat DJ</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Email User
                        </th>
                        <th>
                          Nama Alat DJ
                        </th>
                        <th>
                          Tanggal Sewa
                        </th>
                        <th>
                          Tanggal Kembali
                        </th>
                        <th>
                          Tanggal Dikembalikan
                        </th>
                        <th>
                          Denda
                        </th>
                        <th>
                          Total Sewa
                        </th>
                        <th>
                          Grand Total
                        </th>
                        <th>
                          Keterangan
                        </th>
                      </thead>
                      <tbody>
                      <?php
                        require("proses_admin.php");
                        $result = $admin -> histori_sewa();
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td>
                          <?php
                            echo $row['email']; 
                          ?>
                          </td>
                          <td>
                          <?php
                            echo $row['nama_alatdj']; 
                          ?>
                          </td>
                          <td>
                          <?php
                            echo $row['tgl_sewa']; 
                          ?>
                          </td>
                          <td>
                          <?php
                            echo $row['tgl_kembali']; 
                          ?>
                          </td>
                          <td>
                          <?php
                            if($row['tgl_dikembalikan'] != "0000-00-00") { echo $row['tgl_dikembalikan']; } else { echo "-"; } 
                          ?>
                          </td>
                          <td>
                          <?php
                            echo $row['denda']; 
                          ?>
                          </td>
                          <td>
                          <?php
                            echo "Rp " . number_format($row['total_sewa']);
                          ?>
                          </td>
                          <td>
                          <?php
                            echo "Rp " . number_format($row['total_sewa'] + $row['denda']);
                          ?>
                          </td>
                          <td>
                          <?php if($row['tgl_dikembalikan'] == "0000-00-00") { ?>
                            <a href="proses_admin.php?konfirmasi=<?php echo $row['id_sewa']; ?>" class="btn btn-success">Konfirmasi</a>
                            <?php } else { if($row['denda'] == 0){
                                echo "Lunas";
                            }else{
                                if($row['lunas'] == "1") {
                                  echo "Lunas";
                                }else{
                                ?>
                                <a href="proses_admin.php?bayar=<?php echo $row['id_sewa']; ?>" class="btn btn-info">Bayar Denda</a>
                            <?php
                              }
                            } ?>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php
                        }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
      <?php 

      require("includes/footer2.php");

     ?>