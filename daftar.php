<?php 

  require("includes/header.php");

 ?>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="proses.php?registrasi=regis">
              <div class="card-header card-header-primary text-center">
              <h4 class="card-title">Daftar</h4>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="nama" class="form-control" placeholder="Nama...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">house</i>
                    </span>
                  </div>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">phone_iphone</i>
                    </span>
                  </div>
                  <input type="number" name="hp" class="form-control" placeholder="No HP...">
                </div>
              </div>
              <div class="footer text-center">
                <input type="submit" value="Daftar" class="btn btn-primary btn-link btn-wd btn-lg" name="Register">
                <a href="login.php"><p class="description text-center">Sudah punya akun</p></a>
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>