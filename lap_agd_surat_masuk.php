<title>Agenda Surat Masuk</title>
<?php
include 'koneksi.php';
include 'function_tanggal.php';
?>
<style type="text/css">
	body {
		font-size: 12px !important;
		color: #212121;
	}

	.grid-container {
		display: grid;
		grid-template-columns: auto 1fr;
		/* Mengatur kolom pertama mengikuti ukuran foto */
		grid-gap: 10px;
		/* Jarak antar elemen dalam grid */
	}

	.image {
		width: 100px;
		/* Mengatur lebar foto menjadi 50px */
		height: auto;
		/* Menjaga aspek ratio foto */
		margin-top: auto;
		margin-bottom: auto;
	}

	.text-top {
		grid-column: 2;
		/* Mengatur teks atas ke kolom kedua */
		grid-row: 1;
		/* Mengatur teks atas ke baris pertama */
		background-color: #f2f2f2;
		/* Warna latar belakang teks atas */
		padding: 10px;
		/* Padding pada teks atas */
	}

	h1 {
		font-size: x-large;
	}

	span {
		font-size: xx-large;
		font-weight: bolder;
	}

	.text {
		font-size: 15px !important;
		font-weight: bold;
		text-transform: uppercase;
	}

	#table tr th {
		font-size: 11px;
	}

	#table tr td {
		font-size: 10px;
	}
</style>

<div class="grid-container">
	<img class="image" src="assets/img/logo/logo.png" alt="Foto">
	<div class="text-top" align="center">
		<h1>PEMERINTAH KABUPATEN BANJAR <br> KECAMATAN MARTAPURA BARAT <br> <span>DESA TANGKAS</span> </h1>
		<h2>Jalan Martapura Lama RT 002 Desa Tangkas Kecamatan Martapura Barat Kode Pos 70618 E-Mail:
			desatangkas.kab.banjar@gmail.com</h2>
	</div>
</div>

<div class="row" align="center">


	<?php
	if (isset($_POST['cetak'])) {
		$dari_tanggal = InggrisTgl($_POST['dari_tanggal']);
		$sampai_tanggal = InggrisTgl($_POST['sampai_tanggal']);

		//indonesia Tgl
		$dari_tanggal_indo = IndonesiaTgl($dari_tanggal);
		$sampai_tanggal_indo = IndonesiaTgl($sampai_tanggal);

		if ($_REQUEST['dari_tanggal'] == "" || $_REQUEST['sampai_tanggal'] == "") {
			echo '<script>
								window.location.href="./index.php?page=agd_surat_masuk";
						 	 </script>';
			die();
		} else {
			$query = "SELECT * FROM surat_masuk WHERE tanggal_terima BETWEEN '$dari_tanggal' AND '$sampai_tanggal'";
			$sql = mysqli_query($connect, $query);
			?>
			<div class="col-md-10">
				<h4><strong>AGENDA SURAT MASUK DARI TANGGAL
						<?php echo $dari_tanggal_indo ?> SAMPAI TANGGAL
						<?php echo $sampai_tanggal_indo; ?>
					</strong></h4>
			</div>
			<table id="table" border="1" cellspacing="0" cellpadding="5" width="100%">
				<thead>
					<tr>
						<th width="1">No</th>
						<th>No agenda</th>
						<th>jenis Surat</th>
						<th>No Surat</th>
						<th>Isi Ringkas</th>
						<th>Asal Surat</th>
						<th>Tanggal Surat</th>
						<th>Tanggal Terima</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (mysqli_num_rows($sql) > 0) {
						$no = 1;
						while ($data = mysqli_fetch_array($sql)) {

							?>
							<td width="1">
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_agenda'] ?>
							</td>
							<td>
								<?php echo $data['jenis_surat'] ?>
							</td>
							<td>
								<?php echo $data['no_surat'] ?>
							</td>
							<td>
								<?php echo $data['isi_ringkas'] ?>
							</td>
							<td>
								<?php echo $data['asal_surat'] ?>
							</td>
							<td>
								<?php echo IndonesiaTgl($data['tanggal_surat']) ?>
							</td>
							<td>
								<?php echo IndonesiaTgl($data['tanggal_terima']) ?>
							</td>

						</tbody>
						<?php
						}
					} else {
						echo '<tr><td colspan="9"><center><h2><strong>Tidak ada Agenda surat Masuk</></strong></h2></center></td></tr>';
					}
		}
	}
	?>

	</table>
</div>
<script type="text/javascript">
	window.print();
</script>