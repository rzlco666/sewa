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
                          Nama User
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
                        //memanggil proses_user.php terus manggil fungsi data_alatdj buat nampilin semua data alat dj
                        require("proses_user.php");
                        $result = $data -> histori_sewa();
                        //while buat menampilkan semua data yg ada di data alat dj
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td>
                          <?php
                            $data = new data(); 
                            $id_user = $_SESSION['id_user'];
                            $result_user = $data->tampil_data($id_user);
                            $row_user = mysqli_fetch_assoc($result_user);
                            echo $row_user['nama']; 
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
                           echo "Rp " . number_format($row['denda']); 
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
                          <?php
                            if($row['lunas'] == 0) { echo "Masih Dipinjam"; } else { ?> <a href='cetak.php?id_sewa=<?php echo $row['id_sewa'];?>' target='_blank' class='btn btn-primary'>Lunas | Cetak Nota</a>"; <?php } ?>
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