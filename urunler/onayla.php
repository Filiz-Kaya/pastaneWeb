<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css_/bootstrap.min.css">
	<title>Elen Pastanesi</title>
</head>
<style type="text/css">
	body{
			
			background-image:url("../resimler/macaroon.jpeg");
			background-position:center;
			background-size: 1540px 900px ;
			background-repeat: norepeat;
			background-origin: borderbox;
			background-attachment: fixed;
			font-family:Century Gothic ;
			font-size: 16px;
		}
	.renk{
		background-color: black;
		color: orange;
		font-family: century gothic;
		opacity: 0.8;
	}

</style>
<body>
 <div class="container mt-4"  >
 	<div class="row">
 		<div class="col-md-2 ">
				<img src="../resimler/elen-icon1.png">
				<a href="../index.php" style="font-family:segoe script ;font-size: 13px; color: deeppink; text-decoration: none;">Elen Pastane</a>
		</div>
 	</div>
 	<div class="row justify-content-center">
 		
 		<div class="col-6 rounded text-center border border-warning p-2 renk" ><h4>ADRES BİLGİLERİ</h4></div>
 		<div class="w-100"></div>
 		<div class="col-6 mt-4">
 			<div class="row">
			 		<div class="col-6  mt-2">
			 			<div class="row">
			 				<div class="col-12">
			 					<label>Ad: </label>
			 				</div>
			 				<div class="col-12">
			 					<input type="text" name="" class="form-control" required="">
			 				</div>
			 			</div>
			 		</div>
			 		<div class="col-6  mt-2">
			 			<div class="row">
			 				<div class="col-12">
			 					<label>Soyad: </label>
			 				</div>
			 				<div class="col-12">
			 					<input type="text" name="" class="form-control" required="">
			 				</div>
			 			</div>
			 		</div>
			 		<div class="col-6  mt-2">
			 			<div class="row">
			 				<div class="col-12">
			 					<label>Telefon: </label>
			 				</div>
			 				<div class="col-12">
			 					<input type="text" name="" class="form-control" required="">
			 				</div>
			 			</div>
			 		</div>
			 		<div class="col-6  mt-2">
			 			<div class="row">
			 				<div class="col-12">
			 					<label>İl: </label>
			 				</div>
			 				<div class="col-12">
			 					<input type="text" name="" class="form-control">
			 				</div>
			 			</div>
			 		</div>
			 		
			 		
			 		<div class="col-12  my-2">
			 			<div class="row">
			 				<div class="col-12">
			 					<label>Adres: </label>
			 				</div>
			 				<div class="col-12">
			 					<input type="text-area" name="" class="form-control" required="">
			 				</div>
			 			</div>
			 		</div>
			 	</div>


 			</div>
 		</div>
 		
 	<div class="row mt-2 justify-content-center">
 		<div class="col-6 rounded text-center border border-warning renk p-2"><h4>KART BİLGİLERİ</h4></div>
 		<div class="w-100"></div>
 		<div class="col">
 			<div class="row justify-content-center">
 				
				<div class="col-6  mt-4">
		 			<div class="row ">
		 				<div class="col-12">
		 					<label>Kart No: </label>
		 				</div>
		 				<div class="col-12">
		 					<input type="text" name="" class="form-control" required="">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="w-100"></div>
		 		<div class="col-3 mt-2">
		 			<div class="row">
		 				<div class="col-12">
		 					<label>Son Kullanma Tarihi: </label>
		 				</div>
		 				<div class="col-12">
		 					<input type="date" name="" class="form-control" required="">
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-3  mt-2">
		 			<div class="row">
		 				<div class="col-11">
		 					<label>CVV: </label>
		 				</div>
		 				<div class="col-12">
		 					<input type="text-area" name="" class="form-control" required="">
		 				</div>
		 			</div>
		 		</div>

 			</div>

 		</div>
 		
 	</div>
 	<div class="row mt-3">
 		<div class="col-6 offset-3">
 			<button type="button" class="btn btn-block btn-success">Ödeme Yap</button>
 		</div>
 	</div>
 </div>
</body>
</html>