<?php 
if(isset($_SESSION["username"]) && isset($_GET["page"]) && $_GET["page"]=="vip"){
  echo '<br>
  <br>
  <br>
  <br>
  <section class="pb_section pb_slant-white pb_pb-250 ez" id="section-features" style="padding-top: 1px">
<div class="container">';
include("page/vips.php");
echo '<br>
<br></div></section>
';
}
?>

