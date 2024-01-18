<?php 
	include "header.php"; 
/*sorgu ile müşteri sayısını çekmem lazım sonra
müşteri sayfada kaç tane gözükecekse o değeri tutmam lazım. Sonrada müşteri sayısını bölüp bu değeri elde edeceğim bir sayıyı ayarlamam lazım */
	$db=new mysqli("localhost", "root", "", "pastanedb");
	$db->set_charset("utf8");
	$ksorgu="SELECT * from tblMusteriler";
	$ksonuc=$db->query($ksorgu);
	$ksayi=$ksonuc->num_rows;

	$kac=6;
	$sayfa=$_GET['sayfa'];
	if ($sayfa>=1){//sayfanın eksilere düştüğünde hata almamamızı sağlamak için. 
		$sayfa1=($sayfa*$kac)-$kac;//sayfaların kaçıncı üründen itibaren başlayacağını belirlemek için. 
	}
	else{
		$sayfa=1;//sayfanın 1 den küçük olduğu durumlarda ilk sayfaya dönmesi için yapılan atama işlemi
		$sayfa1=0;//ilk üründen başlamasını sağlamak için yapılan atama.Geri butonunda yazdığım sorgu sayesinde geri tuşuna basıldığında herhangi bir sorun olmuyor ama üst kısımda yer alan adres alanına ?sayfa=-1 gibi bir değer yazıldığında hata alıyorum. O yüzden $sayfa1 değerini de yazmam gerekiyor çünkü altta yer alan sorguda limit ile belirttiğim değer $sayfa1 den geliyor.Eksili değerler sorguda hata almama neden oluyor. 
	}

$sayfaSayisi=ceil($ksayi/$kac);

?>
<script type="text/javascript">
	$(document).ready(function(){

		$(".silBtn").click(function(){
			var silinecekId=$(this).attr('silId');//attr olarak id ye atanan değeri değil id'nin kendisini aldık. Bu güzel bi özellik.Unutma!
			var silinecekTablo=$(this).parents('tr');
		
			
			$.ajax({
				url: 'islem.php',
				type: 'post',
				data:{silinenId_:silinecekId},
				success:function(gelenCevap){
					
					
					if(gelenCevap=="sildim"){
						alert("Silme işlemi yapıldı");
						silinecekTablo.hide(400);//gizleme işlemi dahi olsa çalışıyor sorun yok(silinecekTablo.remove();)

					}
					else{
						alert("Ürün silme işlemi yapılamadı");
					}
				}

			});
		});
		
	});
	
</script>
	<div class="col-10 mb-5 offset-2 " id="boy">
		<div class="row mt-5">
			<div class="col text-right">
				<button type="button"  style="width:150px" class="btn btn-success btn-sm" onclick="document.location='musteriEkle.php?durum'">Yeni Kayıt</button>
			</div>
		</div>
			<div class="row mt-2">
				<div class="col">
					<table class="table" style="font-size:12px;">
								<thead>
									<tr class="tblhov">
										<th>#</th>
										<th>Ad-Soyad</th>
										<th>Mail</th>
										<!--<th>Şifre</th>-->
										<th>Telefon</th>
										<th>Adres</th>
										<th>Kart No</th>
										<th></th>
										<th></th>

									</tr>
								</thead>
								<?php 
								
									$sorgu="select * from tblMusteriler order by musteriId limit $sayfa1, $kac";
									$sonuc=$db->query($sorgu);
									$ks=$sonuc->num_rows;
									for($i=0;$i<$ks;$i++){
										$kayitDizi=$sonuc->fetch_assoc();
										
										$musteriId=$kayitDizi["musteriId"];
										$AdSoyad=$kayitDizi["musteriAdSoyad"];
										$mail=$kayitDizi["musteriMail"];
										/*$sifre=$kayitDizi["musteriSifre"];*/
										$tel=$kayitDizi["musteriTel"];
										$adres=$kayitDizi["musteriAdres"];
										$kart=$kayitDizi["musteriKart"];
								echo "<tbody>
									<tr class='tblhov'>";
										echo "<td>$musteriId</td>";
										echo "<td>$AdSoyad</td>";
										echo "<td>$mail</td>";
										/*echo "<td>$sifre</td>";*/
										echo "<td>$tel</td>";
										echo "<td>$adres</td>";
										echo "<td>$kart</td>";
									?><td><button type='button' class="btn btn-sm btn-danger silBtn"  silId="<?php echo $musteriId?>">Sil</button></td>
										<td><button type='button' class="btn btn-sm btn-warning" onclick='document.location="musteriGuncelle.php?id=<?php echo $musteriId?>&durum"'>Güncelle</button></td>
							<?php	echo"	</tr>
								</tbody>";
								 }?>

							</table>
							<nav aria-label="Page navigation example">
					  <ul class="pagination">
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
					    	<a class="page-link" href="?sayfa=<?php echo $i; ?>">

					    		<?php echo $i ?>
					    	
					    	</a>
					    </li>
					    <?php $i++; } ?>

					    <li class="page-item">
					      <a class="page-link" href="?sayfa=<?php 
					      
					      echo $sayfa=$sayfa+1;
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
			</div>
	</div>
<?php include "footer.php"; ?>