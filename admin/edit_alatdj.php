<?php 
  require("proses_admin.php");
  $id_alatdj = $_GET['id_alatdj'];
  $result = $admin->tampil($id_alatdj);
  $row = mysqli_fetch_assoc($result);
  require("includes/sidebar.php");

 ?>
    <script src="https://cdn.tiny.cloud/1/gtfq0mfsmjkv60gz3r2b0o2u7o7fm3erd18uwakwtq84hoeh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                  <h4 class="card-title">Edit Data</h4>
                  <p class="card-category">Alat DJ</p>
                </div>

                <! -- setiap input type... dipakein value fungsinya buat ngambil data yg mau diedit biar bisa muncul di form -->

                <div class="card-body">
                  <form action="proses_admin.php?edit_alatdj=alatdj" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Alat DJ</label>
                          <input type="text" name="nama_alatdj" class="form-control" value="<?php echo $row['nama_alatdj']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Merk Alat DJ</label>
                          <input type="text" name="merk" class="form-control" value="<?php echo $row['merk']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Spesifikasi</label>
                          <textarea name="spesifikasi" class="form-control" id="tiny"><?php echo $row['spesifikasi']; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Foto</label>
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="foto">
                            <label class="custom-file-label" for="foto"><?php echo $row['foto']; ?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga per Jam</label>
                          <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
                          <input type="hidden" name="id_alatdj" value="<?php echo $row['id_alatdj']; ?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <a href="alatdj.php" class="btn btn-danger pull-right">Cancel</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        tinymce.init({
          selector: 'textarea#tiny',
          plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Megas Studio',
        });
      </script>
      
      <?php 

      require("includes/footer2.php");

     ?>