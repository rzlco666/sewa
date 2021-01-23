<?php 

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
                  <h4 class="card-title ">Data Alat DJ</h4>
                  <p class="card-category"><a href="tambahalatdj.php">Tambah data</a></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nama Alat
                        </th>
                        <th>
                          Merk
                        </th>
                        <th>
                          Spesifikasi
                        </th>
                        <th>
                          Foto
                        </th>
                        <th>
                          Harga
                        </th>
                        <th colspan="2">
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <?php
                        require("proses_admin.php");
                        $result = $admin -> data_alatdj();
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td>
                          <?php echo $row['id_alatdj']; ?>
                          </td>
                          <td>
                          <?php echo $row['nama_alatdj']; ?>
                          </td>
                          <td>
                          <?php echo $row['merk']; ?>
                          </td>
                          <td>
                          <?php echo $row['spesifikasi']; ?>
                          </td>
                          <td>
                          <img width="100" height="100" class="img" src="<?php echo $row['foto']; ?>" />
                          </td>
                          <td>
                          <?php echo $row['harga']; ?>
                          </td>
                          <td>
                          <! -- buat edit data yg dipilih terus pas diklik langsung ke halaman edit_alatdj -->
                          <a href="edit_alatdj.php?id_alatdj=<?php echo $row['id_alatdj']; ?>"><button class="btn btn-primary"><ion-icon name="create"></ion-icon> Edit</button></a>
                          </td>
                          <td>
                          <! -- buat hapus data yg dipilih terus pas diklik langsung kehapus datanya -->
                          <a href="proses_admin.php?delete_alatdj=<?php echo $row['id_alatdj']; ?>"> <button class="btn btn-danger"><ion-icon name="trash"></ion-icon> Hapus</button></a>
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