<?php
	require_once 'connection.php';
	$sql = "SELECT *, (TIMESTAMPDIFF(MONTH, Tanggal, Tanggal_Pembayaran)+1) as lama FROM permintaan_peminjaman
    WHERE ID_PP=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    if($data==null){
        header("Location: AplikasiPinjaman.php");
        exit();
    }
	$perbulan = (($data['Jumlah']/$data['lama'])*1.02);
	$total = $perbulan*$data['lama'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
	<img src="Ceklis.png" alt="Berhasil">
	<div class="Heading">
		<p>PEMINJAMAN BERHASIL</p>
	</div>
	
	<div class="box"></div>
	<div class="Heading2">
		<p>Ringkasan Transaksi</p>
	</div>

	<div class="Tanggal">
		<p>Tanggal Pembayaran</p>
	</div>

	<div class="Tanggal1">
		<p><?=$data['Tanggal_Pembayaran']?></p>
	</div>

	<div class="Bunga">
		<p>Bunga</p>
	</div>

	<div class="Persen">
		<p>2%</p>
	</div>

	<div class="PB">
		<p>Pembayaran Bulanan</p>
	</div>

	<div class="PB1">
		<p>Rp. <?=$perbulan?></p>
	</div>

	<div class="Total">
		<p>Total Jumlah Pengembalian</p>
	</div>

	<div class="Total1">
		<p>Rp. <?=$total?></p>
	</div>

	<button class="Accept" onclick="document.location='Index.html'">Accept</button>
</body>
</html>