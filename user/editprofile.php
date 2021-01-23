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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                </div>

                <! -- setiap input type... dipakein value fungsinya buat ngambil data yg mau diedit biar bisa muncul di form -->

                <div class="card-body">
                  <form action="proses_user.php?edit_profile=<?php echo $id_user; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">No HP</label>
                          <input type="text" name="hp" class="form-control" value="<?php echo $row['hp']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Foto</label>
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <a href="profile.php" class="btn btn-danger pull-right">Cancel</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php 

      require("includes/footer2.php");

     ?>