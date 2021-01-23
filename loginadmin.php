<?php
  session_start();
    if(isset($_SESSION['login'])){
        if ($_SESSION['akses'] == "admin") {
          header("Location: admin/dashboard.php");
        } else {
          header("Location: user/dashboard.php");
        }
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: index.php");
    } 

  require("includes/header.php");

 ?>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="proses.php?loginadmin=loginadmin">
              <div class="card-header card-header-primary text-center">
                  <br>
                  <h4 class="card-title">Login Admin</h4>
                  <br>
              </div>
              <div class="card-body">
                <p class="description text-center">&nbsp;</p>
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
              </div>
              <div class="footer text-center">
                <input type="submit" class="btn btn-primary btn-link btn-wd btn-lg" name="submit" value="Login">
                <a href="daftar.php"><p class="description text-center">Belum punya akun</p></a>
                <a href="login.php"><p class="description text-center">Login Sebagai Pelanggan</p></a>
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>