<?php
	include "../koneksi.php";
    session_start();

    $tanggal = date('Y-m-d');
    $tgl_now  = date('Y-m-d H:i:s');
    $id_transaksi = $_POST['id_transaksi'];

    $sql="UPDATE `transaksi` SET `status`='3' where `id`='$id_transaksi'";

	if(mysqli_query($conn,$sql)){
    	echo '<script language="javascript">';
        echo 'alert("transaksi berhasil di approve"); location.href="../index.php"';
        echo '</script>';
    }else{
        die('Error: ' . mysqli_error($conn));
    }  
	//header('location:show.php');
?>