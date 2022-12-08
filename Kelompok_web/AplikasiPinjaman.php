<?php 
    require_once 'connection.php';
	session_start();
	if(isset($_POST["submit"])):
		$sql = "INSERT INTO permintaan_peminjaman VALUES (null,
					'".$_SESSION['logged']."',
					'".$_POST["Tanggal"]."',
					'".$_POST["Jumlah"]."',
					'".$_POST["Pembayaran"]."')";
		if (mysqli_query($conn, $sql)) : 
			header("Location: InvoicePeminjaman.php?id=".mysqli_insert_id($conn));
			exit();
		 else: ?>
			<script>
				alert("Gagal meminjam");
			</script>
		<?php endif;
	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proses Pinjaman</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<a href="Login.php?id=1">
	<img src="Back.png" alt="Back">
	</a>
	<center>
		<div class="box"></div>
		<form method="POST">
		<div class="BoxTgl"><p>Tanggal</p></div>
		<div class="Tanggal">
			<input type="date" id="Tanggal" name="Tanggal" placeholder=""> 
		</div>

		<div class="BoxWaktu"><p>Jumlah</p></div>
		<div class="Waktu">
			<input type="text" id="Jumlah" name="Jumlah" placeholder="Rp.x.xxx.xxx"> 
		</div>
		<div class="BoxJumlah"><p>Tanggal Pembayaran</p></div>
		<div class="Jumlah">
			<input type="date" id="Pembayaran" name="Pembayaran" placeholder=""> 
		</div>

		<div class="SnK">
			<input type="checkbox" required>
			<p>I agree to the Terms & Conditions and Policy.</p>
		</div>

		<input class="Proses" type="submit" value="PROCEED" name="submit" >
		</form>
	</center>
</body>
</html>