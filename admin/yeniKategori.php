<?php include "header.php"; 
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
	$sorgu="select * from tblKategoriler ";
	$sonuc=$db->query($sorgu);
	$ks=$sonuc->num_rows;
	?>
 <script type="text/javascript">
	$(document).ready(function(){
		$("#kategoriKaydet").click(function() {
			kategoriAd=$("#kategoriAd").val();
			kaydet=$("#kategoriKaydet").val();// işlem.php de if ile sorgulama yaptığım için kategoriKaydet idsine sahip butonu da post metodu ile göndermem gerekiyor. 
			
		$.ajax({
			url:'islem.php',
			type:'post',
			data: {kategoriAd_:kategoriAd, kategoriKaydet:kaydet},
			success:function(cevap) {
				alert(cevap);
				
			}
		});


		});

			
		
});
		
	
</script>
	
	<div class="col-10 mb-5 offset-2 pl-5 mt-4 font" id="boy">
			<div class="alert alert-primary" role="alert"> Kategori kaydını bu sayfada yapabilirsiniz.</div>
			<div class="row mt-4   ">
				<div class="col-2 align-self-end"> <label>Kategori Adı: </label></div>
				<div class="col-6"> <input type="text" autocomplete="off" required=""  id="kategoriAd"  class="form-control font "placeholder="Kategori Adını Giriniz."></div>
			</div>
	
		<div class="row mt-3">
			<div class="col-8 text-right">
				<input type="submit"  id="kategoriKaydet" class="btn btn-success btn-sm" value="Kaydet"></a>
			</div>
		</div>	
		</form>	
	</div>
	   
<?php include "footer.php"; ?>