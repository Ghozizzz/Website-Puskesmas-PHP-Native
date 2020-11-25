<?php
	include "../koneksi.php";

    $tanggal = date('Y-m-d');
    $email = $_POST['register_email'];
    $name = $_POST['register_name'];
    $pass = password_hash($_POST['register_password'], PASSWORD_DEFAULT);
	$sql="INSERT INTO users(email,password,name,id_roles,created_at) VALUES ('$email','$pass','$name','4','$tanggal')";
	
	if(mysqli_query($conn,$sql)) 
    {
    	echo '<script language="javascript">';
        echo 'alert("Berhasil Mendaftar, Silahkan Login"); location.href="../login.php"';
        echo '</script>';
    }
    else
    {
        die('Error: ' . mysqli_error($conn));
    }  
	//header('location:show.php');
?>