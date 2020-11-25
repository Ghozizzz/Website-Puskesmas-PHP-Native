<?php
	include "../koneksi.php";
    session_start();

    $tanggal = date('Y-m-d');
    $tgl_now  = date('Y-m-d H:i:s');
    $id = $_POST['id'];
    $pass = $_POST['old_password'];
    $new_pass = $_POST['new_password'];
    $name = $_POST['nama'];

    $cek=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");
    $usr=mysqli_fetch_array($cek);
    if(password_verify($pass,$usr['password'])){
        if(!empty($new_pass)){
            $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $sql="UPDATE `users` SET `name`='$name', `password`='$hash_pass', `modified_at`='$tanggal' where `id`=$id";
        }else{
            $sql="UPDATE `users` SET `name`='$name', `modified_at`='$tanggal' where `id`=$id";
        }

    	if(mysqli_query($conn,$sql)){
        	echo '<script language="javascript">';
            echo 'alert("Data berhasil di ubah"); location.href="../pages/my_account.php"';
            echo '</script>';
        }else{
            die('Error: ' . mysqli_error($conn));
        }
    }
	// header('location:show.php');
?>