<title>Lembar Disposisi</title>
<?php
include 'koneksi.php';
include 'function_tanggal.php';
?>
<style type="text/css">
	body {
		font-size: 12px !important;
		color: #212121;
	}

	table {
		width: 100%;
		font-size: 12px;
		color: 212121;
	}

	tr,
	td {
		border: 1px solid #444;
		padding: 8px !important;
		vertical-align: middle;
		!important;
	}

	#lbr {
		font-size: 17px;
		font-weight: bold;
	}

	.isi_rks {
		height: 150px !important;
	}

	.tgh {
		text-align: center;
	}

	#right {
		border-right: none !important;
	}

	#left {
		border-left: none !important;
	}

	.header {
		text-align: center;
		margin: -.5rem 0;
	}

	.logo1 {
		float: left;
		position: relative;
		width: 80px;
		height: 80px;
		margin: 0 0 0 1.2rem;
	}

	.text {
		font-size: 15px !important;
		font-weight: bold;
		text-transform: uppercase;
	}

	#lead {
		width: auto;
		position: relative;
		margin: 15px 0 0 75%;
	}

	.lead {
		font-weight: bold;
		text-decoration: underline;
		margin-bottom: -10px;
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
</style>
<br>
<div class="grid-container">
	<img class="image" src="assets/img/logo/logo.png" alt="Foto">
	<div class="text-top" align="center">
		<h1>PEMERINTAH KABUPATEN BANJAR <br> KECAMATAN MARTAPURA BARAT <br> <span>DESA TANGKAS</span> </h1>
		<h2>Jalan Martapura Lama RT 002 Desa Tangkas Kecamatan Martapura Barat Kode Pos 70618 E-Mail:
			desatangkas.kab.banjar@gmail.com</h2>
	</div>
</div>

<div class="row" align="center">
	<br>
	<br>
	<table cellspacing="0" cellspacing="5">
		<?php
		$id_surat = $_REQUEST['id'];
		$query = "SELECT * FROM surat_masuk WHERE id='$id_surat'";
		$sql = mysqli_query($connect, $query);
		while ($data = mysqli_fetch_array($sql)) {

			?>
			<tr>
				<td class="tgh"="tgh" id="lbr" colspan="5">LEMBAR DISPOSISI</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> Tanggal Surat :</strong></td>
				<td id="left" colspan="2">
					<?php echo IndonesiaTgl($data['tanggal_surat']); ?>
				</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> Nomor Surat :</strong></td>
				<td id="left" colspan="2">
					<?php echo $data['no_surat'] ?>
				</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> No Agenda :</strong></td>
				<td id="left" colspan="2">
					<?php echo $data['no_agenda'] ?>
				</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> Asal Surat :</strong></td>
				<td id="left" colspan="2">
					<?php echo $data['asal_surat'] ?>
				</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> Isi Ringkas :</strong></td>
				<td id="left" colspan="2">
					<?php echo $data['isi_ringkas']; ?>
				</td>
			</tr>
			<tr>
				<td id="right" width="200"><strong> Diterima Tanggal :</strong></td>
				<td id="left" colspan="2">
					<?php echo IndonesiaTgl($data['tanggal_terima']) ?>
				</td>
			</tr>
			<?php
		}

		$query2 = "SELECT * FROM disposisi JOIN surat_masuk ON disposisi.id_surat = surat_masuk.id WHERE disposisi.id_surat='$id_surat'";
		$sql2 = mysqli_query($connect, $query2);
		while ($row = mysqli_fetch_array($sql2)) {
			?>

			<tr class="isi_rks">
				<td>
					<strong> Isi Disposisi </strong><br>
					<?php echo $row['isi_disposisi'] ?>
					<div style="height: 50px"></div>
					<strong>Batas Waktu :</strong>
					<?php echo $row['batas_waktu'] ?><br>
					<strong>Sifat :</strong>
					<?php echo $row['sifat'] ?><br>
					<strong>Catatan :</strong> <br>
					<?php echo $row['catatan'] ?>
					<div style="height: 25px"></div>
				</td>
				<td><strong>Diteruskan Kepada :</strong>
					<?php echo $row['tujuan']; ?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
	<div id="lead">
		<p>Mengetahui,<br>
			Kepala Sekolah</p>
		<div style="height: 50px"></div>
		<p class="lead">Iip Zakiah M.Ag</p>
		<p>NIP. 197502212009032003</p>
	</div>
</div>

<script type="text/javascript">
	window.print();
</script>