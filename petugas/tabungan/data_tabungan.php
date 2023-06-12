<!-- Content Header (Page header) -->
<?php
    $id_karyawan = $_POST["id_karyawan"];
?>

<?php
	$sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST' and id_karyawan='$id_karyawan'");
	while ($data= $sql->fetch_assoc()) {
	
		$setor=$data['Tsetor'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR' and id_karyawan='$id_karyawan'");
	while ($data= $sql->fetch_assoc()) {
	
		$tarik=$data['Ttarik'];
	}
?>


<section class="content-header">
	<h1>
		Tabungan
		<small>Karyawan</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>SITAKAR</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->

<section class="content">

	<!-- /.box-header -->

	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Info Tabungan</h4>

		<h4>
			Tot. Setoran :
			<?php echo rupiah($setor); ?>
		</h4>
		<h4>
			Tot. Tarikan :
			<?php echo rupiah($tarik); ?>
		</h4>
		<hr>
		<h3>Saldo Tabungan :
			<?php
			$saldo= $setor-$tarik;
			echo rupiah($saldo);
			?>
		</h3>
	</div>


	<div class="box box-primary">
		<div class="box-header">
			<a href="?page=view_tabungan" class="btn btn-primary">
				<i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
			<a href="./report/cetak-tabungan.php?id_karyawan=<?php echo $id_karyawan ?>" target=" _blank"
			 class="btn btn-default">
				<i class="glyphicon glyphicon-print"></i> Cetak</a>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Karyawan</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Setoran</th>
							<th>Tarikan</th>
							<th>Petugas</th>
						</tr>
					</thead>
					<tbody>

						<?php

                  $no = 1;
				  $sql = $koneksi->query("select k.id_karyawan, k.nama_karyawan, t.id_tabungan, t.setor, t.tarik, t.tgl, t.petugas from 
				  tb_karyawan k join tb_tabungan t on k.id_karyawan=t.id_karyawan 
				  where k.id_karyawan ='$id_karyawan' order by tgl asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_karyawan']; ?>
							</td>
							<td>
								<?php echo $data['nama_karyawan']; ?>
							</td>
							<td>
								<?php  $tgl = $data['tgl']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
							<td align="right">
								<?php echo rupiah($data['setor']); ?>
							</td>
							<td align="right">
								<?php echo rupiah($data['tarik']); ?>
							</td>
							<td>
								<?php echo $data['petugas']; ?>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>