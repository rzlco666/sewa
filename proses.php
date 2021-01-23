<?php
    class sewa{
        private $conn;
        public function __construct(){
            $server="localhost";
            $user="root";
            $pass="";
            $db="sewa";
            $this->conn=mysqli_connect($server,$user,$pass,$db);
        }

        public function registrasi($nama,$email,$password,$alamat,$hp){
                $sql = mysqli_query($this->conn, "INSERT INTO akun (email,password, akses) VALUES ('$email', md5('$password'), 'user')");
                $ambil_id = mysqli_query($this->conn, "SELECT id_user FROM akun WHERE email='$email' AND password=md5('$password')");
                $row = mysqli_fetch_assoc($ambil_id);
                $id_user = $row['id_user'];
                $user = mysqli_query($this->conn, "INSERT INTO data_user (nama, email, id_user, alamat, hp, foto) VALUES ('$nama', '$email', $id_user, '$alamat', '$hp', 'gambar/default.png')");
                if ($sql && $user) {
                  ?>
                  <script>
                      alert("Registrasi Berhasil");
                      location="login.php";
                  </script>
                  <?php
                } else {
                  echo mysqli_error($this->conn);
                }
              ?>
              <script>
                  alert("Registrasi Gagal");
                  location="daftar.php";
              </script>
              <?php
        }

        public function login($email,$password){
            $sql = mysqli_query($this->conn,"SELECT * FROM akun WHERE email = '$email' AND password = md5('$password')");
            $row = mysqli_fetch_assoc($sql);
            $num = mysqli_num_rows($sql);
            if ($num != 0) {
                session_start();
                if ($row['akses'] == "admin") {
                    $_SESSION['akses'] = $row['akses'];
                    $_SESSION['login'] = "sukses";
                    header("location: admin/dashboard.php");
                } else {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['akses'] = $row['akses'];
                    $_SESSION['login'] = "sukses";
                    header("location: user/dashboard.php");
                }
            }
            else{
                ?>
                <script>
                    alert("Akun tidak ditemukan");
                    location="login.php";
                </script>
                <?php
            }
        }

        public function loginadmin($email,$password){
            $sql = mysqli_query($this->conn,"SELECT * FROM akun_admin WHERE email = '$email' AND password = md5('$password')");
            $row = mysqli_fetch_assoc($sql);
            $num = mysqli_num_rows($sql);
            if ($num != 0) {
                session_start();
                if ($row['akses'] == "admin") {
                    $_SESSION['akses'] = $row['akses'];
                    $_SESSION['login'] = "sukses";
                    header("location: admin/dashboard.php");
                } else {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['akses'] = $row['akses'];
                    $_SESSION['login'] = "sukses";
                    header("location: user/dashboard.php");
                }
            }
            else{
                ?>
                <script>
                    alert("Akun tidak ditemukan");
                    location="loginadmin.php";
                </script>
                <?php
            }
        }
    } 

    $sewa = new sewa();
    if (isset($_GET['registrasi'])) {
        $sewa -> registrasi($_POST['nama'],$_POST['email'],$_POST['password'],$_POST['alamat'],$_POST['hp']);
    } 

    if (isset($_GET['login'])) {
        $sewa -> login($_POST['email'],$_POST['password']); 
    }

    if (isset($_GET['loginadmin'])) {
        $sewa -> loginadmin($_POST['email'],$_POST['password']); 
    }  

?>