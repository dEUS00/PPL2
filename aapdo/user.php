<?php
	class user {
		private $servername = "167.205.35.176";
		private $user = "root";
		private $pass = "ppl2016";
		private $db_name = "db_ppl_core";

		function getUsername($token) {
			echo "<div class=\"row\">";
            echo "<h4 align=\"right\">";

			$conn = new mysqli($this->servername, $this->user, $this->pass, $this->db_name);

			$sql = "SELECT email FROM users WHERE token = \"$token\"";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				echo $row['email'];
			}

			echo "<button class=\"btn m-b-sm m-r-sm btn-danger\">";
			echo "<a href=\"http://10.5.24.200:8000/logout\">";
			echo "Logout";
			echo "</a>";
			echo "</button>";
			echo "</h4>";
		    echo "</div>";

			$conn->close();
		}
	}
?>