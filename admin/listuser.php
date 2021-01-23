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
                  <h4 class="card-title ">Data Pengguna</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID Pengguna
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Alamat
                        </th>
                        <th>
                          No HP
                        </th>
                        <th>
                          Foto
                        </th>
                      </thead>
                      <tbody>
                      <?php
                        require("proses_admin.php");
                        $result = $admin -> list_user();
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td>
                          <?php echo $row['id_user']; ?>
                          </td>
                          <td>
                          <?php echo $row['nama']; ?>
                          </td>
                          <td>
                          <?php echo $row['email']; ?>
                          </td>
                          <td>
                          <?php echo $row['alamat']; ?>
                          </td>
                          <td>
                          <?php echo $row['hp']; ?>
                          </td>
                          <td>
                          <img width="100" height="100" class="img" src="../user/<?php echo $row['foto']; ?>" />
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