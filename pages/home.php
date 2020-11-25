<?php include "../header.php";
$tanggal=date('Y-m-d');
$sql=mysqli_query($conn,"SELECT * FROM antrian WHERE tanggal='$tanggal' ORDER BY id DESC limit 1");
$antrian=mysqli_fetch_array($sql);

if(isset($_SESSION['user']['id'])){
    $id_user = $_SESSION['user']['id'];
}
$sql2=mysqli_query($conn,"SELECT * FROM antrian WHERE tanggal='$tanggal' and id_user = '$id_user' ORDER BY id DESC limit 1");
$antrian2=mysqli_fetch_array($sql2);
if(empty($antrian2)){
    $antrian2['nomor']=0;
}
?>
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-35">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item carousel-item-seven active">
                   <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <div class="row" data-animation="animated fadeInDown">
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="product-item">
                                        <h2 class="carousel-title-v12 margin-bottom-20">Nomor Antrian</h2><br>
                                        <div class="kotak">
                                            <h3 class="carousel-title-v1 margin-bottom-20"><?=(empty($antrian['nomor']))? '0':$antrian['nomor'];?></h3>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="product-item">
                                        <h2 class="carousel-title-v12 margin-bottom-20">Nomor Anda</h2><br>
                                        <div class="kotak">
                                            <h3 class="carousel-title-v1 margin-bottom-20"><?=$antrian2['nomor'];?></h3>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <?php if(isset($_SESSION['user']['id'])){ ?>
                                    <a class="carousel-btn" href="<?=$url;?>pages/form.php" data-animation="animated fadeInUp">Buat Antrian Sekarang!</a>
                                <?php }else{ ?>
                                    <a class="carousel-btn" href="<?=$url;?>login.php" data-animation="animated fadeInUp">Buat Antrian Sekarang!</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SLIDER -->
<?php include "../footer.php"; ?>