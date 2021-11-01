<?
/*
1- sayfa'nın sonuna php yazmamıza gerek yok cı kendi ekliyor
*/

class Sayfa extends CI_Controller {

        public function index()
        {
                $this->load->view('sayfa'); //Controllerimizi views klasorundeki sayfa.php'ye gönderiyoruz.
        }
}
