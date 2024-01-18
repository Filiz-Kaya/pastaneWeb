<?php 
include "header.php";
		$db=new mysqli("localhost","root","","pastanedb");
		$db->set_charset("utf8");
		$kategoriSorgu="select kategoriAd from tblKategoriler where kategoriId='2'";
		$sorguSonuc=$db->query($kategoriSorgu);
		$row=$sorguSonuc->fetch_assoc();
		$kategoriAd=$row['kategoriAd'];

		$sorgu="select * from tblUrunler where kategoriId='2'";
		$sonuc=$db->query($sorgu);
		$ks=$sonuc->num_rows;

		?>
		<!--Başlangıç -->
		<div class="container">
		<div class="row  mt-2 align-items-end " >
			<div class="col-5 p-2 border-bottom " style="font-size: 14px;" >
				Anasayfa > Kategoriler > Pasta > <?php echo $kategoriAd ?>
			</div>
			<div class="col offset-1 p-2 border border-light rounded text-center">
				<div class="row">
				<div class="col border-right p-2">
				
				<i class="far fa-clock fa-2x"></i>
				<h6>Her Gün Teslimat</h6>
			</div>
			<div class="col border-right p-2">
				<i class="far fa-smile fa-2x"></i>
				<h6>Müşteri Memnuniyeti</h6>
			</div>
			<div class="col border-right p-2 ">
				<i class="fas fa-user-lock fa-2x"></i>
				<h6>Güvenilir Teslimat</h6>
			</div>
			<div class="col p-2">
				<i class="fas fa-birthday-cake fa-2x" ></i>
				<h6 >Güvenilir Teslimat</h6>
			</div>
				</div>
			</div>
			
		</div>
	</div>
		<!-- İÇERİK -->
	
		<div class="container">
		<div class="row m-5 " >
		<?php for($i=0; $i<$ks; $i++){
			$veriDizi=$sonuc->fetch_assoc();
			$urunResim=$veriDizi['urunResim'];
			$urunAd=$veriDizi['urunAd'];
			$urunFiyat=$veriDizi['urunFiyat'];

		?>
		
			<div class=" col-sm-5 col-md-3 p-4 " >
				<div class="row border rounded text-center">
				
					<div class="col-12 p-0" >
						<img src="../<?php echo $urunResim ?>" class="img-fluid">
					</div>
					<div class="col-12 pt-2 icerik" ><?php echo $urunAd; ?></div>
					<div class="col-12 pb-2 icerik" style="background-color:black; color:white; opacity: 0.7; font-family: century Gothic"><?php echo $urunFiyat; ?> TL </div>
					<div class="col pb-2 icerik" ><button type="button" class="btn btn-block btn-secondary">Sepete Ekle</button></div>
				
			
				</div>
			</div>
		
	<?php } ?>
		</div>
	</div>
	<!--FOOTER -->
<?php  include "footer.php"?>
</button>
</body>
</html>