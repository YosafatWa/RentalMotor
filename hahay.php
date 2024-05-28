<?php 
class motor {
	protected $pajak,
			  $diskon = 0.05;
	private $Scooter,
			$Beat,
			$Vario,
			$Zx25R,
			$R1;
	public $waktu;
	public $jenis;

	function __construct() {
		$this->pajak = 10000;
		$this->diskon = 0.05;
	}

	public function setHarga($tipe1, $tipe2, $tipe3, $tipe4, $tipe5) {
		$this->Scooter = $tipe1;
		$this->Beat = $tipe2;
		$this->Vario = $tipe3;
		$this->Zx25R = $tipe4;
		$this->R1 = $tipe5;
	}

	public function getHarga() {
		$data["Scooter"] = $this->Scooter;
		$data["Beat"] = $this->Beat;
		$data["Vario"] = $this->Vario;
		$data["Zx25R"] = $this->Zx25R;
		$data["R1"] = $this->R1;
		return $data;
	}
}

class sewa extends motor {
	public function hargaSewa() {
		if ($_POST['nama'] == "Yos") {
			$dataHarga = $this->getHarga();
            $hargaSewa = $this->waktu * $dataHarga[$this->jenis];
            $hargaPajakDiskon =  $this->diskon * $hargaSewa;
            $hargaBayar = $hargaSewa - $hargaPajakDiskon + $this->pajak;
            return $hargaBayar;
		} else {
			$dataHarga = $this->getHarga();
			$hargaPajak = $dataHarga[$this->jenis] + $this->pajak ;
			$hargaBayar = $hargaPajak * $this->waktu;
			return $hargaBayar;
		}
	}

	public function cetakStruck() {
		if ($_POST['nama']  == "Yos") {
			echo "<center>";
			echo "-----------------------------------------------" . "<br>";
			echo "Anda menyewa motor " . $this->jenis . "<br>";
			echo "Dengan lama waktu : " . $this->waktu . " hari <br>";
			echo "Nama anda tercatat sebagai member dan anda mendapatkan diskon sebesar 5%" . "<br>";
			echo "Total yang harus anda bayar Rp. " . number_format($this->hargaSewa(), 0, '', '.') . "<br>";
			echo "-----------------------------------------------";
			echo "</center>";	
		}else {
			echo "<center>";
			echo "-----------------------------------------------" . "<br>";
			echo "Anda menyewa motor " . $this->jenis . "<br>";
			echo "Dengan lama waktu : " . $this->waktu . " hari <br>";
			echo "Total yang harus anda bayar Rp. " . number_format($this->hargaSewa(), 0, '', '.') . "<br>";
			echo "-----------------------------------------------";
			echo "</center>";	
		}
	} 
}
?>