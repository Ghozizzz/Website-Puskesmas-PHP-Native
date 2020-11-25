<?php include "../admin_header.php";
$sql=mysqli_query($conn,"SELECT a.*, t.no_transaksi, t.nama, t.umur, t.jenis_kelamin, t.nilai, t.metode FROM antrian a
							LEFT JOIN transaksi t on a.id_transaksi = t.id
							WHERE status = 2");
?>
<h1 class="mt-4">Data Transaksi</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Transaksi Pembayaran Pasien
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Antrian</th>
                        <th>Tanggal</th>
                        <th>No Transaksi</th>
                        <th>Nama</th>
                        <th>Metode Pembayaran</th>
                        <th>Nilai Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php while($d=mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td><?=$d['nomor'];?></td>
                        <td><?=$d['tanggal'];?></td>
                        <td><?=$d['no_transaksi'];?></td>
                        <td><?=$d['nama'];?></td>
                        <td><?=$d['metode'];?></td>
                        <td><?=number_format($d['nilai'],2,',','.');?></td>
                        <td><a href="<?=$url.'admin/view_pmb.php?id='.$d['id'];?>" class="btn btn-success">View Transaksi</a></td>
                    </tr>
	                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../admin_footer.php"; ?>