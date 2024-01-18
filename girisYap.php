<!DOCTYPE html>
<html>
<head>
	<title>Giriş Yap</title>
	<link rel='stylesheet' type='text/css' href='css_/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
	<div class="container" >
		<form action="admin/islem.php" method="post">
		<div class="row kayit justify-content-center align-items-center p-2 rounded" >

			<div class="col-8 border-bottom text-center pt-2 ">
					<br/><br/><br/>
					<h6>GİRİŞ SAYFASI</h6>
					<p>E-posta adresiniz ile girin</p>
			</div>
			
			<div class="col-10 my-2">
			    <div class="input-group has-validation">
			      <span class="input-group-text" >@</span>
			      <input type="text"  name="kmail" class="form-control" autocomplete="off" placeholder="E-posta Adresiniz" >
			      
			    </div>
  			</div>
			<div class="col-10 my-2 ">
				<input type="password" name="sifre" class="form-control" placeholder="Parola" required / >
			</div>
			<div class="col-10" style="color: red; font-size:12px;">
				
				<?php 
				error_reporting(0);
					if($_GET['loggin']=="no"){
						echo "Kullanıcı bulunamadı. E-mail adresiniz ya da şifreniz yanlış!";
					}
				?>
			
			</div>
			<div class="col-10 p-1 ">
				<button type="submit"  name="loggin" class="btn btn-success btn-block" >GİRİŞ YAP</button>
			</div>
			<div class="w-100 mt-4"></div>
			
		</div>
		</form>
	</div>

</body>
</html>