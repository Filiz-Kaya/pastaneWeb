<?php include "header.php"; 
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");


//Güncelle işlemleri için veritabanından ürünler tablosuna ait bilgilerin çekildiği sorgu kısmı:
$kategori_id=$_GET['id'];

$vericek="select * from tblKategoriler where kategoriId='$kategori_id'";
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
				<div class="col-2 align-self-end"> <label>Kategori Adı: </label></div>
				<div class="col-6"> <input type="text" autocomplete="off" name="kategoriAd"  class="form-control font "  value="<?php echo $veriDizi['kategoriAd']; ?>"></div>
			</div>

			
			
			
			<input type="hidden" name="id" value="<?php echo $veriDizi['kategoriId']; ?>">
			<div class="row mt-3">
			<div class="col-8 text-right">
				<a href="islem.php?id=<?php echo $veriDizi['kategoriId'];?>"><input type="submit"  name="kGuncelleBtn" class="btn btn-success btn-sm" value="Güncelle"></a>
			</div>
		</div>	
		</form>	
	</div>
<?php include "footer.php"; ?>