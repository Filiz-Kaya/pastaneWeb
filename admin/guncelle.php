<?php include "header.php"; 
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	$sorgu="select * from tblKategoriler ";
	$sonuc=$db->query($sorgu);
	$ks=$sonuc->num_rows;

//Güncelle işlemleri için veritabanından ürünler tablosuna ait bilgilerin çekildiği sorgu kısmı:
$urun_id=$_GET['urun_id'];

$vericek="select * from tblUrunler where urunId='$urun_id'";
$sonuc2=$db->query($vericek);
$veriDizi=$sonuc2->fetch_assoc();

	?>
	

	<div class="col-10 mb-5 offset-2 pl-5 mt-4 font" id="boy">
		<form action="islem.php" method="post" enctype="multipart/form-data">
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
				<div class="col-2 align-self-end"> <label>Ürün Adı: </label></div>
				<div class="col-6"> <input type="text"  name="urunAd"  class="form-control font "  value="<?php echo $veriDizi['urunAd']; ?>"></div>
			</div>
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Ürün Açıklama: </label></div>
				<div class="col-6"> 
					<input type="text"  name="aciklama" class="form-control font" value="<?php echo $veriDizi['urunAciklama']; ?>">
				</div>
			</div>
			<div class="row mt-1 ">
					<div class="col-2 align-self-end"> <label>Ürün Fiyat: </label></div>
				<div class="col-6"> <input type="text" name="fiyat" class="form-control font" value="<?php echo $veriDizi['urunFiyat']; ?>"></div>
			</div>
			
			
			<div class="row mt-1 ">
				<div class="col-2 align-self-end"> <label>Ürün Resim: </label></div>
				<div class="col-6" > 
					
					  <input type="file" name="urunResim"  required="" multiple accept=".jpg, .png, .gif, .jpeg" value="<?php echo $veriDizi['urunResim']; ?>">
				</div>
				
			</div>
			
			
			<div class="row mt-1">
					<div class="col-2 align-self-end"> <label>Kategori:  </label></div>
					<div class="col-6"> 
						<select class="form-select form-control font" name="mySelect" >
						<?php for($i=0;$i<$ks;$i++){
								$kayitDizi=$sonuc->fetch_assoc();
								$id=$kayitDizi["kategoriId"];
								$ad=$kayitDizi["kategoriAd"];
								?>
								  <option value="<?php echo $id ?>" name="kategori"> <?php echo $ad ?> </option>
								
								<?php } ?>
						</select>		
					</div>
				</div>
				<input type="hidden" name="urun_id" value="<?php echo $veriDizi['urunId']; ?>">
			<div class="row mt-3">
			<div class="col-8 text-right">
				<a href="islem.php?urun_id=<?php echo $veriDizi['urunId'];?>"><input type="submit"  name="guncelleBtn" class="btn btn-success btn-sm" value="Güncelle"></a>
			</div>
		</div>	
		</form>	
	</div>
<?php include "footer.php"; ?>