<?php 
include 'baglan.php';
session_start();
if (isset($_SESSION['kuladi'])) { /* Bu işlem bir kuladi adında session var aşağıda ki kodları çalıştır anlamına gelir Amaç : kullanıcı url kısmına dosya adı ve uzantısını yazarak ulaşmasını engellemek */ 
if (isset($_GET['id'])) { ?>
 
<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NBS - Not Bİlgi Sistemi</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>
<div></div>
<!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="ogrencilist.php">NBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="ogrencilist.php">Öğrenci Listele <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ekarne.php">E-Karne</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kullanıcı İşlemleri
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item disabled" ><?php echo $_SESSION['kuladi']; ?></a>
          <a class="dropdown-item" href="ogrenciekle.php">Öğrenci Ekle</a>
          <a class="dropdown-item" href="sifreyenile.php">Şifre Yenile</a>
          <a class="dropdown-item" aria-labelledby="navbarDropdown"><form method="post"><input type="submit" class="btn btn-danger" name="cikis" value="cikisyap"><?php if (isset($_POST['cikis'])) {
            session_destroy();
            header("location:index.php");
          } ?></form></a>
          
          
        </div>
  </div>
</nav>

<!-----------------------------------------------    -------------------------------------------------------------------------->
<div class="container">
<div class="row">
<!-- SOL Kısım  -->
  <div class="col-3 "></div>

  <!-- Orta Kısım  -->
  <div class="col-6">
 <br><br>
<?php 
$id = $_GET['id']; 
$query = $db->query("SELECT * FROM ogrenciler WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    
}

 ?>


 <center><h3><label>Not Ekle</label></h3></center>
<form method="post">
  Öğrenci No : <input type="text" class="form-control form-control-sm" disabled="" value="<?php echo $query['ogrenci_no']; ?>" name="ogrno" ><br>
  Öğrenci Adı : <input type="text" class="form-control form-control-sm" disabled="" value="<?php echo $query['ogrenci_adi']; ?>" name="ogradi" ><br>
  1.Sınav Notu : <input type="text" class="form-control form-control-sm"  value="<?php echo $query['not1']; ?>" name="not1" ><br>
  2.Sınav Notu : <input type="text" class="form-control form-control-sm" value="<?php echo $query['not2']; ?>" name="not2" ><br>
  3.Sınav Notu : <input type="text" class="form-control form-control-sm" value="<?php echo $query['not3']; ?>" name="not3" ><br>
  <center><input type="submit" class="btn btn-sm btn-success" name="notekle"></center>
  <?php 
  if (isset($_POST['notekle'])) {
    $not1 = $_POST['not1'];
    $not2 = $_POST['not2'];
    $not3 = $_POST['not3'];
    
    $ortalama = ($not1+$not2+$not3)/3;
    if ($ortalama >= 85 && $ortalama <= 100) {
      $sonuc = "<font color='darkgreen'>Takdir İle Geçtiniz<font/>"; 
    }elseif ($ortalama >= 75 && $ortalama <= 84) {
      $sonuc = "<font color='lightgreen'>Teşekkür İle Geçtiniz</font>";
    }elseif ($ortalama >= 55 && $ortalama <= 74) {
      
      $sonuc = "Geçtiniz";
    }elseif ($ortalama >=0 && $ortalama <=54 ) {
      
      $sonuc = "<font color='darkred'>KALDINIZ</font>";
    }

    $query = $db->prepare("UPDATE ogrenciler SET
    not1 = :yeni_not1,
    not2 = :yeni_not2,
    not3 = :yeni_not3,
    ortalama = :yeni_ortalama,
    durum = :yeni_durum
    WHERE id = :id");
    $update = $query->execute(array(
         "yeni_not1" => $not1,
         "yeni_not2" => $not2,
         "yeni_not3" => $not3,
         "yeni_ortalama" =>$ortalama,
         "id" => $id,
         "yeni_durum" => $sonuc
    ));
    if ( $update ){
     print "Notlar Eklendi";
}
  }


   ?>
</form>
 

  </div><!--Orta Kısım Div Kapatması -->
  
  <!-- sağ Kısım  -->
  <div class="col-3">

  </div>
  </div>
</div>
<?php 
/* Bu işlem sayfanın en üstünde açılan if isset kodunun kapatması ve değilse şartı Amaç : kullanıcı url kısmına dosya adı ve uzantısını yazarak ulaşmasını engellemek */ 
}else{
  echo "Belirtilen Bir Öğrenci Yok. Öğrenci Sayfasına Yönlendiriliyorsunuz";
header("Refresh: 2; url=ogrencilist.php");
}
}else {
  header("location:index.php");
}
 ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php 

if (isset($_POST['id'])) {
  if (isset($GET['ad'])) {
    
  }else {
    
  }
}else{

}



 ?>