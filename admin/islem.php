<?php 

// ÜRÜN KAYIT İŞLEMLERİ
$db=new mysqli("localhost", "root", "", "pastanedb");
$db->set_charset("utf8");
if(isset($_POST['kaydetBtn'])){
    

    $uploads_dir='../resimler/yüklenenResim';
    @$tmp_name= $_FILES['urunResim']["tmp_name"];
    @$name= $_FILES['urunResim']["name"];

    $benzersizSayi1=rand(20000,32000);
    $benzersizSayi2=rand(20000,32000);
    $benzersizSayi3=rand(20000,32000);
    $benzersizSayi4=rand(20000,32000);
    $benzersizAd=$benzersizSayi4.$benzersizSayi3.$benzersizSayi2.$benzersizSayi1;
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizAd.$name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizAd$name");


        $db=new mysqli("localhost", "root", "", "pastanedb");
        $db->set_charset("utf8");

		$sorgu="insert into tblurunler(urunAd, urunAciklama, urunFiyat, urunResim, kategoriId) values('".$_POST['urunAd']."','".$_POST['aciklama']."','".$_POST['fiyat']."','".$refimgyol."','".$_POST['mySelect']."')";
		$sonuc=$db->query($sorgu);
		// $ks=$sonuc->num_rows;
		// echo $ks;
		if($sonuc){
			
            header("Location: yeniKayit.php?durum=ok");
           

		}
		else{
			header("Location: yeniKayit.php?durum=no");
			
		}
    
}
//SİL İŞLEMLERİ
if(isset($_POST['silinecekId_'])){


	$silinecek=$_POST['silinecekId_'];
	$db=new mysqli("localhost", "root", "", "pastanedb");
	$db->set_charset("utf8");
	
	$sorgu="delete from tblUrunler where urunId='$silinecek'";
	$sonuc=$db->query($sorgu);
	if($sonuc){
		echo 'sildim';
	
	}
	else{
	echo "Silme işlemi yapılamadı";
	}

}

//güncelle2
if(isset($_POST['guncelleBtn'])){

    $urun_id=$_POST['urun_id'];
    echo $urun_id;
   //echo $urun_id;$_GET['urun_id']; 
	
    $uploads_dir='../resimler/yüklenenResim';
    @$tmp_name= $_FILES['urunResim']["tmp_name"];
    @$name= $_FILES['urunResim']["name"];

    $benzersizSayi1=rand(20000,32000);
    $benzersizSayi2=rand(20000,32000);
    $benzersizSayi3=rand(20000,32000);
    $benzersizSayi4=rand(20000,32000);
    $benzersizAd=$benzersizSayi4.$benzersizSayi3.$benzersizSayi2.$benzersizSayi1;
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizAd.$name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizAd$name");


        $db=new mysqli("localhost", "root", "", "pastanedb");
        $db->set_charset("utf8");

		$sorgu="update tblUrunler set urunAd='".$_POST['urunAd']."', urunAciklama='".$_POST['aciklama']."', urunFiyat='".$_POST['fiyat']."', urunResim='".$refimgyol."', kategoriId='".$_POST['mySelect']."' where urunId='$urun_id'";
		$sonuc=$db->query($sorgu);
		// $ks=$sonuc->num_rows;
		// echo $ks;
		if($sonuc){
			
           header("Location:guncelle.php?durum=ok&urun_id=$urun_id");
           

		}
		else{
			 header("Location:guncelle.php?durum=no&urun_id=$urun_id");
		}
    
}

if(isset($_POST['kategoriKaydet'])){
	$ad=$_POST['kategoriAd_'];
	
	$sorgu="insert into tblkategoriler(kategoriAd) values('$ad')";
	$sonuc=$db->query($sorgu);
	if($sonuc){
		
		echo "Kayıt işlemi yapıldı";

	}
	else{
		echo "Kayıt Yapılamadı:(";
	}
}
//KATEGORİ GÜNCELLEME İŞLEMLERİ
if(isset($_POST['kGuncelleBtn'])){

    $kategori_id=$_POST['id'];
		$sorgu="update tblKategoriler set kategoriAd='".$_POST['kategoriAd']."' where kategoriId='$kategori_id'";
		$sonuc=$db->query($sorgu);
		
		if($sonuc){
			
           header("Location:kategoriGuncelle.php?id=$kategori_id&durum=ok");
           

		}
		else{
			 header("Location:kategoriGuncelle.php?id=$kategori_id&durum=no");
		}   
}
//MÜŞTERİ KAYIT İŞLEMİ
if(isset($_POST['musKaydet'])){
    


		$sorgu="insert into tblMusteriler(musteriAdSoyad, musteriMail, musteriSifre, musteriTel, musteriAdres, musteriKart) values('".$_POST['musteriAd']."','".$_POST['mail']."','".$_POST['sifre']."','".$_POST['telefon']."','".$_POST['adres']."','".$_POST['kartNo']."')";
		$sonuc=$db->query($sorgu);
		if($sonuc){
			
            header("Location: musteriEkle.php?durum=ok");
           

		}
		else{
			
			header("Location: musteriEkle.php?durum=no");
			
		}
    
}
//MÜŞTERİ GÜNCELLEME İŞLEMİ
if(isset($_POST['musGuncelle'])){

    $musteri_id=$_POST['id'];
		$sorgu="update tblMusteriler set musteriAdSoyad='".$_POST['musteriAd']."', musteriMail='".$_POST['mail']."', musteriSifre='".$_POST['sifre']."', musteriTel='".$_POST['telefon']."', musteriAdres='".$_POST['adres']."', musteriKart='".$_POST['kartNo']."' where musteriId='$musteri_id'";
		$sonuc=$db->query($sorgu);
		
		if($sonuc){
			
           header("Location:musteriGuncelle.php?id=$musteri_id&durum=ok");
           

		}
		else{
			 header("Location:musteriGuncelle.php?id=$musteri_id&durum=no");
		}   
}
//MÜŞTERİ SİLME İŞLEMİ
if(isset($_POST['silinenId_'])){


	$silinecek=$_POST['silinenId_'];
	$db=new mysqli("localhost", "root", "", "pastanedb");
	$db->set_charset("utf8");
	
	$sorgu="delete from tblMusteriler where musteriId='$silinecek'";
	$sonuc=$db->query($sorgu);
	if($sonuc){
		echo 'sildim';
	
	}
	else{
	echo "Silme işlemi yapılamadı";
	}

}

