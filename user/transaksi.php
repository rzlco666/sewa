<?php 
  require("includes/sidebar.php");

 ?>
      <div class="main-panel">
      <?php 

      require("includes/navbar.php");

     ?>
     <div class="content">
        <form action="proses_user.php?sewa_alatdj=alatdj" method="Post">
        <table>
            <div class="container-fluid">
                <div class="row">
                    <div class="col md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title">Transaksi</h4>
                        <p class="card-category">Alat DJ</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="fornsewa">ID Alat DJ</label>
                            <select name="id_alatdj" id="fornsewa" class="form-control" onchange="changeValue(this.value);">
                                <option selected><?php echo $_POST['id_alatdj']?></option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="forSewap">Sewa Perhari</label>
                            <input type="hidden" id="harga_sewa" name="sewap" readonly value="<?php echo $_POST['sewap']?>">
                            <input type="text" id="forSewap" class="form-control" readonly value="<?php echo $_POST['sewap']?>">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="fortglsewa">Tanggal Sewa</label>
                            <input readonly type="date" class="form-control" id="fortglsewa" placeholder="Tanggal Sewa" name="tgl_sewa" min="2013-12-25" value="<?php echo $_POST['tgl_sewa']?>">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="pembayaran">Metode Pembayaran</label>
                            <input type="text" id="pembayaran" class="form-control" readonly value="Bayar Ditempat">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputdurasisewa">Durasi Sewa</label>
                        </div>
                        <select class="custom-select" id="inputdurasisewa" name="durasisewa" value="<?php echo $_POST['durasisewa']?>">
                            <option selected><?php echo $_POST['durasisewa']?></option>
                        </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">   
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </form>
    </div>
    <script type="text/javascript">  
        <?php echo $jsArray; ?>
        function changeValue(id){
            document.getElementById('harga_sewa').value = data[id].harga; 
            document.getElementById('forSewap').value = data[id].harga1; 
        };
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("tgl_sewa")[0].setAttribute('min', today);
  </script>

<?php 

require("includes/footer2.php");

?>