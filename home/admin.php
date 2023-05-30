<?php
	$sql = $koneksi->query("SELECT count(nis) as siswa  from tb_siswa where status='Aktif'");
	while ($data= $sql->fetch_assoc()) {
	
		$siswa=$data['siswa'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST'");
	while ($data= $sql->fetch_assoc()) {
	
		$setor=$data['Tsetor'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR'");
	while ($data= $sql->fetch_assoc()) {
	
		$tarik=$data['Ttarik'];
	}

	$saldo=$setor-$tarik;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Administrator</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box" style="border-radius:10px; background-color: #F9E0BB;">
				<div class="inner">
					<h2>
						<?= $siswa; ?>
					</h2>

					<h4>Siswa</h4>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="?page=MyApp/data_siswa" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box" style="border-radius:10px; background-color: #FFC26F;">
				<div class="inner">
					<h2>
						<?= rupiah($setor); ?>
					</h2>

					<h4>Total Setoran</h4>
				</div>
				<div class="icon">
					<i class="fa fa-arrow-circle-o-down"></i>
				</div>
				<a href="?page=data_setor" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box" style="border-radius:10px; background-color: #C38154;">
				<div class="inner">
					<h2>
						<?= rupiah($tarik); ?>
					</h2>
					<h4>Total Penarikan</h4>
				</div>
				<div class="icon">
					<i class="fa fa-arrow-circle-o-up"></i>
				</div>
				<a href="?page=data_tarik" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box" style="border-radius:10px; background-color: #00A65A;">
				<div class="inner">
					<h2>
						<?= rupiah($saldo); ?>
					</h2>
					<h4>Total Saldo</h4>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="" class="small-box-footer">
					<i class="fa fa-book"></i>
				</a>
			</div>
		</div>
	</div>

	<!-- /.box-body -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="box box-primary" style="border-radius:10px;">
				<div class="box-header">
					<h3><strong>Profil Sekolah</strong></h3>
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
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><h4><b>Nama Sekolah</b></h4></th>
									<th><h4><b>Alamat</b></h4></th>
									<th><h4><b>Akreditasi</b></h4></th>
								</tr>
							</thead>
							<tbody>
								<?php
                  				$sql = $koneksi->query("select * from tb_profil");
                  				while ($data= $sql->fetch_assoc()) {
                				?>
								<tr>
									<td>
										<?php echo $data['nama_sekolah']; ?>
									</td>
									<td>
										<?php echo $data['alamat']; ?>
									</td>
									<td>
										Akreditasi
										<?php echo $data['akreditasi']; ?>
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
		</div>
	</section>