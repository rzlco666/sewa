<?php
class data{
  private $conn;
  function __construct(){
    $server="localhost";
    $user="root";
    $pass="";
    $db="sewa";
    $this->conn=mysqli_connect($server,$user,$pass,$db);
  }

  public function edit_profile($id_user,$nama,$alamat,$hp,$email,$foto){
    $nama_foto = $foto['name'];
    $tmp_foto = $foto['tmp_name'];
    $dir = 'gambar/';
    $target = $dir.$nama_foto;
    if (empty($nama_foto)) {
      $sql3 = "UPDATE data_user SET nama ='$nama',alamat ='$alamat', hp='$hp',email='$email' WHERE id_user ='$id_user'";
      if ( mysqli_query($this->conn,$sql3)) {
                    ?>
                    <script>
                        alert("Data Berhasil Diubah");
                        location="profile.php";
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("Data gagal Diubah");
                        location="editprofile.php";
                    </script>
                    <?php
                }
      }else{ 
        if (move_uploaded_file($tmp_foto, $target)) {
            $sql = "UPDATE data_user SET nama ='$nama',alamat ='$alamat', hp='$hp',email='$email',foto='$target' WHERE id_user ='$id_user'";
            if ( mysqli_query($this->conn,$sql)) {
                ?>
                <script>
                    alert("Data Berhasil Diubah");
                    location="profile.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Data gagal Diubah");
                    location="editprofile.php";
                </script>
                <?php
            }
          }
      }
    }     

public function sewa_alatdj($harga_sewa, $tgl_sewa, $durasisewa,$id_alatdj){
  session_start();
  $id_user = $_SESSION['id_user'];
  $total_sewa = (int) substr($durasisewa, 1,1) * $harga_sewa;
  $tgl_kembali = date("Y-m-d", strtotime($tgl_sewa.$durasisewa));
  $sql = "INSERT INTO sewa(tgl_sewa,durasi_sewa,tgl_kembali,total_sewa,id_user,id_alatdj) VALUES ('$tgl_sewa','$durasisewa','$tgl_kembali', '$total_sewa','$id_user','$id_alatdj')";
  $sql2 = "UPDATE data_alatdj SET status = 0 WHERE id_alatdj = '$id_alatdj'";
  if ( mysqli_query($this->conn,$sql) && mysqli_query($this->conn,$sql2)) {
      ?>
      <script>
          alert("Data Berhasil di Inputkan");
          location="historisewa.php";
      </script>
      <?php
  }
  else{ 
      ?>
      <script>
          alert("Data gagal di input <?php echo mysqli_error($this->conn); ?>");
          location="sewa.php";
      </script>
      <?php
  } 
  } 

  public function tampil_data($id_user){
    $sql = mysqli_query($this->conn, "SELECT * FROM data_user WHERE id_user = '$id_user'");
    return $sql;
  }

  public function tampil_alatdj() {
    $sql = mysqli_query($this->conn, "SELECT * FROM data_alatdj;");
    return $sql;
}

  public function histori_sewa(){
    $sql = mysqli_query($this->conn,"SELECT s.id_sewa,s.id_user, adj.nama_alatdj, s.tgl_sewa, s.durasi_sewa, s.tgl_kembali, s.tgl_dikembalikan, s.denda, s.total_sewa, s.lunas 
    FROM sewa s 
    JOIN data_alatdj adj ON s.id_alatdj = adj.id_alatdj");
    return $sql;
  }

  public function cetak_id($id_sewa){
    $sql = mysqli_query($this->conn, "SELECT s.id_sewa,s.id_user, adj.nama_alatdj, s.tgl_sewa, s.durasi_sewa, s.tgl_kembali, s.tgl_dikembalikan, s.denda, s.total_sewa, s.lunas 
    FROM sewa s 
    JOIN data_alatdj adj ON s.id_alatdj = adj.id_alatdj
    WHERE s.id_sewa = '$id_sewa' AND s.lunas = 1");
    return $sql;
  }

  public function tampil_history($id_user){
    $sql = mysqli_query($this->conn, "SELECT s.id_sewa,s.id_user, adj.nama_alatdj, s.tgl_sewa, s.durasi_sewa, s.tgl_kembali, s.tgl_dikembalikan, s.denda, s.total_sewa, s.lunas 
    FROM sewa s 
    JOIN data_alatdj adj ON s.id_alatdj = adj.id_alatdj 
    WHERE s.id_user = '$id_user' AND s.lunas = 1");
    return $sql;
  }

}

  $data = new data();
  if(isset($_GET['edit_profile'])){
    $data->edit_profile($_GET['edit_profile'],$_POST['nama'],$_POST['alamat'],$_POST['hp'],$_POST['email'], $_FILES['foto']);        
  }
  
  if(isset($_GET['sewa_alatdj'])){
    $data->sewa_alatdj($_POST['sewap'], $_POST['tgl_sewa'], $_POST['durasisewa'],$_POST['id_alatdj']);
  }

  if(isset($_GET['id_sewa'])){
    $data->cetak_id($_GET['id_sewa']);
}

  ?>