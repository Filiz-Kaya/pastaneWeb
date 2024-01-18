<?php include "header.php"; 

	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	$sorgu="select * from tblKategoriler";
	$sonuc=$db->query($sorgu);
	$ks=$sonuc->num_rows;

$kac=4;
$sayfa=$_GET['sayfa'];
if($sayfa>=1){
	$baslangıc=($sayfa*$kac)-$kac;
}
else{
	$sayfa=1;
	$baslangıc=0;
}

$sayfaSayisi=ceil($ks/$kac);

?>

	<div class="col-10 mb-5 offset-2 " id="boy">
		<div class="row mt-5">
			<div class="col text-right">
				<a href="yeniKategori.php"><button type="button" class="btn btn-success btn-sm" style="width:150px">Yeni Kayıt</button></a>
			</div>
		</div>
			<div class="row mt-2">
				<div class="col">
						<table class="table " style="font-size:15px;">
								<thead>
									<tr class="tblhov">
										<th style="width:100px;">#</th>
										<th style="width:300px;">Kategori Adı</th>
										<th style="width:800px;"></th>
										<th></th>

								
									</tr>
								</thead>
								<?php 
									$db=new mysqli("localhost","root","","pastanedb");
									$db->set_charset("utf8");
									$sorgu="select * from tblKategoriler limit $baslangıc,$kac";
									$sonuc=$db->query($sorgu);
									$ks=$sonuc->num_rows;
									for($i=0;$i<$ks;$i++){
										$kayitDizi=$sonuc->fetch_assoc();
										
										$kategoriId=$kayitDizi["kategoriId"];
										$kategoriAd=$kayitDizi["kategoriAd"];?>
										
								<tbody>
									<tr class='tblhov'>
										<td style='width:100px;' ><?php echo $kategoriId ?></td>
										<td style='width:300px;'><?php echo $kategoriAd ?></td>
										<td style='width:700px;'></td>	
										<td><button  type='button' class='btn btn-success btn-sm kGuncelleBtn' onclick="document.location='kategoriGuncelle.php?id=<?php echo $kategoriId;?>&durum'">Güncelle</button></a></td>
									
									</tr>
								</tbody>
								<?php }?>

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
					      echo $sayfa=$sayfa+1; //burada aldığım hatanın nedenini anlamadım daha sonra yap. Şuan için çok bi problem yok. Ayrıca if sorgusu
					      //ile olması gereken son sayfadan daha da ileri gidilmesini engelle. Hata aldığım için şuan yapmıyorum.. 
					  	?>" aria-label="Next"> 
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
				</nav>
	</div>
<?php include "footer.php"; ?>