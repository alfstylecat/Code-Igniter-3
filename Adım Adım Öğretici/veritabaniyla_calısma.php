<?
//Modelimizi tanımlıyoruz
Class Model_ismi extends CI_Model { 
	
      Public function __construct() { 
         parent::__construct(); 
      } 
   } 

//Controllerdan model dosyasını çağırma.
$this->load->model('model_ismi');

//Controllerdan model yöntemini çağırma.
$this->model_ismi->method();

//Tüm sayfalar için veritabanını kullanmak için autoload'a eklenecek.
$autoload['libraries'] = array('database');

//Otomatik bağlantı istemiyorsak her sayfanın classına aşşağıdaki kodu ekleyerek manuel bağlanma.
$this->load->database();

//Autoload'dan modeli otomatik yükleme.
$autoload['model'] = array('model_ismi');

//Modeli kullanırken alternatif bir isimle kullanmak için.
$autoload['model'] = array('model_ismi' => 'alternatif');

### Veri ekleme ###
//Veritabanına ekleme yapmak için insert işlemi kullanılır.data'da eklenecek verileri içerir.
//En kolay ekleme yöntemi şuandaki sayfa her yenilendiğinde aynıda olsa ekleme yapıyor.
//Şuanda model dosyası kullanılmıyor.
$data = array( 
   'roll_no' => ‘1’, 
   'name' => ‘koray’ 
); 
$this->db->insert("test", $data);

### Veri Güncelleme ###
//Güncellenecek veri
$data = array( 
   'roll_no' => '1', 
   'name' => 'Test Değiştir.' 
); 

//Güncellenecek verileri ayarla.güncellemede hepsi kullanılıyor
$this->db->set($data); 
//Nerenin güncelleneceğini ayarla.
$this->db->where("roll_no", "1");
//Veriyi güncelle
$this->db->update("test", $data);

### Veri Silme işlemi ###
//Silme işlemi en kolay olanı
$this->db->delete("test", "roll_no = 1");

### Veritabınandan tüm kayıtları alma işlemi ###
$query = $this->db->get("test"); 
$data['kayitlar'] = $query->result();