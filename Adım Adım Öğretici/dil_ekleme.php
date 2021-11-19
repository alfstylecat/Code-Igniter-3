<?
/*
#Farklı diller için application/languages klasörü kullanılır.
#Her dil için o dile ait farklı klasör oluşturulur ve o dilin ingilizce ismini yazın.
 Örnek : english, turkish, deutsch, french
#Dil dosyası herzaman _lang.php ile sonlanmalıdır.
 Örnek : english_lang.php, turkish_lang.php, deutsch_lang.php, french_lang.php
#Dil dosyasına ekleme yaparken $lang dizisi ile anahtar değer çifti olarak kaydedilir.
 Örnek : $lang['key'] = 'anahtar'; $lang['dashboard'] = 'Kontrol Paneli';


*/

//Dosyaadi yüklemek istediğimiz dosyanın adıdır.
//Dil onu içeren dil kümesidir.
$this->lang->load('dosyaadi', 'dil');

//Dil dosyasından bir satır almak için.
$this->lang->line('language_key');

//Autoload'da otomatik olarak dil yüklenebilir.
//Sözdizimi
$autoload['language'] = array('lang1', 'lang2');

//codeigniter_lang.php dosyamız varsa bunu array'a iletirken sadece codeigniter yazmamız yeterli.
$autoload['language'] = array('codeigniter');

//Language Controller örneği
class Lang_controller extends CI_Controller {

      public function index(){
         //Form yardımcısını yüklüyoruz
         $this->load->helper('form');

         //Seçilen dili alıyoruz.
         $language = $this->input->post('language');
		
         //Secilen dile göre dil dosyasını seç
         if($language == "french")
            $this->lang->load('french_lang','french');
         else if($language == "german")
            $this->lang->load('german_lang','german');
         else
         $this->lang->load('english_lang','english');
		
         //İletiyi dil dosyasından al.
         $data['msg'] = $this->lang->line('msg');

									//Gelen dili değişkene aktar.		
         $data['language'] = $language;
         //View dosyasına yükle.
         $this->load->view('lang_view',$data);
      }
   }
