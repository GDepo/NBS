<?php 
include 'baglan.php';
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

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
  <a class="navbar-brand" href="index.php">NBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Giriş İşlemleri
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php">Giriş Yap</a>
          <a class="dropdown-item" href="uyeol.php">Üye Ol</a>
          
          
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
    <pre><h3>Üye Ol</h3></pre>
    <form action="" method="post">
       <div class="form-group">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Kullanıcı Adı : </label><br>
    <input type="text" class="form-control " id="exampleInputEmail1" placeholder="Kullanıcı Adınız" name="kuladi">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifre :</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Şifreniz" name="sifre">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Mail :  </label>
    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Mail Adresiniz" name="mail">
  </div>
  <input type="submit" name="uyeol" class="btn btn-dark"  value="Üye Ol">

<?php 
if (isset($_POST['uyeol'])) {
  $kuladi = $_POST['kuladi'];
  $sifre = $_POST['sifre'];
  $mail = $_POST['mail'];
$query = $db->prepare("INSERT INTO kullanici SET
kuladi = ?,
sifre = ?,
mail = ?");
$insert = $query->execute(array(
     $kuladi,
     $sifre,
     $mail
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Üye Olma işlemi başarılı! <br>";
    echo "Giriş Sayfasına Yönlendiriliyorsunuz";
    header("Refresh: 2; url=index.php");
}

}


 ?>
</form>

  </div>
  

  <!-- sağ Kısım  -->
  <div class="col-3"></div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
