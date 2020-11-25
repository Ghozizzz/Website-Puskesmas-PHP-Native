<?php
	include "../koneksi.php";

    $tanggal = date('Y-m-d');
    $email = $_POST['login_email'];
    $pass = $_POST['login_password'];
	$sql=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $usr=mysqli_fetch_array($sql);
	if(password_verify($pass,$usr['password'])){
        session_start();
        $_SESSION['user']=$usr;
        if($usr['id_roles']==4){//user biasa
            echo '<script language="javascript">';
            echo 'alert("Berhasil Login"); location.href="../index.php"';
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("Berhasil Login"); location.href="../admin/index.php"';
            echo '</script>';
        }
    } else {
        echo "<script> alert ('Username atau Password Anda Salah')</script>";
        echo "<meta http-equiv='refresh' content='0.5;url=../login.php' />";
    }
	//header('location:show.php');
?>