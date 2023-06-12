<section class="content-header">
	<h1>
		Master Data
		<small>Karyawn</small>
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
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_karyawan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
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
							<th>ID_karyawan</th>
							<th>Nama</th>
							<th>JK</th>
							<th>UPT</th>
							<th>Status</th>
							<th>Th Masuk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT s.id_karyawan, s.nama_karyawan, s.jekel, s.status, s.th_masuk, k.upt 
                  from tb_karyawan s inner join tb_upt k on s.id_upt=k.id_upt 
                  order by upt asc, id_karyawan asc");
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
								<?php echo $data['jekel']; ?>
							</td>
							<td>
								<?php echo $data['upt']; ?>
							</td>

							<?php $warna = $data['status']  ?>
							<td>
								<?php if ($warna == 'Aktif') { ?>
								<span class="label label-primary">Aktif</span>
								<?php } elseif ($warna == 'Lulus') { ?>
								<span class="label label-success">Lulus</span>
								<?php } elseif ($warna == 'Pindah') { ?>
								<span class="label label-danger">Pindah</span>
							</td>
							<?php } ?>

							<td>
								<?php echo $data['th_masuk']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_karyawan&kode=<?php echo $data['id_karyawan']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=MyApp/del_karyawan&kode=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
									</a>
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