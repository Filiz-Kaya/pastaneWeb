<?php 
error_reporting(0);//gereksiz hataların sayfada gözükmemesi için yazdım. Hata gözükmesini istemiyorsan bunu sayfanın başına yazabilirsin.
		include "header.php";
		
		$db=new mysqli("localhost","root","","pastanedb");
		$db->set_charset("utf8");
		$musteriId=$_SESSION['musteriId'];
		//$listele="select * from tblUrunler u, tblSepet s where u.urunId=s.urunId and musteriId='$musteriId'";
		$listele="select urunAd, sum(urunFiyat) as total, urunResim, musteriId,  COUNT(*) as adet FROM tblsepet INNER JOIN tblurunler ON tblsepet.urunId = tblurunler.urunId and musteriId='$musteriId' GROUP by musteriId,urunAd";
		$sonuc=$db->query($listele);
		$ks=$sonuc->num_rows;

		?>
		
		<!-- İÇERİK -->
	
		<div class="container ">
		<form action="../admin/islem.php" method="post">
			<?php if ($_GET['islem']=='ok'){?>

							<script type="text/javascript">
								swal("",'Silme işlemi yapıldı',"success");
							</script>

						<?php }
						elseif ($_GET['islem']=='no'){?>

							<script type="text/javascript">
								swal("",'Silme işlemi yapılamadı',"error");
							</script>

						<?php } ?>
		<div class="row m-5 icerik text-center p-1  border" style="border-radius: 15px;opacity:0.9 " >
				<div class="col-12 text-left p-3" style="font-size: 20px; color: deeppink;"> SEPETİM >> </div>
			
				<div class="col" >

					<?php for($i=0; $i<$ks; $i++){
					$veriDizi=$sonuc->fetch_assoc();
					$adet=$veriDizi['adet'];
					$urunAd=$veriDizi['urunAd'];
					$urunResim=$veriDizi['urunResim'];
					$urunAd=$veriDizi['urunAd'];
					$urunFiyat=$veriDizi['total'];

					?>

					
					<div class="row border border-danger align-items-center justify-content-between mt-1 rounded">
						<div class="col-2 text-right">
							<img src="../<?php echo $urunResim ?>" class="img-fluid" style="height: 100px;">
						</div>
						<div class="col-5 pt-2  text-left" ><?php echo $urunAd; ?></div>

						<div class="col-2 pt-2 icerik" >
						<input type="number" name="number" style="border-radius:5px; padding: 4px; width: 80px" value="<?php echo $adet; ?>">								
						</div>

						<div class="col-2 pb-2 " ><?php echo $urunFiyat; ?> TL </div>
						<div class="col-1 pb-2 " >
							<!-- value değerini kullanmak istiyorsan type, submit olmalı. get ile gönderme yapacaksan type, button olmalı! -->

							<button type="submit" name="sepetSil" class="btn btn-sm btn-danger" value="<?php echo $urunAd;?>">Sil</button>
						
						</div>
			
				

				</div>
				<?php } ?>
				<div class="row justify-content-end align-items-center">
					<div class="col-3 text-left p-4">
						<h4 style="color: deeppink;">Toplam Ücret:</h4>
					</div>
					<div class="col-2 p-4">
						<h4 style="color:orange"><?php 
						$fiyatSorgu="SELECT sum(urunFiyat) as toplam,COUNT(*) as Adet FROM tblsepet s, tblurunler u WHERE s.urunId=u.urunId and musteriId='$musteriId' ";
						$gelen=$db->query($fiyatSorgu);
						$row=$gelen->fetch_assoc();
						$toplamFiyat=$row['toplam'];
							echo $toplamFiyat;

						?> TL</h4>
					</div>
					<div class="col-3 py-4 ">
						<button type="button" class="btn btn-block" style="opacity: 0.8;color:white;background: deeppink; font-family: comic sans ms; font-size:17px" onclick="document.location='onayla.php'"> Onayla  >> </button>
					</div>
				</div>

			</div>
		</div>
	</form>

	</div>
<?php include 'footer.php';?>