//GİRİŞ İŞLEMLERİ
if(isset($_POST['loggin'])){
	session_start();
	$kmail=$_POST['kmail'];
	$sifre=$_POST['sifre'];
	if($kmail && $sifre){
		$sorgu="select * from tblMusteriler where musteriMail='$kmail' and musteriSifre='$sifre' ";
		$sonuc=$db->query($sorgu);
		$kayitSayisi=$sonuc->num_rows;

		$sorgu_2="select * from tbladmin where adSoyad='$kmail' and sifre='$sifre' ";
		$sonuc_2=$db->query($sorgu_2);
		$ks=$sonuc_2->num_rows;

			
		if($kayitSayisi>0){
				while($row=$sonuc->fetch_assoc()){
				$_SESSION["musteriId"]=$row["musteriId"];
				$_SESSION["musteriAd"]=$row["musteriAdSoyad"];
				/*$yetkilendirme=$row["Yetkilendirme"];
				echo $yetkilendirme;*/
				//$mail=$row["musteriMail"];
				header('Location:../kategoriler.php');
				/*if($kmail=="admin@gmail.com" && $yetkilendirme=="1"){
					header('Location:index.php?loggin=ok');
					echo 'yönlendirdi.';
				}
				else{

					
				}*/
					

				}
			}
		else if($ks>0){
			while($row=$sonuc_2->fetch_assoc()){
			$_SESSION["adSoyad"]=$row["adSoyad"];
			header('Location:index.php?loggin=ok');
			}
			
		}
		else{
				
				header('location:../girisYap.php?loggin=no');
			}
	}

	else{
	 	header('location:../girisYap.php?loggin=no');
	
	}
}
//ÜYE KAYIT İŞLEMLERİ
if(isset($_POST["uyeKayit"])){
	$ad=$_POST['ad'].$_POST['soyad'];
	$email=$_POST['email'];
	$sifre=$_POST['sifre'];


	$sorgu="select * from tblMusteriler where musteriMail='$email' ";
	$deger=$db->query($sorgu);
	$ks=$deger->num_rows;
	if($ks>0){
		header("Location:../uyeOl.php?kayit=no");
		
	}
	else{
		$sorgu="insert into tblMusteriler(musteriAdSoyad, musteriMail, musteriSifre) values('$ad','$email','$sifre') ";
		$sonuc=$db->query($sorgu);
			if($sonuc){
				header("Location:../uyeOl.php?kayit=ok");
			}
			else{
				header("Location:../uyeOl.php?kayit=noo");
			}
		}

	
}
//SEPET İŞLEMLERİ 
if(isset($_GET['sepet'])){
session_start();	
$urunId=$_GET['id'];
$musteriId=$_SESSION['musteriId'];
	$sorgu="insert into tblSepet(urunId,musteriId) values('$urunId','$musteriId')";
	$sonuc=$db->query($sorgu);
	if($sonuc){

		header("location:../urunler/gunlukPasta.php?ekle=ok&sayfa=1");

	}
	else{
		header('location:../urunler/sepetim.php?ekle=no&islem');
	}
}
//SEPET SİL İŞLEMLERİ 
if(isset($_POST["sepetSil"])){
	$ad=$_POST['sepetSil'];
	$sonuc1=$db->query("select * from tblUrunler where urunAd='$ad'");
	//$ks=$sonuc1->num_rows;
	$kayitDizi=$sonuc1->fetch_assoc();
	$id=$kayitDizi["urunId"];
	
	session_start();
	$musteriId=$_SESSION['musteriId'];
	//echo 'sil işlemleri bu sayfada yapılacak'.'--'. $id ;
	$sorgu="delete from tblSepet where musteriId='$musteriId' and urunId='$id'";
	$sonuc=$db->query($sorgu);

	if($sonuc){
		header('location:../urunler/sepetim.php?islem=ok');
	}
	else{
		header('location:../urunler/sepetim.php?islem=no');
	}
	

}
?>
