<?php 
    require_once 'connection.php';
	if(isset($_POST["submit"])):
		$sql = "INSERT INTO customer VALUES (null,
					'".$_POST["Nama"]."',
					'".$_POST["Telepon"]."',
					'".$_POST["Jenis_Kelamin"]."',
					'".$_POST["Rekening"]."',
					'".$_POST["Alamat"]."',
					md5('".$_POST["Password"]."'))";
		if (mysqli_query($conn, $sql)) : ?>
			<script>
				alert("Berhasil mendaftar");
			</script>
		<?php else: ?>
			<script>
				alert("Gagal mendaftar");
			</script>
		<?php endif;
	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style4.css">
	<title>Create Account</title>
</head>

<body>
	<a href="Login.php">
	<img src="Back.png" alt="Back">
	</a>
	<form method="POST">
	<center>	
	
		<div class="box"></div>

		<div class="BoxNama"><p>Nama</p></div>
		<div class="Nama">
			<input type="text" id="Nama" name="Nama" placeholder=""> 
		</div>

		<div class="BoxNo"><p>No Telepon</p></div>
		<div class="Telp">
			<input type="text" id="Telepon" name="Telepon" placeholder="08xxxxxxxxxx"> 
		</div>

		<div class="BoxJK"><p>Jenis Kelamin</p></div>
		<div class="Jenis">
			<input type="text" id="Jenis Kelamin" name="Jenis_Kelamin" placeholder="Laki-Laki/Perempuan"> 
		</div>

		<div class="BoxRek"><p>Nomor Rekening</p></div>
		<div class="Rekening">
			<input type="text" id="Rekening" name="Rekening" placeholder=""> 
		</div>

		<div class="BoxAlamat"><p>Alamat</p></div>
		<div class="Alamat">
			<input type="text" id="Alamat" name="Alamat" placeholder=""> 
		</div>
		<div class="BoxPassword"><p>Password</p></div>
		<div class="Password">
			<input type="password" id="Password" name="Password" placeholder=""> 
		</div>
		<input class="Create" type="submit" value="CREATE ACCOUNT" name="submit">

	</center>
	</form>
</body>
</html>