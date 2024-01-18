<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Paneli</title>
	
	<link rel="stylesheet" type="text/css" href="../css_/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	<script type='text/javascript' src='../js/jquery-3.3.1.min.js'></script>


	<script  type="text/javascript" src="../cdnjs/sweetalert.min.js"></script>

	
	<link rel="stylesheet"  href="style.css">

	
<style type="text/css">	
.font{
	font-family: century gothic;
	font-size: 14px;
}
	.buton{
	    background-color:pink;
	    opacity: 0.8;
	    border: none;
	    padding: 5px 35px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-family: century gothic;
	    font-size: 14px;
	    color: black;
	  transition: 0.3s;
	}
.buton:hover {opacity: 0.9}
body{
			
			background-image:url("../resimler/macaroon.jpeg");
			background-position:center;
			background-size: 1540px 900px ;
			background-repeat: norepeat;
			background-origin: borderbox;
			background-attachment: fixed;

		}
/*.tablehov:hover{ opacity: 0.7; background-color: black; color: white;} >> Farklı bi görünüm oluşturuyor.*/
 .table{
	font-size:14px;
	background-color: black; 
	color:white;
	opacity:0.8; 
}
.tblhov:hover{ opacity: 0.8; background-color: #ffe8f9; color: black;}
	
	
</style>
</head>
<body>
	<div class="container-fluid" >		
		<div class="row ">
			<!--SİDEBAR-->
		
			<div class="col">
			
				<div class="sidebar">
				

				<header>Elen Pastanesi</header>
				<p style="text-align:center; font-size:13px;">
					Kullanıcı Bilgisi: <br><?php session_start(); echo $_SESSION["adSoyad"]; ?>
				</p>
				<ul>
					<li ><a href="index.php" ><i class="fas fa-home"></i>Anasayfa</a></li>
					<li><a href="kategoriler.php?sayfa=1"><i class="fas fa-align-justify"></i> Kategoriler</a></li>
					<li><a href="urunler.php?sayfa=1"><i class="fas fa-birthday-cake"></i>Ürünler</a></li>
					<li><a href="musteriler.php?sayfa=1"><i class="fas fa-users"></i>Müşteriler</a></li>
					<li><a href="siparisler.php"><i class="fas fa-gift"></i>Siparişler</a></li>
					<li><a href="#"><i class="far fa-calendar-alt"></i>Takvim</a></li>
					<li><a href="#"><i class="far fa-question-circle"></i>Yardım</a></li>
				</ul>
				</div>
			</div>
			<!-- HEADER -->
			<div class="col-10">
				<div class="row align-items-center justify-content-end" style="background-color:black; color: white; border-bottom-style: solid; border-color: pink;border-width: 2px;opacity: 0.8;">
				<div class="col pl-5">
					<img src="../resimler/elen-icon1.png" class="img-fluid ">
					<span style="font-family:segoe script ;font-size: 13px;">Elen Pastane</span>
				</div>
				<div class="col text-right p-1 pr-3">
					
					<button type="button"  class="buton rounded" onclick="document.location='exit.php'">Çıkış Yap</button>
					
				</div>
			</div>
			</div>