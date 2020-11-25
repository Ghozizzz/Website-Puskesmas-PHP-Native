<?php include "../admin_header.php";
$sql=mysqli_query($conn,"SELECT a.*,t.id as id_transaksi, t.no_transaksi, t.nama, t.umur, t.jenis_kelamin, t.email, t.keterangan, t.alamat, t.keterangan_dokter, t.metode FROM antrian a
                            LEFT JOIN transaksi t on a.id_transaksi = t.id
                            WHERE a.id =".$_GET['id']);
$data=mysqli_fetch_array($sql);
?>
<div class="row mt-40">           
    <h1>Detail Transaksi (Apoteker)</h1>                 
    <div class="col-md-12">
        <form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?=$url;?>do/save_resep.php">  
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
                            <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?=$data['id_transaksi'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Metode Pembayaran <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="metode" name="metode" class="form-control myline" style="margin-bottom:5px" value="<?=$data['metode'];?>" readonly>
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
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <td><input type="text" id="keterangan_1" name="myDetails[1][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                <td><input type="text" id="nominal_1" name="myDetails[1][nominal]" class="form-control myline" onkeyup="getComa(this.value, this.id);"></td>
                                <td style="text-align:center">
                                    <a id="save_1" href="javascript:;" class="butn accept" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a> &nbsp;
                                    <a id="delete_1" href="javascript:;" class="butn cancel gamuncul" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_nominal" name="total_nominal" class="form-control" readonly="readonly"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=$url.'admin/index_apoteker.php';?>" class="butn defalt">Kembali </a> &nbsp;
                    <button type="button" href="javascript:;" class="butn accept" onclick="simpanData();">Approve</button>
                </div>    
            </div>
        </form>
    </div>
</div>
<?php include "../admin_footer.php"; ?>
<script>
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function simpanData(){
    if($.trim($("#keterangan_dokter").val()) == ""){
        Swal.fire({
          title: 'Error!',
          text: 'Keterangan Pasien harus di isi',
          icon: 'error',
        });
    }else{
        $('#formku').submit();
    }
}

function saveDetail(id){
    if($.trim($("#keterangan_"+id).val()) == ""){
        Swal.fire({
          title: 'Error!',
          text: 'Keterangan harus di isi',
          icon: 'error',
        });
    }else if($.trim($("#nominal_"+id).val()) == "" || 0){
        Swal.fire({
          title: 'Error!',
          text: 'Nominal harus di isi',
          icon: 'error',
        });
    }else{
        nominal = $('#nominal_'+id).val().toString().replace(/\,/g, "");
        total_nominal = $('#total_nominal').val().toString().replace(/\,/g, "");
        total_harga = Number(total_nominal) + Number(nominal); 
        total_harga = total_harga.toFixed(2);
        $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#save_"+id).hide();
        $('#keterangan_'+id).attr('readonly','readonly');
        $('#nominal_'+id).attr('readonly','readonly');
        $("#delete_"+id).removeClass('gamuncul');
        var new_id = id+1; 
        $("#tabel_dtr>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<td><input type="text" id="keterangan_'+new_id+'" name="myDetails['+new_id+'][keterangan]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                '<td><input type="text" id="nominal_'+new_id+'" name="myDetails['+new_id+'][nominal]" class="form-control myline" onkeyup="getComa(this.value, this.id);"></td>'+
                '<td style="text-align:center">'+
                    '<a id="save_'+new_id+'" href="javascript:;" class="butn accept" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="butn cancel gamuncul" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                '</td>'+
            '</tr>'
        );
    }
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus keterangan ini?");
    if (r==true){
        nominal = $('#nominal_'+id).val().toString().replace(/\,/g, "");
        total_nominal = $('#total_nominal').val().toString().replace(/\,/g, "");
        total_harga = Number(total_nominal) - Number(nominal); 
        total_harga = total_harga.toFixed(2);
        $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#no_tabel_'+id).closest('tr').remove();
    }
}
</script>