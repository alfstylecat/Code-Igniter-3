<?
defined('BASEPATH') OR exit('No direct script access allowed');
//veri eklemek için
$this->db->insert('tabloadı'$form_data);

//View Dosyası
<form action="site_control/ekle" method="post" >
Ad: <input type="text" name="ad" />
Soyad: <input type="text" name="soyad" />
Şifre:  <input type="text" name="sifre" />
<input type="submit" value="Kaydet" />
</form>

//controller sayfası
class Site_control extends CI_Controller {
	
 function __construct() {
  parent::__construct();
 }
	
 public function kaydet() {
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

//Model Dosyası
<?php
class Site_model extends CI_Model {
	
 function __construct() {
  parent::__construct();
  $this->load->database(); //Database sınıfını ekliyoruz.
 }
	
 function ekle($form_data) {
 $this->db->insert('users',$form_data); //verileri users tablosuna kaydediyoruz.
 }
	
}
