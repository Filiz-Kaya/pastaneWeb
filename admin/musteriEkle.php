	<?php include "header.php"; 
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	$sorgu="select * from tblKategoriler ";
	$sonuc=$db->query($sorgu);
	
	?>
	
	<div class="col-10 mb-5 offset-2 pl-5 mt-4 font" id="boy">
		<form action="islem.php" method="post" >

			<?php 
			
			if($_GET['durum']=="ok"){ 
			?>
			<div class="alert alert-success" role="alert">
 			  Müşteri kaydı yapıldı.
			</div>

			<?php } 
			elseif($_GET['durum']=="no"){ 
			?>
				<div class="alert alert-danger" role="alert">
 					Müşteri kaydı yapılamadı. :(
 				</div>

			<?php } 
			else{ 
			?>
				<div class="alert alert-primary" role="alert">
 				 Müşteri kaydını bu sayfadan yapabilirsiniz. 
 				</div>
			<?php } 
			?>
			<div class="row mt-4   ">
				<div class="col-2 align-self-end"> <label>Ad-Soyad: </label></div>
				<div class="col-6"> <input type="text" autocomplete="off" required=""  name="musteriAd"  class="form-control font "placeholder="Müşteri adını giriniz."></div>
			</div>
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Mail: </label></div>
				<div class="col-6"> 
					<input type="email"  name="mail" autocomplete="off" placeholder="E-mail adresini giriniz." class="form-control font">
				</div>
			</div>
			<div class="row mt-1 ">
					<div class="col-2 align-self-end"> <label>Şifre: </label></div>
				<div class="col-6"> <input type="password" autocomplete="off" name="sifre" class="form-control font" required=""></div>
			</div>
			
			
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label for="telefon" autocomplete="off">Telefon: </label></div>
				<div class="col-6" > 
					
					  <input type="tel" maxlength="12" class="form-control font " autocomplete="off" name="telefon" required="" placeholder="554-111-2233" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
				</div>
				
			</div>
			
			
			<div class="row mt-1">
					<div class="col-2 align-self-end"> <label>Adres: </label></div>
					<div class="col-6"> 
						<input type="text"  autocomplete="off" class="form-control font " name="adres" required="" >
					</div>
				</div>

			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Kart No: </label></div>
				<div class="col-6" > 
					
					  <input type="text" autocomplete="off" class="form-control font" name="kartNo"  placeholder="Kart Numaranızı Giriniz.">
				</div>
				
			</div> 
			
			<div class="row mt-3">
			<div class="col-8 text-right">
				<input type="submit"  name="musKaydet" class="btn btn-success btn-sm" value="Kaydet">
			</div>
		</div>	
		</form>	
	</div>
<?php include "footer.php"; ?>