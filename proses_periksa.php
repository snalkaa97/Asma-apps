<?php
include_once 'config.php';
?>
<?php

/*cek nilai sesion n_atas 1,2,3 diisi atau belum*/

if (!isset($_SESSION['n_atas1'])) {
	$_SESSION['n_atas1'] = 1;
}

if (!isset($_SESSION['n_atas2'])) {
	$_SESSION['n_atas2'] = 1;
}

if (!isset($_SESSION['n_atas3'])) {
	$_SESSION['n_atas3'] = 1;
}

if (!isset($_SESSION['jumlah_keluhan'])) {
	$_SESSION['jumlah_keluhan'] = 0;
} else {
	$_SESSION['jumlah_keluhan'] = $_SESSION['jumlah_keluhan'];
}

if (isset($_GET['jawaban'])) {
	$jawaban = $_GET['jawaban'];
	$rute = $_GET['rute'];

	switch ($jawaban) {
		case 'benar':

			$query = mysqli_query($con, "SELECT * FROM basis_aturan WHERE id_gejala='$rute'");

			while ($record = mysqli_fetch_array($query)) {
				$rute = $record['rute'];
				$fakta_ya = $record['fakta_ya'];
				$ngejala_akut = $record['ngejala_akut'];
				$ngejala_kronis = $record['ngejala_kronis'];
				$ngejala_periodik = $record['ngejala_periodik'];

				//memasukan nilai sementara bagian atas rumus bayes
				$_SESSION['keluhan'][$_SESSION['jumlah_keluhan']] = $fakta_ya;
				$_SESSION['jumlah_keluhan'] += 1;
				$_SESSION['n_atas1'] *= $ngejala_akut;
				$_SESSION['n_atas2'] *= $ngejala_kronis;
				$_SESSION['n_atas3'] *= $ngejala_periodik;

				if (strcmp($rute, 'final') == 0) {
					$solusi = $rute;
					$sakit = $record['id_penyakit'];

					header("location:periksa.php?solusi=$rute");
				} else {
					header("location:periksa.php?rute=$rute");
				}
			}
			break;

		case 'tidak':

			$query = mysqli_query($con, "SELECT * FROM basis_aturan WHERE id_gejala='$rute'");

			while ($record = mysqli_fetch_array($query)) {
				$rute = $record['rute'];
				$fakta_tidak = $record['fakta_tidak'];
				$_SESSION['keluhan'][$_SESSION['jumlah_keluhan']] = $fakta_tidak;
				$_SESSION['jumlah_keluhan'] += 1;

				//memasukan nilai sementara bagian atas rumus bayes
				$_SESSION['n_atas1'] *= 1;
				$_SESSION['n_atas2'] *= 1;
				$_SESSION['n_atas3'] *= 1;

				if (strcmp($rute, 'final') == 0) {
					$solusi = $rute;
					$sakit = $record['id_penyakit'];

					header("location:periksa.php?solusi=$rute&sakit=$sakit");
				} else {
					header("location:periksa.php?rute=$rute");
				}
			}
			break;

		case 'mulai':
			$rute = $_GET['rute'];
			header("location:periksa.php?rute=$rute");
			break;
	}
}
?>