<?php 
session_start();
  require("includes/sidebar.php");
  require("proses_user.php");
    $data = new data(); 
    $id_user = $_SESSION['id_user'];
    $result = $data->tampil_data($id_user);
    $row = mysqli_fetch_assoc($result);

 ?>
    <div class="main-panel">
      <?php 

      require("includes/navbar.php");

     ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                  <form>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" disabled value="<?php echo $row['nama']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" disabled value="<?php echo $row['email']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">No HP</label>
                          <input type="text" class="form-control" disabled value="<?php echo $row['hp']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" disabled value="<?php echo $row['alamat']; ?>">
                        </div>
                      </div>
                    </div>
                    <a href="editprofile.php" class="btn btn-primary pull-right">Edit Profile</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?php echo $row['foto']; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Pengguna</h6>
                  <h4 class="card-title"><?php echo $row['nama']; ?></h4>
                  <p class="card-description">
                    <?php echo $row['email']; ?> <br> <?php echo $row['hp']; ?> <br> <?php echo $row['alamat']; ?>
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php 

      require("includes/footer2.php");

     ?>