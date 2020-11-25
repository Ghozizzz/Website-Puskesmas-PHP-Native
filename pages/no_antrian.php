<?php include "../header.php";
$id = $_SESSION['user']['id'];
$sql=mysqli_query($conn,"SELECT a.nomor, t.* FROM antrian a
              LEFT JOIN transaksi t on a.id_transaksi = t.id
              WHERE a.id_user =$id and status != 3");
?>
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Nomor Anrian Aktif</li>
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
      <div class="col-md-9 col-sm-7">
        <h1>Nomor Antrian Aktif</h1>
        <div class="faq-page">
          <?php while($d=mysqli_fetch_array($sql)){
                    if($d['status']==0){ 
                      $color = 'background-color: grey';
                      $status = 'Dalam Antrian'; 
                    }elseif($d['status']==1){
                      $color = 'background-color: powderblue';
                      $status = 'Dalam Proses';
                    }elseif($d['status']==2){
                      $color = 'background-color: orange';
                      $status = 'Menunggu Pembayaran';
                    }else{
                      $color = 'background-color: green';
                      $status = 'Selesai';
                    } ?>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a class="accordion-toggle" style="<?=$color;?>" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                     Nomor Antrian: <?=$d['nomor'];?> | Tanggal <?=$d['created_at'];?>
                     </a>
                  </h4>
               </div>
               <div>
                  <div class="panel-body">
                    <ul>
                      <li>Nama : <?=$d['nama'];?></li>
                      <li>Umur : <?=$d['umur'];?></li>
                      <li>Telephone : <?=$d['telephone'];?></li>
                      <li>Jenis Kelamin : <?=($d['jenis_kelamin']==0)? 'Laki-Laki' : 'Perempuan';?></li>
                      <li>Alamat : <?=$d['alamat'];?></li>
                      <li>Metode Pembayaran : <?=$d['metode'];?></li>
                    </ul>
                    <b>Keterangan</b> : <br>
                    <?=$d['keterangan'];?>
                    <br>
                    <b>Status</b> :
                    <div style="display: table; height: 50px; width: 100%; #position: relative; overflow: hidden; <?=$color;?>">
                      <div style="#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                        <div style=" #position: relative; #top: -50%">
                          <b><?=$status;?></b>
                          <a href="<?=$url.'pages/view_trx.php?id='.$d['id'];?>" class="btn btn-success float-right">View Transaksi</a>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>
<?php include "../footer.php"; ?>