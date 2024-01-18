<?php include "header.php"; 
?>
	<div class="col-10 mb-5 offset-2 " id="boy">
		
			<div class="row mt-4" >
				<div class="col" style="margin-top: 60px;">
					<table class="table" style="font-size:12px">
						<thead>
								<tr class="tblhov">
									<th>Sipariş ID</th>
									<th>Müşteri ID</th>
									<th>Müşteri Adı</th>
									<th>Ürün Adı</th>
									<th>Adet</th>
									<th>Toplam Tutar</th>

								</tr>
						</thead>				
						<?php 
						$db=new mysqli("localhost","root","","pastanedb");
									$db->set_charset("utf8");
									$sorgu="select * from tblMusteriler m, tblSiparisler s, tblSiparisDetay sd, tblUrunler u where m.musteriId=s.musteriId and s.siparisId=sd.siparisId and sd.urunId=u.urunId";
									$sonuc=$db->query($sorgu);
									$ks=$sonuc->num_rows;
									for($i=0;$i<$ks;$i++){
										$kayitDizi=$sonuc->fetch_assoc();
										
										$siparisId=$kayitDizi["siparisId"];
										$musteriId=$kayitDizi["musteriId"];
										$musteriAd=$kayitDizi["musteriAdSoyad"];
										$urunAd=$kayitDizi["urunAd"];
										$adet=$kayitDizi["Adet"];
										$tutar=$kayitDizi["toplamTutar"];
								echo "<tbody>
									<tr class='tblhov'>";
										echo "<td>$siparisId</td>";
										echo "<td>$musteriId</td>";
										echo "<td>$musteriAd</td>";
										echo "<td>$urunAd</td>";
										echo "<td>$adet</td>";
										echo "<td>$tutar</td>";
								echo"	</tr>
								</tbody>";
								}?>

							</table>
				</div>
			</div>
	</div>
<?php include "footer.php"; ?>