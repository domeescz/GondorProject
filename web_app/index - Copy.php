<?php
define('IN_PHPBB', true);
session_start();
 header("Cache-control: private");
 if (!isset($_SESSION["user_is_logged"])) $_SESSION["user_is_logged"]=0;
  $path=$_SERVER['REQUEST_URI'];
  
  $path1=str_replace("index.php","",$path);
  $_SESSION["serverURI"]=$path1;
     
 include("templates/header.php");


 ?>
<div class="row m-1">
<div class="col" id="content">

</div>
</div>


<?php
include("templates/footer.php");
?>
 