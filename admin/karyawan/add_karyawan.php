<section class="content-header">
	<h1>
		Master Data
		<small>Karyawan</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>SIRAJUNG</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah karyawan</h3>
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
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Nomor Karyawan</label>
							<input type="text" name="id_karyawan" id="id_karyawan" class="form-control" placeholder="id_karyawan">
						</div>

						<div class="form-group">
							<label>Nama karyawan</label>
							<input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama karyawan">
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option>-- Pilih --</option>
								<option>LK</option>
								<option>PR</option>
							</select>
						</div>

						<div class="form-group">
							<label>UPT</label>
							<select name="id_upt" id="id_upt" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from tb_upt";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_upt'] ?>">
									<?php echo $row['upt'] ?>
								</option>
								<?php
                  }
                  ?>
							</select>
						</div>

						<div class="form-group">
							<label>Tahun Masuk</label>
							<input type="number" name="th_masuk" id="th_masuk" class="form-control" placeholder="Th Masuk">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_karyawan" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_karyawan (id_karyawan,nama_karyawan,jekel,id_upt,status,th_masuk) VALUES (
           '".$_POST['id_karyawan']."',
          '".$_POST['nama_karyawan']."',
          '".$_POST['jekel']."',
          '".$_POST['id_upt']."',
          'Aktif',
          '".$_POST['th_masuk']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_karyawan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_karyawan';
          }
      })</script>";
    }
  }
    
