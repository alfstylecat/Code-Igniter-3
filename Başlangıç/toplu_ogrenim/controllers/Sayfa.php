<?php
/*
En basit controller view bağlantısı
*/
class Sayfa extends CI_Controller {
  public function index() {
    
    $this->load->view('sayfa');
  }
}

/*
En basit haliyle controllerdan viewe değişken aktarımı yada bilgi aktarımı
*/
class Sayfa extends CI_Controller {
  public function index() {
    
    $veri['sayfa_basligi'] = 'Sayfa Başlığım';
    
    $this->load->view('sayfa', $veri);
  }
}

/*
En basit haliyle dizi içinde bilgi gönderme
*/
class Sayfa extends CI_Controller {
  public function index() {
    
    $veri = array(
      'sayfa_basligi' => 'Sayfa Başlığım',
      'baslik' => 'Başlığım',
      'mesaj' => 'Mesajım'
    );
    
    $this->load->view('sayfa', $veri);
  }
}

/*
En basit haliyle foreachle alınacak dizi gönderme
*/
class Sayfa extends CI_Controller {
  public function index() {
    
    $veri['yapilacaklar_listesi'] = array('Ev Temizliği', 'Fare Temizliği', 'El Temizliği');
    $veri['sayfa_basligi'] = "Sayfa Başlığım";
    $veri['baslik'] = "Başlık";
    
    $this->load->view('sayfa', $veri);
  }
}










/*
Örnek Kullanılacak
*/
class Sayfa extends CI_Controller {
  public function index() {

    $this->load->view('sayfa', $veri);
  }
}
