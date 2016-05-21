<?php
	class statistics {
        private $result_dalam;
        private $result_datang;
        private $result_keluar;
        private $result_count_dalam;
        private $result_count_datang;
        private $result_count_keluar;

        function __construct($servername, $username, $password, $dbname) {
        	if (isset($_POST["start"]) && isset($_POST["end"])) {
        		$conn = new mysqli($servername, $username, $password, $dbname);

            	$start = $_POST["start"];
            	$end = $_POST["end"];

            	$pindah_dalam = "SELECT nik, asal_alamat, tujuan_alamat, waktu FROM pindah_dalam_kota WHERE waktu<='" . $end . "' and waktu>='" . $start . "'";
                $pindah_datang = "SELECT nik, asal_alamat, tujuan_alamat, waktu FROM pindah_datang WHERE waktu<='" . $end . "' and waktu>='" . $start . "'";
                $pindah_keluar = "SELECT nik, asal_alamat, tujuan_alamat, waktu FROM pindah_keluar WHERE waktu<='" . $end . "' and waktu>='" . $start . "'";
                $count_datang = "SELECT COUNT(*) as count, verified FROM pindah_datang GROUP BY verified";
                $count_keluar = "SELECT COUNT(*) as count, verified FROM pindah_keluar GROUP BY verified";
                $count_dalam = "SELECT COUNT(*) as count, verified FROM pindah_dalam_kota GROUP BY verified";

                $this->result_dalam = $conn->query($pindah_dalam);
                $this->result_datang = $conn->query($pindah_datang);
                $this->result_keluar = $conn->query($pindah_keluar);
                $this->result_count_dalam = $conn->query($count_dalam);
                $this->result_count_datang = $conn->query($count_datang);
                $this->result_count_keluar = $conn->query($count_keluar);
            }
        }

		function getPieChart() {
			if (isset($_POST["start"]) && isset($_POST["end"])) {
				echo "<div ui-jq='sparkline' ui-options=\"[" . $this->result_dalam->num_rows . "," . $this->result_datang->num_rows . "," . $this->result_keluar->num_rows . "], {type:'pie', height:140, sliceColors:['#8560a8', '#ff7e00', '#8dc80e']}\" class='sparkline inline text-center'></div>";
        	}
        	else {
        		echo "Pilih tanggal periode";
        	}
		}

		function getDalamData() {
			if (isset($_POST["start"]) && isset($_POST["end"])) {
            	if ($this->result_dalam->num_rows > 0) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'>";
                    echo "<thead>";
                    echo "<th>NIK</th>";
                    echo "<th>Alamat Asal</th>";
                    echo "<th>Alamat Tujuan</th>";
                    echo "<th>Tanggal</th>";
                    echo "</thead>";
                    while($row = $this->result_dalam->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nik"] . "</td>";
                        echo "<td>" . $row["asal_alamat"] . "</td>";
                        echo "<td>" . $row["tujuan_alamat"] . "</td>";
                        echo "<td>" . $row["waktu"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else {
                    echo "<div class='wrapper-md font-semibold'>Tidak ada data</div>";
                }
            }
            else {
            	echo "<div class='wrapper-md font-semibold'>Pilih tanggal periode</div>";
            }
		}

		function getDatangData() {
			if (isset($_POST["start"]) && isset($_POST["end"])) {
            	if ($this->result_datang->num_rows > 0) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'>";
                    echo "<thead>";
                    echo "<th>NIK</th>";
                    echo "<th>Alamat Asal</th>";
                    echo "<th>Alamat Tujuan</th>";
                    echo "<th>Tanggal</th>";
                    echo "</thead>";
                    while($row = $this->result_datang->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nik"] . "</td>";
                        echo "<td>" . $row["asal_alamat"] . "</td>";
                        echo "<td>" . $row["tujuan_alamat"] . "</td>";
                        echo "<td>" . $row["waktu"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else {
                    echo "<div class='wrapper-md font-semibold'>Tidak ada data</div>";
                }
            }
            else {
            	echo "<div class='wrapper-md font-semibold'>Pilih tanggal periode</div>";
            }
		}

		function getKeluarData() {
			if (isset($_POST["start"]) && isset($_POST["end"])) {
            	if ($this->result_keluar->num_rows > 0) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'>";
                    echo "<thead>";
                    echo "<th>NIK</th>";
                    echo "<th>Alamat Asal</th>";
                    echo "<th>Alamat Tujuan</th>";
                    echo "<th>Tanggal</th>";
                    echo "</thead>";
                    while($row = $this->result_keluar->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nik"] . "</td>";
                        echo "<td>" . $row["asal_alamat"] . "</td>";
                        echo "<td>" . $row["tujuan_alamat"] . "</td>";
                        echo "<td>" . $row["waktu"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else {
                    echo "<div class='wrapper-md font-semibold'>Tidak ada data</div>";
                }
            }
            else {
            	echo "<div class='wrapper-md font-semibold'>Pilih tanggal periode</div>";
            }
		}

        function getDatangCount() {
            if (isset($_POST["start"]) && isset($_POST["end"])) {
                if ($this->result_count_datang->num_rows > 0) {
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'>";
                    echo "<thead>";
                    echo "<th>Status</th>";
                    echo "<th>Jumlah</th>";
                    echo "</thead>";
                    while($row = $this->result_count_datang->fetch_assoc()) {
                        echo "<tr>";
                        if ($row['verified'] == 3)
                            echo "<td>" . "Sudah disetujui" . "</td>";
                        else if ($row['verified'] == -1)
                            echo "<td>" . "Tidak disetujui" . "</td>";
                        else
                            echo "<td>" . "Dalam proses" . "</td>";
                        echo "<td>" . $row["count"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else {
                    echo "<div class='wrapper-md font-semibold'>Tidak ada data</div>";
                }
            }
        }
	}
?>