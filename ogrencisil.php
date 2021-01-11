
<?php 
include 'baglan.php';
if (isset($_GET['id'])) {
	$id=$_GET['id'];
$query = $db->prepare("DELETE FROM ogrenciler WHERE id = :id");
$delete = $query->execute(array(
   'id' => $id
));
echo "Bilgiler Silindi.. Yönlendiriliyorsunuz";
header("Refresh: 2; url=ogrencilist.php");
}else{
	header("Location:ogrencilist.php");
}





 ?>