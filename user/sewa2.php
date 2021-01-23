<?php 
  require("includes/sidebar.php");

 ?>
      <div class="main-panel">
      <?php 

      require("includes/navbar.php");

     ?>
     <div class="content">
        <form action="proses.php?sewa_kendaraan=kendaraan" method="Post">
        <table>
            <div class="container-fluid">
                <div class="row">
                    <div class="col md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title">Sewa</h4>
                        <p class="card-category">Alat DJ</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="fornsewa">Nama Kendaraan</label>
                            <select name="id_alatdj" id="fornsewa" class="form-control" onchange="changeValue(this.value);">
                                <option>Pilih Kendaraan</option>
                                <?php
                                require("proses_user.php");
                                $result = $data -> tampil_alatdj();
                                $jsArray = "var data = new Array();\n";
                                while($row = mysqli_fetch_assoc($result)) {?>
                                    <option value="<?php echo $row['id_alatdj']; ?>"><?php echo $row['id_alatdj']. " | " . $row['nama_alatdj']; ?></option>
                                <?php 
                                    $jsArray.="data['".$row['id_alatdj']."']={harga:'".addslashes($row['harga'])."',harga1:'Rp. ".addslashes(number_format($row['harga']))."'};\n";
                                } 
                                ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="forSewap">Sewa Perhari</label>
                            <input type="hidden" id="harga_sewa" name="sewap" readonly>
                            <input type="text" id="forSewap" class="form-control" readonly>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="fortglsewa">Tanggal Sewa</label>
                            <input type="date" class="form-control" id="fortglsewa" placeholder="Tanggal Sewa" name="tgl_sewa">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputdurasisewa">Durasi Sewa</label>
                        </div>
                        <select class="custom-select" id="inputdurasisewa" name="durasisewa">
                            <option selected>Pilih Durasi</option>
                            <option value="+1 day">1 Hari</option>
                            <option value="+2 day">2 Hari</option>
                            <option value="+3 day">3 Hari</option>
                            <option value="+4 day">4 Hari</option>
                            <option value="+5 day">5 Hari</option>
                            <option value="+6 day">6 Hari</option>
                            <option value="+7 day">7 Hari</option>
                        </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">   
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit"> <input type="reset" class="btn btn-danger" value="Reset">
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
  </script>

<?php 

require("includes/footer2.php");

?>