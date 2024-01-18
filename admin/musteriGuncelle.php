<?php include "header.php"; 
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	

//Güncelle işlemleri için veritabanından ürünler tablosuna ait bilgilerin çekildiği sorgu kısmı:
$id=$_GET['id'];

$vericek="select * from tblMusteriler where musteriId='$id'";
$sonuc=$db->query($vericek);
$veriDizi=$sonuc->fetch_assoc();

	?>
	

	<div class="col-10 mb-5 offset-2 pl-5 mt-4 font" id="boy">
		<form action="islem.php" method="post" >
			<?php 
			
			if($_GET['durum']=="ok"){ 
			?>
			<div class="alert alert-success" role="alert">
 			 Güncelleme işlemi yapıldı. 
			</div>

			<?php } 
			elseif($_GET['durum']=="no"){ 
			?>
				<div class="alert alert-danger" role="alert">
 					 Güncelleme işlemi Yapılamadı :( 
 				</div>

			<?php } 
			else{ 
			?>
				<div class="alert alert-primary" role="alert">
 				 Güncelleme işlemini bu sayfadan yapabilirsiniz... 
 				</div>
			<?php } 
			?>


			<div class="row mt-4   ">
				<div class="col-2 align-self-end"> <label>Ad-Soyad: </label></div>
				<div class="col-6"> <input type="text"  required=""  name="musteriAd" value="<?php echo $veriDizi['musteriAdSoyad']; ?>" class="form-control font "placeholder="Müşteri adını giriniz."></div>
			</div>
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Mail: </label></div>
				<div class="col-6"> 
					<input type="email"  name="mail"  placeholder="E-mail adresini giriniz." value="<?php echo $veriDizi['musteriMail']; ?>" class="form-control font">
				</div>
			</div>
			<div class="row mt-1 ">
					<div class="col-2 align-self-end"> <label>Şifre: </label></div>
				<div class="col-6"> <input type="password" name="sifre" value="<?php echo $veriDizi['musteriSifre']; ?>" class="form-control font" required=""></div>
			</div>
			
			
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label >Telefon: </label></div>
				<div class="col-6" > 
					  <input type="text"  class="form-control font " autocomplete="off" name="telefon" value="<?php echo $veriDizi['musteriTel'];?>" maxlength="12" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
				</div>
				
			</div>
			
			
			<div class="row mt-1">
					<div class="col-2 align-self-end"> <label>Adres: </label></div>
					<div class="col-6"> 
						<input type="text"  class="form-control font " value="<?php echo $veriDizi['musteriAdres']; ?>" name="adres" required="" >
					</div>
				</div>

			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Kart No: </label></div>
				<div class="col-6" > 
					
					  <input type="text" class="form-control font" name="kartNo" value="<?php echo $veriDizi['musteriKart']; ?>" placeholder="Kart Numaranızı Giriniz.">
				</div>
				
			</div> 
			<input type="hidden" name="id" value="<?php echo $veriDizi['musteriId']; ?>">
			
			<div class="row mt-3">
			<div class="col-8 text-right">
				<input type="submit"  name="musGuncelle" class="btn btn-success btn-sm" value="Güncelle">
			</div>
		</div>	
		</form>	
	</div>
<?php include "footer.php"; ?>