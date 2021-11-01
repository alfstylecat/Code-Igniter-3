/*
Örnek 1 : En basit controller view bağlantısı
*/
<html>
<head>
<title>Başlığım</title>
</head>
<body>
<h1>Başlığıma Hoşgeldiniz!</h1>
</body>
</html>

/*
Örnek 2 : En basit haliyle controllerdan viewe değişken aktarımı yada bilgi aktarımı
*/
<html>
<head>
<title> <?= $sayfa_basligi ?> </title>
</head>
<body>
<h1>Başlığıma Hoşgeldiniz!</h1>
</body>
</html>

/*
Örnek 3 : En basit haliyle dizi içinde bilgi gönderme
*/
<html>
<head>
<title> <?= $sayfa_basligi ?> </title>
</head>
<body>
<h1> <?= $baslik ?> </h1>
<h4> <?= $mesaj ?> </h4>
</body>
</html>

/*
Örnek 4 : En basit haliyle foreachle alınacak dizi gönderme
*/
<html>
<head>
<title> <?= $sayfa_basligi ?> </title>
</head>
<body>
<h1> <?= $baslik ?> </h1>
<h3>Yapılacaklar Listesi</h3>
<ul>
<? foreach ($yapilacaklar_listesi as $yapilacak): ?>
<li> <?= $yapilacak ?> </li>
<? endforeach; ?>
</ul>
</body>
</html>










/*
Örnek Kullanılacak
*/
<html>
<head>
<title> <?= $sayfa_basligi ?> </title>
</head>
<body>
<h1> <?= $baslik ?> </h1>
<h3>Yapılacaklar Listesi</h3>
<ul>
<? foreach ($yapilacaklar_listesi as $yapilacak): ?>
<li> <?= $yapilacak ?> </li>
<? endforeach; ?>
</ul>
</body>
</html>
