<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=nbs", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>