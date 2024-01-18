<?php include "header.php"; 
$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	$sorgu="select * from tblUrunler u, tblKategoriler k where u.kategoriId=k.kategoriId ";
	$sonuc=$db->query($sorgu);
	$ks=$sonuc->num_rows;
//get değerini alırken sıkıntı yaşıyordum. Geçici çözüm olarak header kısmında yaptığım yönlendirmede(href) ?sayfa=1 değerini ekledim.
$kac=6;//sayfada bulanacak ürün sayısı için

$sayfa=$_GET['sayfa'];// get ile gelecek değerin atanması. 

if ($sayfa>=1){//sayfanın eksilere düştüğünde hata almamamızı sağlamak için. 

	$sayfa1=($sayfa*$kac)-$kac;//sayfaların kaçıncı üründen itibaren başlayacağını belirlemek için. 
}
else{
	$sayfa=1;//sayfanın 1 den küçük olduğu durumlarda ilk sayfaya dönmesi için yapılan atama işlemi
	$sayfa1=0;//ilk üründen başlamasını sağlamak için yapılan atama.Geri butonunda yazdığım sorgu sayesinde geri tuşuna basıldığında herhangi bir sorun olmuyor ama üst kısımda yer alan adres alanına ?sayfa=-1 gibi bir değer yazıldığında hata alıyorum. O yüzden $sayfa1 değerini de yazmam gerekiyor çünkü altta yer alan sorguda limit ile belirttiğim değer $sayfa1 den geliyor.Eksili değerler sorguda hata almama neden oluyor. 
}

$sayfaSayisi=ceil($ks/$kac);//kaç sayfanın bulunduğunu görebilmek için

?>

<script type="text/javascript">
	$(document).ready(function(){

		$(".silBtn").click(function(){
			var silinecekId=$(this).attr('silId');//attr olarak id ye atanan değeri değil id'nin kendisini aldık. Bu güzel bi özellik.Unutma!
			var silinecekTablo=$(this).parents('tr');
		
			
			$.ajax({
				url: 'islem.php',
				type: 'post',
				data:{silinecekId_:silinecekId},
				success:function(gelenCevap){
					
					
					if(gelenCevap=="sildim"){
						alert("Silme işlemi yapıldı");
						silinecekTablo.hide(400);//gizleme işlemi dahi olsa çalışıyor sorun yok(silinecekTablo.remove();)

					}
					else{
						alert("Ürün silme işlemi yapılamadı:(");
					}
				}

			});
		});
		
	});
	
</script>
	<div class="col-10 mb-5 offset-2 " id="boy">
		<div class="row mt-5">
			<div class="col text-right">
				<button type="button" class="btn btn-success btn-sm" style="width:150px" onclick="document.location='yeniKayit.php?durum'">Yeni Kayıt</button>
			</div>
		</div>
			<div class="row mt-1">
				<div class="col">
						<table class="table" >
								<thead>
									<tr class="tblhov">
										<th>#</th>
										<th>Ürün Adı</th>
										<th>Ürün Fiyat</th>
										<th>Ürün Resim</th>
										<th>Kategori </th>
										<th> </th>
										<th> </th>

										

									</tr>
								</thead>
								<?php 
									
									$sorgu="select * from tblUrunler u, tblKategoriler k where u.kategoriId=k.kategoriId order by urunId limit $sayfa1, $kac";
									$sonuc=$db->query($sorgu);
									$ks=$sonuc->num_rows;

									for($i=0;$i<$ks;$i++){
										$kayitDizi=$sonuc->fetch_assoc();
										
										$urun_id=$kayitDizi["urunId"];
										$urunAd=$kayitDizi["urunAd"];
										$fiyat=$kayitDizi["urunFiyat"];
										$resim=$kayitDizi["urunResim"];
										$kategori=$kayitDizi["kategoriAd"]; ?>
								<tbody>
									<tr class="tblhov">
										<td><?php echo $urun_id ?></td>
										<td> <?php echo $urunAd ?></td>
										<td><?php echo $fiyat ?></td>
										<td><?php echo $resim ?></td>
										<td><?php echo $kategori ?></td>
										<td>
										<input   type='button'  silId='<?php echo $urun_id ?>' value='Sil' class='btn btn-danger btn-sm silBtn' style="width:60px;">
										</td>
										
										<td><a href="guncelle.php?urun_id=<?php echo $kayitDizi["urunId"]; ?>&durum"><button type='button' class='btn btn-success btn-sm guncelleBtn' style="color:black"> &nbspGüncelle</button></a>
										</td>
									</tr>
								</tbody>
								<?php } ?>

							</table>
				</div>
				
			</div>
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
<?php include "footer.php"; ?>