<?php
	require_once 'connection.php';
	session_start();
	if(isset($_POST["submit"])):
		$sql = "INSERT INTO pembayaran VALUES (null,
					'".$_POST["pinjam"]."',
					NOW())";
		if (mysqli_query($conn, $sql)) : 
			header("Location: InvoicePembayaran.php?id=".mysqli_insert_id($conn));
			exit();
		 else: ?>
			<script>
				alert("Gagal membayar");
			</script>
		<?php endif;
	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style7.css">
	<title>Pembayaran</title>
</head>

<body>
	<a href="Login.php?id=2">
	<img src="Back.png" alt="Back">
	</a>
	<center>	
		<div class="box"></div>
		<form method="POST">
		<div class="BoxJumlah"><p>Pilih Yang Ingin Dibayar</p></div>
		<div class="Jumlah">
			<select name="pinjam" id="pinjam">
				<?php
					$sql = "SELECT * FROM permintaan_peminjaman
					WHERE ID_Customer=".$_SESSION['logged'];
					$result = mysqli_query($conn, $sql);
					while($data = mysqli_fetch_array($result)):
				?>
					<option value="<?=$data['ID_PP']?>">
						Tanggal : <?=$data['Tanggal']?> | Jumlah :  <?=$data['Jumlah']?> | Tanggal Pembayaran : <?=$data['Tanggal_Pembayaran']?>
					</option>
				<?php endwhile ?>
			</select>
		</div>

		


		<input class="Bayar" type="submit" value="BAYAR" name="submit">
		</form>
	</center>

</body>
</html>