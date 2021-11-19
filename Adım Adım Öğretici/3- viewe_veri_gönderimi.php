<? 
/*
En basit Kullanım tüm kodlar tek yerde verilmiştir.
Bu Dosyayi class isminiyle Controllersa kaydet.
*/

class Adim2 extends CI_Controller {
	public function index () {
		//Sayfamızın başlığını değişkene atadık viewde değişken olarak çekicez.
		$data['baslik'] = "Sayfa Başlığı";
		//değişkeni loadviewin 2. parametresi olarak viewe gönderdik.
		$this->load->view('adim2', $data);
	}
}
?>

<!--
viewde class ismiyle.php oluştur ve html kodlarıyla title oluştur.
-->
<html>
<head>
<title><?= $baslik ?></title>
</head>
<body>



</body>
</html>