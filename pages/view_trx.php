<?php include "../header.php";
$sql=mysqli_query($conn,"SELECT a.*,t.id as id_transaksi, t.no_transaksi, t.nama, t.umur, t.jenis_kelamin, t.email, t.keterangan, t.alamat, t.keterangan_dokter, t.metode, t.status, t.src_bukti FROM antrian a
                            LEFT JOIN transaksi t on a.id_transaksi = t.id
                            WHERE a.id =".$_GET['id']);
$data=mysqli_fetch_array($sql);
$id = $data['id_transaksi'];
?>
<div class="container">
    <div class="row mt-40">           
        <h1>Detail Transaksi</h1>                 
        <div class="col-md-12">
            <form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?=$url;?>do/approve_pmb.php">  
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Antrian <font color="#f00">*</font>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="no_antrian" name="no_antrian" class="form-control myline" style="margin-bottom:5px" value="<?=$data['nomor'];?>" readonly>
                                <input type="hidden" id="id_antrian" name="id_antrian" value="<?=$data['id'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Transaksi <font color="#f00">*</font>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control myline" style="margin-bottom:5px" value="<?=$data['no_transaksi'];?>" readonly>
                                <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?=$id;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Tanggal <font color="#f00">*</font>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="tanggal" name="tanggal" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?=$data['tanggal'];?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Keterangan Keluhan
                            </div>
                            <div class="col-md-8">
                                <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                    class="form-control myline" style="margin-bottom:5px; min-height: 100px;" rows="10" readonly><?=$data['keterangan'];?></textarea>                           
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="row">
                            <div class="col-md-4">
                                Nama
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="nama" name="nama" 
                                    class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                    value="<?=$data['nama'];?>">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="email" name="email" 
                                    class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                    value="<?=$data['email'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Umur
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="umur" name="umur" 
                                    class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                    value="<?=$data['umur'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Jenis Kelamin
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="jenis_kelamin" name="jenis_kelamin" 
                                    class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                    value="<?=($data['jenis_kelamin']==0)? 'Laki-Laki' : 'Perempuan';?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Alamat
                            </div>
                            <div class="col-md-8">
                                <textarea id="alamat" name="alamat" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                    class="form-control myline" style="margin-bottom:5px" readonly><?=$data['alamat'];?></textarea>                           
                            </div>
                        </div>
                    </div>              
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Keterangan Untuk Pasien
                    </div>
                    <div class="col-md-10">
                        <textarea id="keterangan_dokter" name="keterangan_dokter" rows="10" onkeyup="this.value = this.value.toUpperCase()"
                            class="form-control myline" style="margin-bottom:5px" placeholder="Keterangan untuk pasien ..." readonly><?=$data['keterangan_dokter'];?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Metode Pembayaran
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="umur" name="umur" 
                            class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                            value="<?=$data['metode'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                                <thead>
                                    <th style="width:40px">No</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </thead>
                                <tbody id="boxDetail">
                                <?php
                                $loop=mysqli_query($conn,"SELECT * FROM transaksi_details WHERE id_trx = $id");
                                $total = 0;
                                $no=0; while($d=mysqli_fetch_array($loop)){ $no++; ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$d['keterangan'];?></td>
                                    <td><?=number_format($d['nominal'],2,',','.');?></td>
                                </tr>
                                <?php $total += $d['nominal']; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="text-align: right;"><strong>Total :</strong></td>
                                        <td><input type="text" id="total_nominal" name="total_nominal" class="form-control" readonly="readonly" value="<?=number_format($total,2,',','.');?>"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-md-12">
                        <a href="<?=$url;?>pages/no_antrian.php" class="btn btn-default">Kembali</a>
                    <?php if($data['metode']=='PERSONAL' && $data['status']==2 && ($data['src_bukti']===null || $data['src_bukti']=='')){ ?>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#uploadModal">Upload Bukti Pembayaran</button>
                    <?php } ?>
                    </div>    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
        <!-- Form -->
        <form method='post' action='' enctype="multipart/form-data">
          Select file : <input type='file' name='file' id='file' class='form-control' ><br>
            <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
            <input type="hidden" id="id_transaksi_modal" name="id_transaksi_modal" value="<?=$id;?>">
        </form>
      </div>
 
    </div>

  </div>
</div>
<?php include "../footer.php"; ?>
<script>
$(document).ready(function(){
  $('#btn_upload').click(function(){

    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);
    fd.append('id',$('#id_transaksi').val());

    // AJAX request
    $.ajax({
      url: '<?=$url;?>do/upload.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){
          // Show image preview
          // $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
          alert('Bukti berhasil di upload');
          location.reload();
        }else{
          alert('file not uploaded');
        }
      }
    });
  });
});
</script>