<?php include "../admin_header.php";
$sql=mysqli_query($conn,"SELECT a.*, t.no_transaksi, t.nama, t.umur, t.jenis_kelamin, t.metode FROM antrian a
							LEFT JOIN transaksi t on a.id_transaksi = t.id
							WHERE status = 0");
?>
<h1 class="mt-4">Data Transaksi</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Transaksi Pasien
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Antrian</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th>No Transaksi</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php while($d=mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td><?=$d['nomor'];?></td>
                        <td><?=$d['metode'];?></td>
                        <td><?=$d['tanggal'];?></td>
                        <td><?=$d['no_transaksi'];?></td>
                        <td><?=$d['nama'];?></td>
                        <td><?=$d['umur'];?></td>
                        <td><?=($d['jenis_kelamin']==0)? 'Laki-Laki' : 'Perempuan';?></td>
                        <td>
                            <?php if($_SESSION['user']['id_roles']==2){ ?>
                                <a href="<?=$url.'admin/view_trx.php?id='.$d['id'];?>" class="btn btn-success">View Transaksi</a>
                            <?php } ?>
                        </td>
                    </tr>
	                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../admin_footer.php"; ?>