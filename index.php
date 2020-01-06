<!doctype html>

<?php
include_once 'config.php';
unset($_SESSION['keluhan']);
unset($_SESSION['jumlah_keluhan']);
unset($_SESSION['n_atas1']);
unset($_SESSION['n_atas2']);
unset($_SESSION['n_atas3']);
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<title>SISPAK</title>
	<link rel="icon" href="favicon.png" type="image/png">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">

</head>

<body>

	<!--Header_section-->
	<?php include 'header.php'; ?>
	<br><br><br>
	<!--Header_section-->

	<!--Hero_Section-->
	<div class="container">
		<div class="hero_section">
			<div class="row">
				<div class="col-lg-5 col-sm-7 text-justify">
					<h2>Selamat datang</h2>
					<p>Aplikasi ini merupakan sistem pakar untuk mendiagnosa penyakit asma berbasis web, bertujuan untuk memberikan informasi kepada masyarakat luas tentang apa itu asma serta langkah apa saja yang harus dilakukan jika memang ada yang mengidap penyakit tersebut.</p>
					<a href="#service">Read more</a>
				</div>
			</div>
		</div>
	</div>
	</div>
	</section>
	<!--Hero_Section-->

	<section id="aboutUs">
		<!--Aboutus-->
		<div class="container offset-4">
			<h2>TENTANG ASMA</h2>
			<div class="inner_section">
				<div class="row">
					<div class=" col-lg-7 col-md-7 col-sm-7 text-justify">
						<div class=" delay-01s animated fadeInDown wow animated">
							<h3>Berikut adalah penjelasan secara umum tentang penyakit asma</h3><br />
							<p>Asma merupakan penyakit jangka panjang yang dapat menyebabkan penderitanya sulit bernapas, batuk-batuk, dan mengalami mengi ketika kambuh. Pada tiap orang, tingkat keparahan penyakit ini berbeda-beda, dan umumnya dapat dikendalikan dengan baik.Asma terjadi ketika saluran napas atau bronkus mengalami radang. Bronkus yang berbentuk seperti tabung kecil ini berfungsi untuk membawa udara masuk dan keluar dari paru-paru. Bronkus penderita asma pada umumnya lebih sensitif dari orang-orang lain dan lebih gampang mengalami radang.</p> <br />
							<p>Ketika paru-paru seorang penderita teriritasi oleh sesuatu yang menjadi pemicu asma, saluran napasnya menjadi menyempit, otot-otot di sekitarnya menjadi mengencang, dan produksi dahak meningkat. Setelah itu timbullah beberapa gejala seperti dada yang terasa sesak, sulit bernapas, mengi, dan batuk-batuk.Serangan parah gejala-gejala tersebut dikenal sebagai serangan asma atau eksaserbasi asma akut. Penderita serangan asma bisa saja membutuhkan perawatan rumah sakit. Meski jarang terjadi, serangan asma bisa membahayakan nyawa. Bagi penderita asma kronis, radang pada saluran napasnya yang sudah berlangsung lama dan berulang-ulang bisa menyebabkan penyempitan permanen.Jika seseorang terdiagnosis mengidap asma saat kanak-kanak, gejalanya mungkin bisa menghilang ketika dia remaja dan muncul kembali saat dewasa. Namun gejala asma yang tergolong sedang atau berat di masa kanak-kanak, akan cenderung tetap ada walau bisa juga muncul kembali. Kendati begitu, asma bisa muncul di usia berapa pun dan tidak selalu berawal dari masa kanak-kanak.</p>
						</div>
						<div class="work_bottom"> <span>Want to know more..</span> <a href="#contact" class="contact_btn1">Kerja Sistem</a> </div>
					</div>

				</div>


			</div>
		</div>
		</div>
	</section>
	<!--Aboutus-->

	<!--Service-->
	<section id="service">
		<div class="container">
			<h2>LAYANAN</h2>
			<div class="row">
				<div class="col-lg-4">
					<h3>Sharing</h3>
					<p>Membagikan informasi kepada masyarakat tentang apa itu asma, penyebab serta dampaknya. Sehingga masyarakat dengan mandiri dapat melakukan pencegahan maupun cara penanganan yang tepat bagi penderita.</p>
				</div>
				<div class="col-lg-4">
					<h3>Diagnosa</h3>
					<p>Menyediakan layanan untuk melakukan cek atau diagnosa secara mandiri bagi masyarakat.</p>
				</div>
				<div class="col-lg-4">
					<h3>Konsultasi</h3>
					<p>Menyediakan tempat untuk berkonsultasi dengan pakar asma sehingga masyarakat lebih leluasa untuk melakukan tanya jawab terkait penyakit asma.</p>
				</div>
			</div>
		</div>
	</section>
	<!--Service-->

	<!--TesAsma-->
	<section id="tes_asma">
		<div class="container">
			<h2><strong>TES ASMA<strong></h2>
			<h5>layanan untuk mendiagnosa secara mandiri apakah anda mengidap asma atau tidak.</h5>
			<a class="btn btn-info" href="periksa.php">Mulai</a>
		</div>
	</section>
	<br><br>
	<section class="bg-info" id="contact">
		<div class="container text-justify">
			<br>
			<h2>METODE</h2>
			<div class="row">
				<div class="col-lg-4">
					<h4 class="text-center">Pengetahuan</h4>
					<h6>Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan dengan bantuan seorang pakar maupun sumber pengetahuan lainya seperti buku.</h6>
				</div>
				<div class="col-lg-4">
					<h4 class="text-center">Naive Bayes</h4>
					<h6>Data yang didaptakan dari pakar maupun buku berupa probabilitas tentang berapa orang pengidap penyakit asma akut, kronis, serta periodik. Data ini kemudian digunakan untuk menentukan aturan sistem dalam menentukan keputusan.</h6>
				</div>
				<div class="col-lg-4">
					<h4 class="text-center">Keakuratan</h4>
					<h6>Pada Sistem pakar ini, tingkat keakuratan masih belum maksimal karena data yang diperoleh masih sedikit sehingga masih belum dapat menggantikan pakar yang sesungguhnya.</h6>
				</div>
			</div>
		</div>
	</section>
</body>

</html>