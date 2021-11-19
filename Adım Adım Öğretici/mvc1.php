<? 
/*
En basit Kullanım tüm kodlar tek yer verilmiştir.
Bu Dosyayi Controllersa Adim1.php olarak kaydet ve viewde sadece adim1.php boş dosya aç yeterli.
*/

class Adim1 extends CI_Controller {
	public function index () {
		$this->load->view('adim1');
	}
}
