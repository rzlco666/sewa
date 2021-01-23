<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Mega's Studio</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<?php 
  session_start();
?>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../gambar/logo/logo.JPG" style="width:100px; max-width:125px;">
                            </td>

                            
                            <td>
                                Invoice #: 0<?php
                                $id_user = $_SESSION['id_user'];
                                $no =1;
                                require("proses_user.php"); 
                                if (@$_GET['id_sewa'] != '') {
                                  $result = $data -> cetak_id(@$_GET['id_sewa']);
                                }else{
                                  $result = $data -> tampil_history($id_user);
                                }
                                while($row = mysqli_fetch_array($result)){ 
                                    echo $row['id_sewa'];
                                ?><br>
                                Dibuat: <?php echo date("d-m-Y"); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Mega's Studio<br>
                                Jl. Hamka No.114<br>
                                Kota Solok
                            </td>
                            
                            <td>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            <tr class="heading">
                <td >Nama Alat DJ</td>
                <td style="text-align:left">Biaya</td>
                <td >Tanggal Deadline</td>
                <td >Tanggal Kembali</td>
                <td >Denda</td>
            </tr>
            
            <tr class="item">
                <td>
                <?php echo $row['nama_alatdj']; ?>
                </td>
                <td style="text-align:left">
                <?php echo  "Rp ". number_format($row['total_sewa']);?>
                </td>
                <td>
                <?php echo $row['tgl_kembali']?>
                </td>
                <td>
                <?php if($row['tgl_dikembalikan'] != "0000-00-00") { echo $row['tgl_dikembalikan']; } else { echo "-"; }?>
                </td>
                <td>
                <?php if($row['denda']!= 0 ) { echo  "Rp ". number_format($row['denda']); } else { echo "-"; }?>
                </td>
            </tr>
            
            <tr class="item last">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    Keterangan
                </td>
                
                <td>
                <?php if($row['lunas'] == 0) { echo "Belum Lunas"; } else { echo "Sudah Lunas"; } ?>  
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td> Grand Total:</td>
                <td>
                <?php echo "Rp ". number_format($row['total_sewa'] + $row['denda']); ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<script>
		window.print();
	</script>