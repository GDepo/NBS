<?php 
include 'baglan.php';
session_start();
if (isset($_SESSION['kuladi'])) { /* Bu işlem bir kuladi adında session var aşağıda ki kodları çalıştır anlamına gelir Amaç : kullanıcı url kısmına dosya adı ve uzantısını yazarak ulaşmasını engellemek */ 
	
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

 <form action="" method="post">
  <select class="form-control form-control-sm" name="bolum_adi" required>

    <option value="" disabled selected hidden>LÜTFEN BÖLÜM SEÇİNİZ!!!</option>
<optgroup label="Sınıflar"></optgroup>

  <?php 

$query = $db->query("SELECT * FROM bolumler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          print "<option value='".$row['bolumadi']."'>".$row['bolumadi']."</option>";
     }
}

   ?>


</select>
<br>
<center>
<input type="submit" class="btn btn-outline-success" value="Listele" name="ogrencilistele">
</center>
</form><br><br>
<?php 
if (isset($_POST['ogrencilistele'])) {
  ?>
<table class="table-bordered table-striped " style="width: 600px;">

            <tr>
              <td><b>Öğrenci Numarası</b></td>
              <td><b>Öğrenci Adı</b></td>
             <td><b>Öğrenci Bölümü</b></td>
             <td></td>

             </tr>
<?php 
$bolum_adi=$_POST['bolum_adi'];
  $query = $db->query("SELECT * FROM ogrenciler WHERE ogrenci_bolumu = '{$bolum_adi}' ORDER BY id DESC", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          print "<tr><td>".$row['ogrenci_no']."</td><td>".$row['ogrenci_adi']."</td><td>".$row['ogrenci_bolumu']."</td><td><a href='ekarne.php?id=".$row['id']."' class='btn btn-sm btn-secondary'>E-Karne</td></tr>";
     }
}

}



 ?>
</table> 

<?php 
if (isset($_GET['id'])) {
$id = $_GET['id']; 
$query = $db->query("SELECT * FROM ogrenciler WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){
    
}
?><br><br>
<center><h3>Öğrenci Karne Durumu</h2></center><br>
<table class="table">
  <tr style="background-color:gray; color: white;">
    <td>Okul Numarası</td>
    <td>Adı</td>
    <td>Bolumu</td>
    <td>1.Sınav Notu</td>
    <td>2.Sınav Notu</td>
    <td>3.Sınav Notu</td>
    <td>Ortalaması</td>
    <td>Durum</td>
  </tr>
  <tr>
      <td><?php echo $query['ogrenci_no']; ?></td>
      <td><?php echo $query['ogrenci_adi']; ?></td>
      <td><?php echo $query['ogrenci_bolumu']; ?></td>
      <td><?php echo $query['not1']; ?></td>
      <td><?php echo $query['not2']; ?></td>
      <td><?php echo $query['not3']; ?></td>
      <td><?php echo $query['ortalama']; ?></td>
      <td><?php 
      if ($query['ortalama'] >= 85 && $query['ortalama'] <= 100) {
        echo "<font color='green'>Takdir ile Geçti</font>";
      }elseif ($query['ortalama'] >= 75 && $query['ortalama'] <= 84) {
        echo "<font color='lightgreen'>Teşekkür İle Geçti</font>";
      }elseif ($query['ortalama'] >= 55  && $query['ortalama'] <= 74) {
        echo "<font color='gray'>Geçtiniz</font>";
      }elseif ($query['ortalama'] <= 54 && $query['ortalama'] >= 1 ) {
        echo "<font color='red'>KALDINIZ</font>";
      }else{
        echo "--";
      }




       ?></td>
  </tr>
  
</table>


<?php
}// 131.satırda ki if issetin kapatması 
 ?>




   </div><!--Orta Kısım Div Kapatması -->
  
  <!-- sağ Kısım  -->
  <div class="col-3">

  </div>
  </div>
</div>
<?php 
}/* Bu işlem sayfanın en üstünde açılan if isset kodunun kapatması ve değilse şartı Amaç : kullanıcı url kısmına dosya adı ve uzantısını yazarak ulaşmasını engellemek */ 
else{
header("Location:index.php");
}
 ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
