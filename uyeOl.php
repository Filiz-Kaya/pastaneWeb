<!DOCTYPE html>
<html>
<head>
	<title>Üye Ol</title>
	<link rel='stylesheet' type='text/css' href='css_/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body>
	<div class="container">
	<form action="admin/islem.php" method="post">
		
		<div class="row kayit p-2 justify-content-center align-items-center rounded" >
			<div class="col-8 border-bottom text-center pt-2"  >
					<br/><br/><br/>
					<h6>ÜYE KAYIT SAYFASI</h6>
					<p>E-posta adresiniz ile üye olun</p>
			</div>
			
			<div class="col-5  text-center">
				<input type="text" class="form-control" placeholder="Adınız" name="ad" autocomplete="off" required="" / >
			</div>
			<div class="col-5 text-center">
				<input type="text" class="form-control" placeholder="Soyadınız" name="soyad" autocomplete="off" required="" / >
			</div>
			<div class="col-10 ">
		    <div class="input-group has-validation">
		      <span class="input-group-text">@</span>
		      <input type="email" class="form-control" name="email" autocomplete="off" placeholder="E-posta Adresiniz" required>
		      
		    </div>
  			</div>
			<div class="col-10">
				<input type="password"  name="sifre" class="form-control" placeholder="Parola"  required="" / >
			</div>
			<?php
			if($_GET['kayit']=='ok'){
				echo "<div style='font-size:14px; font-style:italic; color:green;'><b>Kayıt işlemi yapıldı.</b></div>";
			}
			else if ($_GET['kayit']=='noo') {
				echo "<div class='col-10' style='font-size:14px; font-style:italic; color:red;'>Kayıt işlemi yapılamadı.</div>";
			}
			else if ($_GET['kayit']=='no') {
				echo "<div class='col-10' style='font-size:14px; font-style:italic; color:red;'>Bu e-mail adresi ile daha önceden kayıt yapılmış!</div>";
			}
			else{
				echo "<div class='col-10' style='font-size:14px; font-style:italic; color:white;'>Kayıt işlemini bu sayfadan yapabilirsiniz.</div>";
			}
 			?>
			<div class="col-10 p-1 mb-5">
				<button type="submit"  name="uyeKayit" class="btn btn-success btn-block">ÜYE OL</button>
			</div>	
		</div>
	</form>
	</div>
</body>
</html>