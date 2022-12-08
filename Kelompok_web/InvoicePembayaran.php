<?php
	require_once 'connection.php';
	$sql = "SELECT pembayaran.Tanggal as tanggal_membayar, permintaan_peminjaman.*, (TIMESTAMPDIFF(MONTH, permintaan_peminjaman.Tanggal, Tanggal_Pembayaran)+1) as lama FROM pembayaran LEFT JOIN permintaan_peminjaman USING(ID_PP)
    WHERE ID_Pembayaran=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    if($data==null){
        header("Location: Pembayaran.php");
        exit();
    }
	$perbulan = (($data['Jumlah']/$data['lama'])*1.02);
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
		<p>PEMBAYARAN BERHASIL</p>
	</div>
	
	<div class="box"></div>

	<div class="Heading2">
		<p>Ringkasan Transaksi</p>
	</div>
	<div class="Tanggal">
		<p>Tanggal</p>
	</div>

	<div class="Tanggal1">
		<p><?=$data['tanggal_membayar']?></p>
	</div>

	<div class="Bunga">
		<p>Tanggal Meminjam</p>
	</div>

	<div class="Persen">
		<p><?=$data['Tanggal']?></p>
	</div>

	<div class="PB">
		<p>Tanggal Batas Pembayaran</p>
	</div>

	<div class="PB1">
		<p><?=$data['Tanggal_Pembayaran']?></p>
	</div>

	<div class="JP">
		<p>Bunga</p>
	</div>

	<div class="JP1">
		<p>2%</p>
	</div>

	<div class="Total">
		<p>Pembayaran Bulanan</p>
	</div>

	<div class="Total1">
		<p>Rp. <?=$perbulan?></p>
	</div>

	<button class="Accept" onclick="document.location='Index.html'">Accept</button>
</body>
</html>