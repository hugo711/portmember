<link rel="stylesheet" type="text/css" href="dist/lpk.css">
<div class="card" style="margin-top: 30px;">
  <div class="card-header" style="background: #5E6CEC;color: white;">
    VIP
  </div>
  <div class="card-body">

<section class="pricing-table">
        <div class="container">
            <div class="block-heading">
              <h2>ซื้อ Vip</h2>
              <p>Vip สามารถได้รับแต้มคูณตาม % แพลน</p>
            </div>
            <div class="row justify-content-md-center">
<?php 
if(isset($_SESSION["username"])){
$vip = $mysql->query("SELECT * FROM vip");
while ($data = $vip->fetch_array(MYSQLI_ASSOC)) {
echo '<div class="col-md-5 col-lg-4">
<div class="item">
<div class="heading">
<h3>'.$data["name"].'</h3>
</div>
<p>ได้รับแต้มพ้อยต์ x'.$data["point"].' </p>
<div class="features">
'.$data["info"].'
</div>
<div class="price">
<h4>'.$data["price"].'฿</h4>
</div>
<button class="btn btn-block btn-primary" type="submit">ซื้อตอนนี้</button>
</div>
</div>
';
}
}
?>
    </section>

  </div>
</div>