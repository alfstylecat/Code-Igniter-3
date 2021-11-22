<? defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$sorgu = $this->db->get('test');
		$data['kayitlar'] = $sorgu->result();
		$data['title'] = "Veritabanındaki Bilgilerin Gösterilmesi";
		$this->load->view('home', $data);
	}

	public function ekle () {
		$this->load->helper('form');
		$this->load->view('ekle');
	}

	public function kayit_ekle () {
		//Eklemek için veritabanı modelimizi çağırıyoruz.
		$this->load->model('Model_Home');
		//Posttan gelen verileri alıyoruz.
		$data = array (
		 'roll_no' => $this->input->post('roll_no'),
			'name'    => $this->input->post('name')
		);
		//Model dosyamız aracılığıyla veritabanına ekleme yapıyoruz.
		$this->Model_Home->insert($data);
		//Tekrar sorgu gönderip veri tabanındaki bilgileri alıyoruz.
		//Tekrar sorgu göndermez isek o sayfada hata veriyor.
		$sorgu = $this->db->get('test');
		//Gelen verileri data değişkenine atıyoruz.
		$data['kayitlar'] = $sorgu->result();
  //Viewimizi yüklüyoruz.
		$this->load->view('ekle', $data);
	}
}
 

//ekle View
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Kayıt Ekleme</title>
	</head>
<body>
<?= form_open('home/kayit_ekle') ?>
<?= form_label('Roll No') ?>
<?= form_input(array('id' => 'roll_no', 'name' => 'roll_no')) ?>
<br>
<?= form_label('Name') ?>
<?= form_input(array('id' => 'name', 'name' => 'name')) ?>
<br>
<?= form_submit(array('id' => 'submit', 'value' => 'ekle')) ?>
<?= form_close() ?>
</body>
</html>

//Ekle Model
<? defined('BASEPATH') or exit('No direct script access allowed');

class Model_Home extends CI_Model
{

	public function __construct(){
		parent::__construct();
	}

	public function insert ($data) {
		if($this->db->insert('test', $data)) {
			return true;
		}
	}
}
 