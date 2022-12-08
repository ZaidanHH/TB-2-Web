<?php 
    require_once 'connection.php';
	session_start();

	if(isset($_POST["submit"])) :
		$sql = "SELECT ID_Customer FROM customer WHERE No_Telp = '".$_POST['Telepon']."' AND password = md5('".$_POST['Password']."')";
		
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0):
			$row = mysqli_fetch_array($result);
			$_SESSION["logged"]=$row['ID_Customer'];
			if($_GET['id']==1){
				header("Location: AplikasiPinjaman.php");
				exit();
			}else{
				header("Location: Pembayaran.php");
				exit();
			}
		else : ?>
			<script>
				alert("Nomor Telepon atau password salah");
			</script>
<?php   endif;
	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Login</title>
</head>

<body>
	<center>	
		<div class="Judul">
			<a href="Index.html">
			<img src="TBA.png" alt="TBA">
			</a>
		</div>
		<div class="box"></div>
		<div class="shadow"></div>
		<form method="POST">
		<div class="BoxNomor">
			<input type="text" id="Nomor Handphone" name="Telepon" placeholder="Nomor Handphone"> 
		</div>

		<div class="BoxPassword">
			<input type="password" id="password" name="Password" placeholder="Password"> 
		</div>

		<div class="ForgotPassword">
			<p>Forget Password</p>
		</div>

		<input class="LOGIN" type="submit" value="submit" name="submit">
		</form>
		<!-- <button type="submit" class="login" onclick="document.location='AplikasiPinjaman.html'">LOGIN</button> -->

		<div class="Text1">
		<p>New User?</p>
	</div>

	<div class="Text2">
		<a href="CreateAccount.php">
		<p>Sign up</p>
		</a>

	</div>

	</center>

</body>
</html>