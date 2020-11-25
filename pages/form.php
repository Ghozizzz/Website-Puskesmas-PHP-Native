<?php include "../header.php"; ?>
  <div class="main">
    <div class="container">
      <ul class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Daftar Antrian</li>
      </ul>
      <!-- BEGIN SIDEBAR & CONTENT -->
      <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
          <h1>Daftar Antrian</h1>
          <!-- BEGIN CHECKOUT PAGE -->
          <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
          <form id="form_antrian" class="register-form" method="POST" action="<?=$url;?>do/save_antrian.php">

            <!-- BEGIN PAYMENT ADDRESS -->
            <div id="payment-address" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                    Langkah 1: Detail Pasien
                  </a>
                </h2>
              </div>
              <div id="payment-address-content" class="panel-collapse collapse in">
                <div class="panel-body row">
                  <div class="col-md-6 col-sm-6">
                    <h3>Detail Pasien</h3>
                    <div class="form-group">
                      <label for="firstname">Nama <span class="require">*</span></label>
                      <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="email">E-Mail <span class="require">*</span></label>
                      <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="telephone">Telephone <span class="require">*</span></label>
                      <input type="text" id="telephone" name="telephone" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="Umur">Umur <span class="require">*</span></label>
                      <input type="text" id="umur" name="umur" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="country">Jenis Kelamin <span class="require">*</span></label>
                      <select class="form-control input-sm" id="jenis_kelamin" name="jenis_kelamin">
                        <option value=""> --- Please Select --- </option>
                        <option value="0">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <h3>Alamat Anda</h3>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea id="alamat" name="alamat" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="city">Kota <span class="require">*</span></label>
                      <input type="text" id="city" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="col-md-12">
                    <button class="btn btn-primary pull-right" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#method-langkah2" id="button-langkah1">Continue</button>                 
                  </div>
                </div>
              </div>
            </div>
            <!-- END PAYMENT ADDRESS -->

            <!-- BEGIN SHIPPING METHOD -->
            <div id="shipping-method" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#method-langkah2" class="accordion-toggle">
                    Langkah 2: Deskipsikan Keluhan
                  </a>
                </h2>
              </div>
              <div id="method-langkah2" class="panel-collapse collapse">
                <div class="panel-body row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="delivery-comments">Tuliskan Keluhan Anda</label>
                      <textarea id="keluhan" name="keluhan" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="country">Metode Pembayaran<span class="require">*</span></label>
                      <select class="form-control input-sm" id="metode" name="metode">
                        <option value=""> --- Please Select --- </option>
                        <option value="PERSONAL">PERSONAL</option>
                        <option value="BPJS">BPJS</option>
                      </select>
                    </div>
                    <button class="btn btn-primary pull-right" type="button" id="button-langkah2" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END SHIPPING METHOD -->
          </form>
          </div>
          <!-- END CHECKOUT PAGE -->
        </div>
        <!-- END CONTENT -->
      </div>
      <!-- END SIDEBAR & CONTENT -->
    </div>
  </div>
<?php include "../footer.php"; ?>
<script type="text/javascript">
$("#button-langkah2").click(function(){
  if($.trim($("#nama").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Nama Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#email").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Email Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#telephone").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Telephone Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#umur").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Umur Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#jenis_kelamin").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Jenis Kelamin Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#keluhan").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Keluhan Harus di isi',
      icon: 'error',
    });
  }else if($.trim($("#metode").val()) == ""){
    Swal.fire({
      title: 'Error!',
      text: 'Metode Pembayaran Harus di isi',
      icon: 'error',
    });
  }else{
    $('#form_antrian').submit();
  }
});
</script>