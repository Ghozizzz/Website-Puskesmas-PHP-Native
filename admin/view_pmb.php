<?php include "../admin_header.php";
$sql=mysqli_query($conn,"SELECT a.*,t.id as id_transaksi, t.no_transaksi, t.nama, t.umur, t.jenis_kelamin, t.email, t.keterangan, t.alamat, t.keterangan_dokter, t.metode, t.status, t.src_bukti FROM antrian a
                            LEFT JOIN transaksi t on a.id_transaksi = t.id
                            WHERE a.id =".$_GET['id']);
$data=mysqli_fetch_array($sql);
$id = $data['id_transaksi'];
?>
<div class="row mt-40">           
    <h1>Detail Transaksi (Apoteker)</h1>                 
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
            <?php if($data['metode']=='PERSONAL' && $data['status']==2){ ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                        <tbody>
                            <tr>
                                <td>Bukti Pembayaran</td>
                                <td>
                                    <?php if($data['src_bukti']===null || $data['src_bukti']==''){ ?>
                                        Belum ada Bukti Pembayaran
                                    <?php }else{ ?>
                                        <img src="<?=$url.'upload/'.$data['src_bukti'];?>" class="img-responsive">
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
            <?php if($data['status']==2){ ?>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=$url.'/admin/index_trx.php';?>" class="butn defalt">Kembali </a> &nbsp;
                    <button type="button" href="javascript:;" class="butn accept" onclick="simpanData();">Approve</button>
                </div>    
            </div>
            <?php } ?>
        </form>
    </div>
</div>
<?php include "../admin_footer.php"; ?>
<script>
function simpanData(){
    if (confirm("Are you sure?")) {
        $('#formku').submit();
    }
}
</script>