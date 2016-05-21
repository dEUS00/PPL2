<?php

	$nama_server = "167.205.35.176";
	$nama_user = "root";
	$kata_sandi = "ppl2016";
	$nama_basisdata = "db_ppl_core";

	$hubung = mysqli_connect($nama_server, $nama_user, $kata_sandi, $nama_basisdata);

	mysqli_set_charset($hubung,'utf8');

	function getDataPenduduk($searchQuery = "") {
		global $hubung;

		$q = "SELECT penduduk.nama as nama, kota.nama as nama_kota, kecamatan.nama as nama_kecamatan, kelurahan.nama as nama_kelurahan, rw.nama as nama_rw, rt.nama as nama_rt FROM penduduk JOIN kota JOIN kelurahan JOIN kecamatan JOIN rw JOIN rt WHERE penduduk.id = $searchQuery";
		$rq = mysqli_query($hubung, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function verifikasiToken($token) {
		global $hubung;

		$q = "SELECT tipe FROM users WHERE token = \"$token\"";
		$rq = mysqli_query($hubung, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);
		return $r['tipe'];
	}
?>