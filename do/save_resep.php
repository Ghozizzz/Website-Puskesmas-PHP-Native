<?php
	include "../koneksi.php";
    session_start();

    $tanggal = date('Y-m-d');
    $tgl_now  = date('Y-m-d H:i:s');
    $myDetails = $_POST['myDetails'];
    $id_transaksi = $_POST['id_transaksi'];

    $total = 0;
    foreach($myDetails as $item) {
        if(!empty($item['nominal'])){
            $keterangan = $item['keterangan'];
            $nominal = str_replace(",","",$item['nominal']);
            $total += $nominal;
            $insert = "INSERT INTO transaksi_details(id_trx,keterangan,nominal)
                        VALUES ('$id_transaksi','$keterangan', '$nominal')";
            mysqli_query($conn,$insert);
        }
    }

    $sql="UPDATE `transaksi` SET `nilai`='$total', `status`='2'where `id`='$id_transaksi'";

	if(mysqli_query($conn,$sql)){
    	echo '<script language="javascript">';
        echo 'alert("transaksi berhasil di approve"); location.href="../index.php"';
        echo '</script>';
    }else{
        die('Error: ' . mysqli_error($conn));
    }  
	// header('location:show.php');
?>