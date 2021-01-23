<?php
class admin{
  private $conn;
  function __construct(){
    $server="localhost";
    $user="root";
    $pass="";
    $db="sewa";
    $this->conn=mysqli_connect($server,$user,$pass,$db);
  }

  public function data_alatdj(){
    $sql = mysqli_query($this->conn, "SELECT * FROM data_alatdj");
    return $sql;
  }

  public function alatdj($id_alatdj,$nama_alatdj,$merk,$harga,$spesifikasi,$foto){
    $nama_foto = $foto['name'];
    $tmp_foto = $foto['tmp_name'];
    $dir = 'gambar/';
    $target = $dir.$nama_foto;
    if (move_uploaded_file($tmp_foto, $target)) {
    $sql = mysqli_query($this->conn, "INSERT INTO data_alatdj(id_alatdj,nama_alatdj,merk,harga, status, spesifikasi, foto)
            VALUES ('$id_alatdj','$nama_alatdj','$merk','$harga', 1, '$spesifikasi', '$target')") ;
    if ($sql) {
      ?>
      <script>
          alert("Tambah data berhasil");
          location="alatdj.php";
      </script>
      <?php
    }else {
      echo mysqli_error($this->conn);
    }
    }
  }

  public function delete_alatdj($id_alatdj){
    $sql =mysqli_query($this->conn, "DELETE FROM data_alatdj  WHERE id_alatdj = '$id_alatdj'");
    if ($sql) {
      ?>
      <script>
          alert("Data Berhasil Diubah");
          location="alatdj.php";
      </script>
      <?php
  }else{
      ?>
      <script>
          alert("Data gagal Diubah");
          location="alatdj.php";
      </script>
      <?php
    }
  }

  public function tampil($id_alatdj){
    $sql = mysqli_query($this->conn,"SELECT * FROM data_alatdj WHERE id_alatdj = '$id_alatdj'");
    return $sql;
  }

  public function edit_alatdj($id_alatdj,$nama_alatdj,$merk,$harga,$spesifikasi,$foto){
    $nama_foto = $foto['name'];
    $tmp_foto = $foto['tmp_name'];
    $dir = 'gambar/';
    $target = $dir.$nama_foto;
    if (move_uploaded_file($tmp_foto, $target)) {
    $sql = "UPDATE data_alatdj SET id_alatdj='$id_alatdj',nama_alatdj='$nama_alatdj',
            merk='$merk',harga='$harga', spesifikasi='$spesifikasi', foto='$target' WHERE id_alatdj = '$id_alatdj'";
    if (mysqli_query($this->conn,$sql)) {
      ?>
      <script>
          alert("Data Berhasil Diubah");
          location="alatdj.php";
      </script>
      <?php
  }else{
      ?>
      <script>
          alert("Data gagal Diubah");
          location="alatdj.php";
      </script>
      <?php
    }
    }
  }

  public function list_user(){
    $sql = mysqli_query($this->conn,"SELECT * FROM data_user");
    return $sql;
  }

  public function histori_sewa(){
    $sql = mysqli_query($this->conn,"SELECT s.id_sewa,s.id_user, a.email, adj.nama_alatdj, s.tgl_sewa, s.durasi_sewa, s.tgl_kembali, s.tgl_dikembalikan, s.denda, s.total_sewa, s.lunas 
    FROM sewa s 
    JOIN data_alatdj adj ON s.id_alatdj = adj.id_alatdj
    JOIN akun a ON s.id_user = a.id_user");
    return $sql;
  }

      public function alat_dj1(){
        $sql = mysqli_query($this->conn, "SELECT * FROM sewa WHERE id_alatdj='1'");
        return $sql;
      }
      public function alat_dj2(){
        $sql = mysqli_query($this->conn, "SELECT * FROM sewa WHERE id_alatdj='3'");
        return $sql;
      }
      public function alat_dj3(){
        $sql = mysqli_query($this->conn, "SELECT * FROM sewa WHERE id_alatdj='6'");
        return $sql;
      }
      public function penyewaan(){
        $sql = mysqli_query($this->conn, "SELECT * FROM sewa");
        return $sql;
      }

  public function konfirmasi($id_sewa){
    $sql=mysqli_query($this->conn, "SELECT * FROM sewa WHERE id_sewa = '$id_sewa'");
    $row = mysqli_fetch_assoc($sql);
    $tgl_kembali = date("Y-m-d");
    $tgl_deadline = $row['tgl_kembali'];
    $tgl_kembali_create = date_create($tgl_kembali);
    $tgl_deadline_create = date_create($tgl_deadline);
    $selisih = (int) date_diff($tgl_deadline_create, $tgl_kembali_create) -> format("%a");
    $denda = 150000;
    if ($tgl_kembali > $tgl_deadline) {
      $totalDenda = $denda * $selisih;
      $query = mysqli_query($this->conn, "UPDATE sewa SET tgl_dikembalikan = '$tgl_kembali', denda = '$totalDenda' WHERE id_sewa = '$id_sewa'");
    } else {
      $totalDenda = 0;
      $query = mysqli_query($this->conn, "UPDATE sewa SET tgl_dikembalikan = '$tgl_kembali', denda = '$totalDenda', lunas = 1 WHERE id_sewa = '$id_sewa'");
    }
    if ($query) {
      ?>
      <script>
          alert("Berhasil konfirmasi data..");
          location="sewa.php";
      </script>
      <?php
    } else {
      echo mysqli_error($this->conn);
    }
  }

  public function bayar($id_sewa) {
    $sql = mysqli_query($this->conn, "UPDATE sewa SET lunas = 1 WHERE id_sewa = '$id_sewa'");
    if ($sql) {
      ?>
      <script>
          alert("Data berhasil di bayar..");
          location="sewa.php";
      </script>
      <?php
    } else {
      ?>
      <script>
          alert("Data gagal di bayar..!");
          location="sewa.php";
      </script>
      <?php
    }
  }

}

  $admin = new admin();

  if (isset($_GET['alatdj'])) {
    $admin -> alatdj($_POST['id_alatdj'],$_POST['nama_alatdj'],$_POST['merk'],$_POST['harga'],$_POST['spesifikasi'], $_FILES['foto']);
  }

  if (isset($_GET['delete_alatdj'])) {
    $admin-> delete_alatdj($_GET['delete_alatdj']);
  }

  if (isset($_GET['edit_alatdj'])) {
    $admin-> edit_alatdj($_POST['id_alatdj'],$_POST['nama_alatdj'],$_POST['merk'],$_POST['harga'],$_POST['spesifikasi'], $_FILES['foto']);
  }

  if (isset($_GET['konfirmasi'])) {
    $admin-> konfirmasi($_GET['konfirmasi']);
  }

  if (isset($_GET['bayar'])) {
    $admin -> bayar($_GET['bayar']);
  }

  ?>