<?php
	// flasher notif 
	class Flasher {
		static function setNotif($pesan, $info) {
			$_SESSION['flash'] = [
				'pesan' => $pesan,
				'info' => $info
			];
		}

		static function notif() {
			if (isset($_SESSION['flash'])) {
				echo '<div class="alert alert-'. $_SESSION['flash']['info'] .' rounded-0" role="alert" id="status">
							  '. $_SESSION['flash']['pesan'] .'
							</div>';
				unset($_SESSION['flash']);
			}
		}
	}

?>