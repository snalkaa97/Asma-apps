<?php
$pertanyaan = "";
$fin_atas1 = 0;
$fin_atas2 = 0;
$fin_atas3 = 0;
$fin_bawah = 0;
$prob_sakit1 = 0;
$prob_sakit2 = 0;
$prob_sakit3 = 0;
$n_atas1 = 0;
$n_atas2 = 0;
$n_atas3 = 0;
$id_penyakit = "";
$sesion = "";

/*setelah berakhirnya pertanyaan*/
if (isset($_GET['solusi'])) {
	$kesimpulan = "";
	$hasil = "";
	$solusi = $_GET['solusi'];
	$sakit = "";

	echo "<h2>Kondisi</h2>";
	echo "<table class=\"table table-striped\" id=\"tabel_hasil\">";
	echo "<thead class=\"head-table\">";
	echo "<th>Nomor</th>";
	echo "<th>Kondisi anda</th>";
	echo "</thead>";
	echo "<tbody>";
	echo "<tr>";

	var_dump($_SESSION['jumlah_keluhan']);
	var_dump($_SESSION['keluhan']);
	for ($counter = 0; $counter < $_SESSION['jumlah_keluhan']; $counter++) {
		$nomor = $counter + 1;
		echo "<tr>";
		echo "<td>$nomor</td>";
		echo "<td>" . $_SESSION['keluhan'][$counter] . "</td>";
		echo "</tr>";
	}
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";

	//perhitungan mendapatkan diagnosa tiap penyakit
	for ($count = 0; $count < 3; $count++) {

		$npenyakit = 0;
		switch ($count) {
			case '0':
				$id_penyakit = "p1";
				$sesion = "'n_atas1'";
				$n_atas1  += $_SESSION['n_atas1'];
				break;

			case '1':
				$id_penyakit = "p2";
				$sesion = "'n_atas2'";
				$n_atas2  += $_SESSION['n_atas2'];
				break;

			case '2':
				$id_penyakit = "p3";
				$sesion = "'n_atas3'";
				$n_atas3  += $_SESSION['n_atas3'];
				break;
		}

		$query = mysqli_query($con, "SELECT * FROM daftar_penyakit WHERE id_penyakit = '$id_penyakit'");

		while ($record = mysqli_fetch_array($query)) {
			$npenyakit = $record['npenyakit'];

			switch ($count) {
				case '0':
					$fin_atas1 += $n_atas1 * $npenyakit;
					break;

				case '1':
					$fin_atas2 += $n_atas2 * $npenyakit;
					break;

				case '2':
					$fin_atas3 += $n_atas3 * $npenyakit;
					break;
			}
		}
	}

	$fin_bawah = $fin_atas1 + $fin_atas2 + $fin_atas3;

	$prob_sakit1 += $fin_atas1 / $fin_bawah;
	$prob_sakit2 += $fin_atas2 / $fin_bawah;
	$prob_sakit3 += $fin_atas3 / $fin_bawah;

	//testing nilai probabilitas

	echo "<table class=\"table table\" style=\"background:#fff;\">";
	echo "<tr>";
	echo "<td>TESTING</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$fin_atas1 / $fin_bawah</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$fin_atas2 / $fin_bawah</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$fin_atas3 / $fin_bawah</td>";
	echo "</tr>";
	echo "</table>";


	$prob_sakit1 = round($prob_sakit1, 2);
	$prob_sakit2 = round($prob_sakit2, 2);
	$prob_sakit3 = round($prob_sakit3, 2);

	$prob_sakit1 *= 100;
	$prob_sakit2 *= 100;
	$prob_sakit3 *= 100;

	$total = $prob_sakit1 + $prob_sakit2 + $prob_sakit3;

	$hasil = $prob_sakit1;
	$penyakit = "p1";

	if ($prob_sakit2 >= $prob_sakit1) {
		$hasil = $prob_sakit2;
		$penyakit = "p2";
	}
	if ($prob_sakit3 >= $prob_sakit2) {
		$hasil = $prob_sakit3;
		$penyakit = "p3";
	}

	//jika jawaban bernilai tidak semuanya
	if ($prob_sakit1 == 30 && $prob_sakit2 == 30 && $prob_sakit3 == 40) {
		$penyakit = "p0";
		$prob_sakit1 *= 0;
		$prob_sakit2 *= 0;
		$prob_sakit3 *= 0;
		$sakit = "Anda Negatif Asma";
	}

	$query = mysqli_query($con, "SELECT * FROM daftar_penyakit WHERE id_penyakit = '$penyakit'");

	while ($record = mysqli_fetch_array($query)) {
		$sakit = strtoupper($record['nama_penyakit']);
	}

	echo "<h2>Kemungkinan Terjangkit</h2>";
	echo "<table class=\"table\">";
	echo "<thead class=\"thead-dark\">";
	echo "<th>Nama Penyakit</th>";
	echo "<th>Asma Akut</th>";
	echo "<th>Asma Kronis</th>";
	echo "<th>Asma Periodik</th>";
	echo "</thead>";
	echo "<tbody>";
	echo "<tr>";
	echo "<td>Kemungkinan</td>";
	echo "<td>$prob_sakit1 %</td>";
	echo "<td>$prob_sakit2 %</td>";
	echo "<td>$prob_sakit3 %</td>";
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";

	/*menampilkan kesimpulan serta saran*/
	echo "<div class=\"alert alert-info\">";
	if ($penyakit != 'p0') {
		echo "<h5 style=\"font-size:17px;\">Anda dinyatakan mengidap $sakit</h5>";
	}

	$query = mysqli_query($con, "SELECT * FROM daftar_solusi WHERE id_penyakit = '$penyakit'");

	while ($record = mysqli_fetch_array($query)) {
		$kesimpulan = $record['solusi'];
		echo "<h5 id=\"hasil_text\">$kesimpulan</h5>";
	}
	echo "</div>";
} else if (isset($_GET['rute'])) {

	$rute = $_GET['rute'];
	$query = mysqli_query($con, "SELECT * FROM basis_aturan WHERE id_gejala = '$rute'");

	while ($record = mysqli_fetch_array($query)) {
		$pertanyaan = $record['pertanyaan'];
	}

	//testing nilai session jumlah keluhan, n_atas1, n_atas2, n_atas3

	echo "<table class=\"table table\" style=\"background:#fff;\">";
	echo "<tr>";
	echo "<td>TESTING</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $_SESSION['jumlah_keluhan'] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $_SESSION['n_atas1'] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $_SESSION['n_atas2'] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $_SESSION['n_atas3'] . "</td>";
	echo "</tr>";
	echo "</table>";

	echo "<h2><strong>Pertanyaan</strong></h2>";
	echo "<div class=\"alert alert-success\">";
	echo "<h4>$pertanyaan</h4>";
	echo "<div class=\"row\">";
	echo "<div class=\"col-lg-2 col-sm-7\">";
	echo "<a href=\"proses_periksa.php?jawaban=benar&rute=$rute\" class=\"btn btn-outline-primary\">Benar</a> ";
	echo "</div>";
	echo "<div class=\"col-lg-2 col-sm-7\">";
	echo "<a href=\"proses_periksa.php?jawaban=tidak&rute=$rute\" class=\"btn btn-outline-danger\">Tidak</a> ";
	echo "</div>";
	echo "</div>";
	echo "</div>";
} else {
	echo "<h2><strong>Diagnosa Mandiri</strong></h2>";
	echo "<div class=\"row\">";
	echo "<div class=\"col-lg-8 col-sm-7\">";
	echo "<p>Disini, anda dapat melakukan diagnosa mandiri untuk mengetahui apakah anda mengidap penyakit asma tertentu atau tidak. Anda hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi / keluhan yang anda rasakan saat ini. Kemudian sistem akan melakukan prediksi berdasarkan jawaban anda.</p>";
	echo "<a href=\"proses_periksa.php?jawaban=mulai&rute=g1\" class=\"btn btn-info\">Mulai</a> ";
	echo "</div>";
	echo "</div>";
}
