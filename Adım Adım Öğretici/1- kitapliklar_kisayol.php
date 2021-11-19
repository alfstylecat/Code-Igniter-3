<? defined('BASEPATH') or exit('No direct script access allowed');

### Email gönderme kitaplığını yükler. ###
$this->load->library('email');

### Form doğrulama kitaplığını yükler. ###
$this->load->library('form_validation');
//Basit tanımlama
$this->form_validation->set_rules('namedegeri', 'labeldegeri', 'kural|kural2|kural3|kural4|kural5');
//Genel kural listesi ve açıklamaları.
$kurallar = array (
"required"                      => "Bu alan gerekli.",
"trim"                          => "Boşlukları kaldır",
"matches['forminputname']"      => "Form eğesi diğer öğe ile eşleşmiyor ise.",
"is_unique[tabloadi.sutunadi]"  => "Sadece tek bir kayıt yoksa false döndür.(query builder etkin olmalı)",
"min_length[5]"                 => "Minimum karakterden az olursa false döndür.",
"max_length[15]"                => "Maksimum karakteri aşarsa false döndür.",
"integer"                       => "Form öğesi tam sayı değilse false döndür.",
"decimal"                       => "Form öğesi ondalıklı sayı değilse false döndür",
"valid_url"                     => "Form öğesi geçerli bir url içermiyorsa false döndür.",
"valid_email"                   => "Form öğesi geçerli bir email içermiyorsa false döndür.",
"valid_ip"                      => "Form öğresi geçerli bir ipv4 veya ipv6 içermiyorsa false döndür.",
);

//Form yardımcısı
$this->load->helper(array('form'));



### Session Kitaplıkları ###
$this->load->library('session');