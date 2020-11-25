<?php include "../header.php";
$id = $_SESSION['user']['id'];
$sql=mysqli_query($conn,"SELECT * FROM users WHERE id='$id' ORDER BY id DESC limit 1");
$usr=mysqli_fetch_array($sql);
?>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">My Account Page</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-3">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          <li class="list-group-item clearfix"><a href="<?=$url;?>pages/my_account.php"><i class="fa fa-angle-right"></i> My account</a></li>
          <li class="list-group-item clearfix"><a href="<?=$url;?>pages/no_antrian.php"><i class="fa fa-angle-right"></i> Nomor Antrian</a></li>
          <li class="list-group-item clearfix"><a href="<?=$url;?>pages/my_trx.php"><i class="fa fa-angle-right"></i> Transaksi Selesai</a></li>
        </ul>
      </div>
      <!-- END SIDEBAR -->

      <!-- BEGIN CONTENT -->
      <form id="form_akun" class="register-form" method="POST" action="<?=$url;?>do/update_akun.php">
        <div class="col-md-9 col-sm-7">
          <h1>My Account Page</h1>
          <div class="form-group">
            <label for="firstname">Nama <span class="require"></span></label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?=$usr['name'];?>">
            <input type="hidden" id="id_user" name="id" value="<?=$usr['id'];?>">
          </div>
          <div class="form-group">
            <label for="email">E-Mail <span class="require">*</span></label>
            <input type="text" id="email" name="email" class="form-control" value="<?=$usr['email'];?>" disabled>
          </div>
          <div class="form-group">
            <label for="old_password">Password Lama<span class="require">*</span></label>
            <input type="password" id="old_password" name="old_password" class="form-control">
          </div>
          <div class="form-group">
            <label for="new_password">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="form-control">
            <small>*Jika tidak ingin ganti password, bisa di kosongkan saja</small>
          </div>
          <button class="btn btn-primary pull-right" type="button" id="button_submit">Simpan</button>
        </div>
        <!-- END CONTENT -->
      </form>
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
<?php include "../footer.php"; ?>
<script type="text/javascript">
$("#button_submit").click(function(){
  if($.trim($("#nama").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Nama Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#old_password").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Password lama Harus di isi',
      icon: 'error',
    });
  }else{
    $('#form_akun').submit();
  }
});
</script>