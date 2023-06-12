<?php
    include "../inc/koneksi.php";
    //FUNGSI RUPIAH
    include "../inc/rupiah.php";

    $nis = $_GET['nis'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>SITAKAR - Sistem Informasi Tabungan Karyawan</title>
</head>

<body>
	<center>

		<h2>Tabungan Karyawan</h2>
		<h3>KANTOR PUSAT POMOSDA</h3>
		<p>Jl. Wachid Hasyim, Tanjung, Tanjunganom, Kec. Tanjunganom<br>Kabupaten Nganjuk, Jawa Timur 64482</p>
		<p>Rajin Pangkal Pandai. Hemat Pangkal Kaya.</p>
		<p>___________________________________________________________________</p>

		<tbody>
			<?php
                 $sql_tampil = "select * from tb_karyawan
                 where nis ='$nis'";
                 
                 $query_tampil = mysqli_query($koneksi, $sql_tampil);
                 $no=1;
                 while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                ?>

			<tr>
				<td>NIS</td>
				<td>:</td>
				<td>
					<?php echo $data['id_karyawan']; ?>
				</td>
			</tr>
			<br>
			<tr>
				<td>Nama karyawan</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_karyawan']; ?>
				</td>
			</tr>
			<br>
			<br>
			<?php } ?>
		</tbody>

		<table border="1" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Tanggal</th>
					<th>Pemasukan</th>
					<th>Pengeluaran</th>
					<th>Petugas</th>
				</tr>
			</thead>


			<tbody>

				<?php
                $sql_tampil = "select k.id_karyawan, k.nama_karyawan, t.id_tabungan, t.setor, t.tarik, t.tgl, t.petugas from 
                tb_karyawan k join tb_tabungan t on k.nik=t.nik 
                where k.id_karyawan ='$id_karyawan' order by tgl asc";
                
                $query_tampil = mysqli_query($koneksi, $sql_tampil);
                $no=1;
                while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                ?>
				<tr>
					<td>
						<?php echo $no; ?>
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
            $no++;
            }
        ?>
			</tbody>
			<tr>
				<td colspan="2">Total Setoran</td>
				<td colspan="3">
					<?php
                    $sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST' and id_karyawan='$id_karyawan'");
                    while ($data= $sql->fetch_assoc()) {
                    echo rupiah($data['Tsetor']); }?>
				</td>
			</tr>
			<tr>
				<td colspan="3">Total Penarikan</td>
				<td colspan="3">
					<?php
                    $sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR' and id_karyawan='$id_karyawan'");
                    while ($data= $sql->fetch_assoc()) {
                    echo rupiah($data['Ttarik']); }?>
				</td>
			</tr>
			<tr>
				<td colspan="2">Saldo Tabungan</td>
				<td colspan="3">
					<?php
                    $sql = $koneksi->query("SELECT SUM(setor)-SUM(tarik) as Total  from tb_tabungan where id_karyawan='$id_karyawan'");
                    while ($data= $sql->fetch_assoc()) {
                    echo rupiah($data['Total']); }?>
				</td>
			</tr>
		</table><br>
		<h4>Terimakasih Sudah Rajin Menabung</h4>
		<h5>Simpan Sebagai Tanda Bukti</h5>
		
	</center>
	<script>
		window.print();
	</script>

</body>

</html>