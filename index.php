<?php 

    session_start();
    if(isset($_SESSION['login'])){
        if ($_SESSION['akses'] == "admin") {
          header("admin/dashboard.php");
        } else {
          header("dashboard.php");
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
        <div class="col-md-6">
          <h1 class="title">Join Us</h1>
          <h4>Let's be a professional | Jl. Hamka No.114, Kota Solok</h4>
          <br>
          <a href="#" target="_blank" class="btn btn-primary btn-raised btn-lg">
            Learn More
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Jasa Kami</h2>
            <h5 class="description">DJ Studio is a perfect one page template for DJ’s, Music Band, Musicians, Singers to showcase everything in their portfolio. It has mulitple variations with a custom built mp3 player so you can add your playlist and allow your customers hear it from your page itself
              Get One Hour Free Rental if u Collect 10 Hours of Rent
              So What Are u Waiting for Come And Try Our Studio !!!!!
              We Also Have a Good Deal Package and Happy Hour Promo at our Studio Please Kindly check out our instagram @Mega's Studio for further information about our Package And Promo !!!!!
              Studio Hours :
              Mon - Sunday : 12:00 - 00:00 </h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Open Booking DJ</h4>
                <p></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Equipment Rent</h4>
                <p></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Studio Disc Jockey</h4>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php 

  require("includes/footer.php");

?>