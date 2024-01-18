	<?php
		error_reporting(0);
		include "header.php";
		$db=new mysqli("localhost","root","","pastanedb");
		$db->set_charset("utf8");
		$kategoriSorgu="select kategoriAd from tblKategoriler where kategoriId='1'";
		$sorguSonuc=$db->query($kategoriSorgu);
		$row=$sorguSonuc->fetch_assoc();
		$kategoriAd=$row['kategoriAd'];

		$sorgu="select * from tblUrunler where kategoriId='1'";
		$sonuc=$db->query($sorgu);
		$ks=$sonuc->num_rows;

		$kac=12;//sayfada bulanacak ürün sayısı için

		$sayfa=$_GET['sayfa'];
		if ($sayfa>=1){//sayfanın eksilere düştüğünde hata almamamızı sağlamak için. 

			$sayfa1=($sayfa*$kac)-$kac;//sayfaların kaçıncı üründen itibaren başlayacağını belirlemek için. 
		}
		else{
			$sayfa=1;//sayfanın 1 den küçük olduğu durumlarda ilk sayfaya dönmesi için yapılan atama işlemi
			$sayfa1=0;//ilk üründen başlamasını sağlamak için yapılan atama.Geri butonunda yazdığım sorgu sayesinde geri tuşuna basıldığında herhangi bir sorun olmuyor ama üst kısımda yer alan adres alanına ?sayfa=-1 gibi bir değer yazıldığında hata alıyorum. O yüzden $sayfa1 değerini de yazmam gerekiyor çünkü altta yer alan sorguda limit ile belirttiğim değer $sayfa1 den geliyor.Eksili değerler sorguda hata almama neden oluyor. 
			}

		$sayfaSayisi=ceil($ks/$kac);//kaç sayfanın bulunduğunu görebilmek için


		?>
		<!--Başlangıç -->
		<div class="container">
		<div class="row  mt-2 align-items-end " >
			<div class="col-5 p-2 border-bottom pl-3" style="font-size: 14px;" >
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

		<?php 
			$sorgu_2="select * from tblUrunler where kategoriId='1' order by urunId limit $sayfa1, $kac";
			$sonuc_2=$db->query($sorgu_2);
			$ksayi=$sonuc_2->num_rows;
			for($i=0; $i<$ksayi; $i++){
			$veriDizi=$sonuc->fetch_assoc();
			$urunResim=$veriDizi['urunResim'];
			$urunAd=$veriDizi['urunAd'];
			$urunFiyat=$veriDizi['urunFiyat'];
			$urunId=$veriDizi['urunId'];

		?>
		
			<div class=" col-sm-5 col-md-3 p-4 " >
				<div class="row border rounded text-center">
				
					<div class="col-12 p-0" >
						<img src="../<?php echo $urunResim ?>" class="img-fluid">
					</div>
					<div class="col-12 pt-2 icerik" ><?php echo $urunAd; ?></div>

					<div class="col-12 pb-2 icerik" style="background-color:black; color:white; opacity: 0.7; font-family: century Gothic"><?php echo $urunFiyat; ?> TL </div>
					
					<div class="col pb-2 icerik" >	
				<?php if(!isset($_SESSION["musteriAd"])){ ?>
					
							<button type="button" class="btn btn-block btn-secondary" onclick="buton()">
							Sepete Ekle
							</button>	
							
						<?php }
						else{?>	
							<button type="button" class="btn btn-block btn-secondary"  onclick="document.location='../admin/islem.php?sepet&id=<?php echo $urunId;?>&islem'">
							Sepete Ekle

							</button>
							<?php
								if($_GET['ekle']=='ok'){?>
								<script>swal("Sepete Eklediniz!",'',"success");</script>
							<?php
								}
							} ?>
					</div>
					
				
			
				</div>
			</div>
		
	<?php } ?>
		</div>
		<nav class="m-5 pl-3">
					  <ul class="pagination ">
					    <li class="page-item">
					      <a class="page-link" href="?sayfa=<?php 
					      if($sayfa>1){// $sayfa değişkeninin eksilere düşmesini engellemek için. 
					      	echo $sayfa=$sayfa-1;
					      }	
					      else {echo $sayfa=1;}//1 den küçük olduğu durumda yapılması gereken atama.  

					       ?>" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <?php 
					    $i=1; 
					    while($i<=$sayfaSayisi){
					    ?>

					    <li class="<?php if($i==$sayfa){echo "active";}  ?>">
					    	<a class="page-link" href="?sayfa=<?php echo $i; ?> "><?php echo $i ?></a>
					    </li>
					    <?php $i++; } ?>

					    <li class="page-item">
					      <a class="page-link" href="?sayfa=<?php 
					      if($sayfa>=1){
					      echo $sayfa=$sayfa+1;}
					      
					       //döngüye ihtiyacım var mı? Her tıklayışta artış gerek.
					      //burada aldığım hatanın nedenini anlamadım daha sonra yap. Şuan için çok bi problem yok. Ayrıca if sorgusu
					      //ile olması gereken son sayfadan daha da ileri gidilmesini engelle. Hata aldığım için şuan yapmıyorum.. 
					  	?>" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
				</nav>
		
	</div>
	<script type="text/javascript">
		function buton(){
			swal("Giriş Yapmadınız!",'Ürünü sepete eklemek için ilk önce giriş yapmalısınız.!',"warning");
		}

		
		
		
								
	</script>
	<?php include "footer.php"; ?>