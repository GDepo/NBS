<?php 
include 'baglan.php';
session_start();
 ?>
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
  <a class="navbar-brand" style="position: relative;" href="index.php">NBS - Not Bilgi Sistemi</a>
</nav>

<!-----------------------------------------------    -------------------------------------------------------------------------->

<div class="row">
<!-- SOL Kısım  -->
  <div class="col-3 "></div>

  <!-- Orta Kısım  -->
  <div class="col-6">
    <br><br><br>
    <pre><h3>Giriş Yap</h3></pre>
    <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Kullanıcı Adınız : </label><br>
    <input type="text" class="form-control " id="exampleInputEmail1" placeholder="Kullanıcı Adınız" name="kuladi"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifreniz :</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifreniz" name="sifre" >
  </div>
  
  
  <input type="submit" class="btn btn-success" value="Giriş Yap" name="giris">
  <input type="submit" class="btn btn-dark" value="Üye Ol" name="uyeol"><br><br>
  <a href="sifremiunuttum.php">Şifremi Unuttum</a>
 
</form>


<?php
 
if (isset($_POST['giris'])) {
  $kuladi = $_POST['kuladi'];
  $sifre =$_POST['sifre'];

  $sorgu = $db->prepare("SELECT * FROM kullanici WHERE kuladi = ? AND sifre = ?");
  $sorgu->execute(array($kuladi , $sifre));
  $islem = $sorgu->fetch();
  if ($islem) {
    $_SESSION['kuladi']=$islem['kuladi'];
    $_SESSION['sifre']= $islem['sifre'];
    $_SESSION['mail']=$islem['mail'];
    $_SESSION['id']=$islem['id'];
    header("Location:ogrencilist.php");

  }
  else {
    echo "<h3><font color='red'>Girilen Bilgileri Kontrol Ediniz.!</font></h3>";
  }
    
  }//if isset['giris'] in kapanıs süslüsü 






 ?>

  

<!----------- Üye Ol Butonuna basıldıktan sonra yapılacak İşlem------------ >
<?php 
if (isset($_POST['uyeol'])) {
  header("Location:uyeol.php");
}

 ?>

  </div>
  
  <!-- sağ Kısım  -->
  <div class="col-3"></div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
