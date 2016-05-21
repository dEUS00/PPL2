<?php
	$curDate = date("Y-m-d");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DB_Local = "kepindahan";

	$connect = mysqli_connect($servername, $username, $password, $DB_Local);

	mysqli_set_charset($connect,'utf8');

	function postDataDatang($data, $role) {
		global $connect, $curDate;
		$q = NULL;
		//create new record
		$q = "INSERT INTO pindah_datang (nik, nomor_kk, asal_kota, asal_kecamatan, asal_kelurahan, asal_rw, asal_rt, asal_alamat, tujuan_kota, tujuan_kecamatan, tujuan_kelurahan, tujuan_rw, tujuan_rt, tujuan_alamat, waktu)
			VALUES ('$data[nik]', '$data[no_kk]', '$data[kota_asal]', '$data[kec_asal]', '$data[kel_asal]', '$data[rw_asal]', '$data[rt_asal]', '$data[alamat_asal]', '$data[kota_tujuan]', '$data[kec_tujuan]', '$data[kel_tujuan]', '$data[rw_tujuan]', '$data[rt_tujuan]', '$data[alamat_tujuan]', '$curDate')";
		
		postLog($role, "Input Form Datang");

		$no_error = mysqli_query($connect, $q);
		return $no_error;
	}

	function postDataDalam($data, $role) {
		global $connect, $curDate;
		$q = NULL;
		//create new record
		$q = "INSERT INTO pindah_dalam_kota (nik, nomor_kk, asal_kota, asal_kecamatan, asal_kelurahan, asal_rw, asal_rt, asal_alamat, tujuan_kota, tujuan_kecamatan, tujuan_kelurahan, tujuan_rw, tujuan_rt, tujuan_alamat, waktu)
			VALUES ('$data[nik]', '$data[no_kk]', '$data[kota_asal]', '$data[kec_asal]', '$data[kel_asal]', '$data[rw_asal]', '$data[rt_asal]', '$data[alamat_asal]', '$data[kota_tujuan]', '$data[kec_tujuan]', '$data[kel_tujuan]', '$data[rw_tujuan]', '$data[rt_tujuan]', '$data[alamat_tujuan]', '$curDate')";
		
		postLog($role, "Input Form Dalam");

		$no_error = mysqli_query($connect, $q);
		return $no_error;
	}

	function postDataKeluar($data, $role) {
		global $connect, $curDate;
		$q = NULL;
		//create new record
		$q = "INSERT INTO pindah_keluar (nik, nomor_kk, asal_kota, asal_kecamatan, asal_kelurahan, asal_rw, asal_rt, asal_alamat, tujuan_kota, tujuan_kecamatan, tujuan_kelurahan, tujuan_rw, tujuan_rt, tujuan_alamat, waktu)
			VALUES ('$data[nik]', '$data[no_kk]', '$data[kota_asal]', '$data[kec_asal]', '$data[kel_asal]', '$data[rw_asal]', '$data[rt_asal]', '$data[alamat_asal]', '$data[kota_tujuan]', '$data[kec_tujuan]', '$data[kel_tujuan]', '$data[rw_tujuan]', '$data[rt_tujuan]', '$data[alamat_tujuan]', '$curDate')";

		postLog($role, "Input Form Keluar");

		$no_error = mysqli_query($connect, $q);
		return $no_error;
	}

	function getDataDatang($searchQuery = "") {
		global $connect;

		$q = "SELECT * FROM pindah_datang";
		$rq = mysqli_query($connect, $q);

		$r = array();
		while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
			
			$r[] = $row;
		}

		return $r;
	}

	function getDatumDatang($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_datang WHERE id = $searchQuery";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function getDatumKeluar($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_keluar WHERE id = $searchQuery";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function getDatumDalam($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_dalam_kota WHERE id = $searchQuery";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function getDataKeluar($searchQuery = "") {
		global $connect;

		$q = "SELECT * FROM pindah_keluar";
		$rq = mysqli_query($connect, $q);

		$r = array();
		while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
			
			$r[] = $row;
		}

		return $r;
	}

	function getDataDalam($searchQuery = "") {
		global $connect;

		$q = "SELECT * FROM pindah_dalam_kota";
		$rq = mysqli_query($connect, $q);

		$r = array();
		while ($row = mysqli_fetch_array($rq, MYSQLI_ASSOC)) {
			
			$r[] = $row;
		}

		return $r;
	}

	function verifikasiDatang($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		$q = "SELECT * FROM pindah_datang WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = $row["verified"] + 1;
		}

		$q = "UPDATE pindah_datang SET verified=$verified WHERE id=$id";
		
		$no_error = mysqli_query($connect, $q);
		postToKTP($verified, $row);
		postLog($role, "Verifikasi Datang");

		return $no_error;
	}

	function rejectDatang($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		$q = "SELECT * FROM pindah_datang WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = -1;
		}

		$q = "UPDATE pindah_datang SET verified=$verified WHERE id=$id";
		
		$no_error = mysqli_query($connect, $q);
		
		postLog($role, "Reject Datang");

		return $no_error;
	}

	function verifikasiKeluar($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		$q = "SELECT * FROM pindah_keluar WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = $row["verified"] + 1;
		}

		$q = "UPDATE pindah_keluar SET verified=$verified WHERE id=$id";
		
		$no_error = mysqli_query($connect, $q);
		postToKTP($verified, $row);
		postLog($role, "Verifikasi Keluar");

		return $no_error;
	}

	function rejectKeluar($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		$q = "SELECT * FROM pindah_keluar WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = -1;
		}

		$q = "UPDATE pindah_keluar SET verified=$verified WHERE id=$id";
		
		$no_error = mysqli_query($connect, $q);
		postLog($role, "Reject Keluar");

		return $no_error;
	}

	function verifikasiDalam($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		
		$q = "SELECT * FROM pindah_dalam_kota WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = $row["verified"];

			if ($verified == 0) {
				$a = $row["asal_kelurahan"];
				$b = $row["tujuan_kelurahan"];
				if (strcmp($a, $b) == 0)
					$verified = 3;
				else
					$verified++;
			}
			else if ($verified == 1) {
				$a = $row["asal_kecamatan"];
				$b = $row["tujuan_kecamatan"];
				if (strcmp($a, $b) == 0)
					$verified = 3;
				else
					$verified++;
			}
			else if ($verified == 2) {
				$verified++;
			}
		}

		$q = "UPDATE pindah_dalam_kota SET verified=$verified WHERE id=$id";
		$no_error = mysqli_query($connect, $q);
		postToKTP($verified, $row);
		postLog($role, "Verifikasi Dalam");

		return $no_error;
	}

	function rejectDalam($id, $role) {
		global $connect;
		$q = NULL;
		//create new record
		
		$q = "SELECT * FROM pindah_dalam_kota WHERE id=$id";
		$result = $connect->query($q);

		while ($row = $result->fetch_assoc()) {
			$verified = -1;
		}

		$q = "UPDATE pindah_dalam_kota SET verified=$verified WHERE id=$id";
		$no_error = mysqli_query($connect, $q);
		
		postLog($role, "Reject Dalam");

		return $no_error;
	}

	function getVerifiedDatang($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_datang WHERE nik = $searchQuery AND verified=3";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function getVerifiedKeluar($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_keluar WHERE nik = $searchQuery AND verified=3";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function getVerifiedDalam($searchQuery) {
		global $connect;

		$q = "SELECT * FROM pindah_dalam_kota WHERE nik = $searchQuery AND verified=3";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r;
	}

	function postLog($role, $action) {
		global $connect, $curDate;

		$q = "INSERT INTO log (role, aksi, tanggal) VALUES ('$role', '$action', '$curDate')";
		$no_error = mysqli_query($connect, $q);
		
		return $no_error;
	}

	function getStatusDatang($id) {
		global $connect;

		$q = "SELECT verified FROM pindah_datang WHERE id = $id";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r['verified'];
	}

	function getStatusDalam($id) {
		global $connect;

		$q = "SELECT verified FROM pindah_dalam_kota WHERE id = $id";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r['verified'];
	}

	function getStatusKeluar($id) {
		global $connect;

		$q = "SELECT verified FROM pindah_keluar WHERE id = $id";
		$rq = mysqli_query($connect, $q);

		$r = mysqli_fetch_array($rq, MYSQLI_ASSOC);

		return $r['verified'];
	}

	function postToKTP($verified, $data) {
		if ($verified == 3) {
			$url = 'http://10.5.24.200:8000/api/pindah';
			$options = array(
			    'http' => array(
			        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			        'method'  => 'POST',
			        'content' => http_build_query($data)
			    )
			);
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
		}
	}
?>