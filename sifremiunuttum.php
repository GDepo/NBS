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
  <style type="text/css">
    form{
      padding: 10%;
    border: 1px solid #ddd;
    border-radius: 50px;
    margin-top:15%;
    text-align:left; 
    font-family:sans;
    }
  </style>
</head>

<body>
<div></div>
          
        </div>
  </div>
</nav>

<!-----------------------------------------------    -------------------------------------------------------------------------->

<div class="row">
<!-- SOL Kısım  -->
  <div class="col-3 "></div>

  <!-- Orta Kısım  -->
  <div class="col-6">
 <br>
 
<h2><center>Şifremi Unuttum</center></h2>
 <form method="post" class="a">
 <input type="email" name="email" class="form-control form-control-sm" placeholder="E-mail Adresinizi Giriniz."><br><br>
 <input type="password" name="pass" class="form-control form-control-sm" placeholder="Yeni Şifrenizi Giriniz"><br><br>
<br>

<center>
 <input type="submit"  name="yenile" value="Bilgileri Güncelle" class="btn btn-outline-primary">
 </center>
<?php 
if (isset($_POST['yenile'])) {
 $email = $_POST['email'];
 $pass = $_POST['pass'];
 
 
 
$query = $db->query("SELECT * FROM kullanici WHERE mail = '{$email}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
  if ($query['mail']==$email) {
    $query = $db->prepare("UPDATE kullanici SET
sifre = :yeni_sifre
WHERE mail = :mail");
$update = $query->execute(array(
     "yeni_sifre" => $pass,
     "mail" => $email
));
if ( $update ){
     echo "<br>Tebrikler Bilgileriniz Güncellendi. Giriş Sayfasına Yönlendiriliyorsunuz.." ;
     header("Refresh: 2; url=index.php");
}
  else{
    echo "Bilgileriz Yanlıştır Kontrol Ediniz.";
  }
  
}


}
}


 ?>




</form>
  </div><!--Orta Kısım Div Kapatması -->
  
  <!-- sağ Kısım  -->
  <div class="col-3">

  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
