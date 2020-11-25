<?php
include "../koneksi.php";
// file name
$filename = $_FILES['file']['name'];
$id = $_POST['id'];

$new_name = 'bukti_'.date('Ymdhis');
// echo $filename;die();
// Location
$location = '../upload/'.$filename;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

$new_name_ext = $new_name.'.'.$file_extension;
$new_location = '../upload/'.$new_name_ext;

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif");

$response = 0;
if(in_array($file_extension,$image_ext)){
  // Upload file
  if(move_uploaded_file($_FILES['file']['tmp_name'],$new_location)){
    $response = $new_location;
	$sql="UPDATE `transaksi` SET `src_bukti`='$new_name_ext' where `id`=$id";
	if(mysqli_query($conn,$sql)){
    	echo '<script language="javascript">';
        echo 'alert("Bukti berhasil di upload"); location.href="../pages/view_trx.php?id='.$id.'"';
        echo '</script>';
    }else{
        die('Error: ' . mysqli_error($conn));
    }
  }
}