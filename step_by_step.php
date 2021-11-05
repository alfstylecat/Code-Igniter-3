<?
//Her controller ve model sayfasının başında olacak
defined('BASEPATH') OR exit('No direct script access allowed');

//View Dosyası
echo "Burası View";

//Controller Dosyası
class anasayfa extends CI_Controller {

function __construct() {
parent::__construct();	//Yapıcı fonksiyonumuz.
}	

function index() {
$this->load->view('index'); //view klasöründeki index.php' yi yüklüyoruz.
}
}

//Mail Gönderimi

<form action="mail_controller" method="post"> <!--Formu oluşturuyoruz mail_controllere gönderiyoruz.-->
Alıcılar: <input type="text" name="alici" />
Konu    : <input type="text" name="konu" />
Email   : <textarea name="mesaj" rows="5" cols="50"></textarea>
          <input name="gonder" type="submit" value="Gönder" />
</form>
  
  
//Mail Gönderimi
  class mail_controller extends CI_Controller 
{
	
		function __construct()    
		{
		parent::__construct();		
        }
		
        function mail_gonder()
		{
            $this->load->library('email');  //email kütüphanesini includ ettik.

            $config['protocol']  = 'smtp';  //mail protokolü
            $config['smtp_host'] = 'xxxxx';   //web sunucu bilgileri
            $config['smtp_user'] = 'xxxx@xxxx.xxx';  //web mail adresi
            $config['smtp_pass'] = 'xxxxx'; //web mail şifresi
            $config['smtp_port'] = '';   //web mail smtp portu
            $config['mailtype']  = 'html';

            $this->email->initialize($config); //sunucu bilgilerini email kütüphanesine gönderdik
            $this->email->from("info@ramazanbelyurt.name.tr","Ramazan BELYURT");//mail gönderen bilgileri
            $this->email->to($this->input->post('alici')); //formdan gelen mail alıcı bilgileri
            $this->email->subject($this->input->post('konu')); //Formdan gelen mail konusu
            $this->email->message($this->input->post('mesaj')); //Formdan gelen mail içeriği
           	$send=$this->email->send(); //Email kütüphanesi ile maili gönderiyoruz.
			if($send)
            {
                 echo "Mail gönderildi";
             }
            else echo "Mail gönderilemedi";
            }
}





Codeigniter ile veritabanı işlemleri yapmadan önce config klasöründeki database.php sayfasında veritabanı bağlantı ayarlarının yapılması gerekir. Veritabanı işlemleri  model dosyasında yapılır. Veritabanından veri çekmek için select SQL sorgu cümlesi kullanılır. Select sorgusunun codeigniterde karşılığı aşağıdaki gibidir.

$sorgu=$this->db->get ("tabloadı");
return $sorgu->result ();
Eğer bir şart varsa aşağıdaki sorgu cümlesi kullanılır;

//Birinci Yöntem
$sorgu=$this->db->get_where ("tabloadı",array ('id'=>$id);
return $sorgu->result ();
//İkinci yöntem
 $this->db->where ('id',$id);
$sorgu=$this->db->get ('tabloadı');
return $sorgu->result ();
Verileri Sirali almak icin;

$this->db->order_by ('id','asc');
$sorgu=$this->db->get ('tabloadi');
return $sorgu->result ();
Belirli sayıda verileri limit belirterek almak için;

$this->db->limit(10);
$sorgu=$this->db->get ('tabloadi');
return $sorgu->result ();

//başlangıç belirterek belirli sayıda veri çekmek.
$this->db->limit($limit,$start);
Like ile kelime arama işlemi yapacaksak;

$this->db->like('icerik', $kelime); 
$query = $this->db->get('tabloadı');
return $query->result();
Select ile belirli alanlardaki verileri çekmek;

$this->db->select('title, content, date');
$query = $this->db->get('mytable');
                             
                             
                             
                             
                             Codeigniter ile veri tabanı tablosuna veri eklemek için insert kullanılır. Kullanım şekli aşağıdaki gibidir.

$this->db->insert('tabloadı'$form_data);
Şimdi bir örnek yaparak veri tabanına veri ekleyelim. Myql de my_database isminde bir veri tabanı ve içerisine de users isminde bir tablo oluşturalım. Config klasöründeki database.php dosyasında veri tabanı ayarlarını yapıyoruz. Şuradaki anlatımımdan faydalanabilirsiniz. Tablo alanlarını ad, soyad, sifre olarak belirleyelim. Şimdi view klasörüne form_view.php sayfası oluşturarak içine form ekleyelim.

form_view.php
<form action="site_control/ekle" method="post" >
Ad: <input type="text" name="ad" />
Soyad: <input type="text" name="soyad" />
Şifre:  <input type="text" name="sifre" />
<input type="submit" value="Kaydet" />
</form>
 
Şİmdi controller klasörüne  Site_control.php sayfasını oluşturalım ve içerisine aşağıdaki kodları yazalım.

Site_control
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site_control extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
    public function kaydet()
    {
       $form_data=array(
             'ad'=>$this->input->post('ad'),      //Formdan Verileri alıyoruz.
             'soyad'=>$this->input->post('soyad'),
             'sifre'=>$this->input->post('sifre'));
       $this->load->model('site_model');    //Model dosyasını yüklüyoruz.
       $sonuc=$this->site_model->ekle($form_data); //verileri ekle fonksiyonuna gönderiyoruz.
       if($sonuc)
          echo "Kayıt Eklendi."; 
       else
          echo "Kayıt Eklenemedi."; 
    }
}
Şimdi de model klasörüne Site_model.php dosyasını oluşturarak aşağıdaki kodları yazıyoruz.

Site_model
<?php
class Site_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
        $this->load->database(); //Database sınıfını ekliyoruz.
	}
    function ekle($form_data)
    {
      $this->db->insert('users',$form_data); //verileri users tablosuna kaydediyoruz.
    }
}
                             
                             
                             
                             
Codeigniter ile silme ve güncelleme işlemleri yapmak için delete ve update deyimleri kullanılır. Silme işlemi Model dosyasında ilgili fonksiyonun içerisine aşağıdaki kodlar yazılarak yapılır.

Delete
function sil($id)  //id bilgisi alınıyor.
{
$this->db->delete('tablo_ismi',array('id'=>$id));//id değerine eşit veri siliniyor.
}
Güncelleme işlemi aşağıdaki gibi yapılır.

Update
function guncelle($form_data,$id) //Formdan bgelen bilgiler alınıyor.
	{
		$this->db->where('id', $id);  //Hangi satırın güncelleneceği belirleniyor.
		$this->db->update('tablo_ismi', $form_data); //Güncelleme yapılıyor.
	}
