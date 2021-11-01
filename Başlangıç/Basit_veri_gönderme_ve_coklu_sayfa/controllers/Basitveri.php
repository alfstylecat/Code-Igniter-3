<?php
/*
1- en basit haliyle sayfa başlığı gönderme ve şablon kullanacaksak 4 farklı sayfayı aynı görünüm içinde gösterme

*/

class Basitveri extends CI_Controller {

        public function index()
        {
                $veri['sayfa_basligi'] = 'Başlığım'; //title bölümüne otomatik tanımlama 
          
                $this->load->view('header'); //views/header.php varsa
                $this->load->view('menu'); //views/menu.php varsa
                $this->load->view('content', $veri);//views/content.php bu artık giriş sayfamız bazında
                $this->load->view('footer');//views/footer.php varsa
        }

}
