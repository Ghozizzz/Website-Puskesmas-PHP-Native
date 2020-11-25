<?php
	include "../koneksi.php";
    session_start();

    $tanggal = date('Y-m-d');
    $tgl_now  = date('Y-m-d H:i:s');
    $check = mysqli_query($conn, "SELECT * FROM antrian WHERE tanggal ='".$tanggal."' ORDER BY ID DESC LIMIT 1");
    $usr=mysqli_fetch_array($check);

    if(empty($usr)){
        $nomor_antrian = 1;
    }else{
        $nomor_antrian = $usr['nomor']+1;
    }
    $id_user = $_SESSION['user']['id'];
    $no_transaksi = date('Ymd').'-'.$nomor_antrian;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $keluhan = $_POST['keluhan'];
    $metode = $_POST['metode'];

	$sql="INSERT INTO 
            transaksi(no_transaksi,id_user,metode,nama,email,telephone,umur,jenis_kelamin,alamat,keterangan,created_at,created_by) 
            VALUES ('$no_transaksi','$id_user','$metode','$nama','$email','$telephone','$umur','$jenis_kelamin','$alamat','$keluhan','$tgl_now','$id_user')";
    if(mysqli_query($conn,$sql)){
        $last_id = $conn->insert_id;
        $sql2 = "INSERT INTO antrian(tanggal,nomor,id_transaksi,id_user,created_at,created_by)
            VALUES ('$tanggal','$nomor_antrian','$last_id','$id_user','$tgl_now','$id_user')";
    }
	if(mysqli_query($conn,$sql2)){
    	echo '<script language="javascript">';
        echo 'alert("Nomor Antrian Berhasil Dibuat"); location.href="../index.php"';
        echo '</script>';
    }else{
        die('Error: ' . mysqli_error($conn));
    }  
	//header('location:show.php');
?>