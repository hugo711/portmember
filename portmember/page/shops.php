<div class="card" style="margin-top: 30px;">
  <div class="card-header" style="background: #5E6CEC;color: white;">
    ร้านค้า
  </div>
  <div class="card-body">

<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Lato:400,700);



#price {
  text-align: center;
}

.plan {
  display: inline-block;
  margin: 10px 1%;
  font-family: 'Kanit', Arial, sans-serif;
}

.plan-inner {
  background: #fff;
  margin: 0 auto;
  min-width: 280px;
  max-width: 100%;
  position:relative;
}

.entry-title {
  background: #53CFE9;
  height: 140px;
  position: relative;
  text-align: center;
  color: #fff;
  margin-bottom: 30px;
}

.entry-title>h3 {
  background: #20BADA;
  font-size: 20px;
  padding: 5px 0;
  text-transform: uppercase;
  font-weight: 700;
  margin: 0;
}

.entry-title .price {
  position: absolute;
  bottom: -25px;
  background: #20BADA;
  height: 95px;
  width: 95px;
  margin: 0 auto;
  left: 0;
  right: 0;
  overflow: hidden;
  border-radius: 50px;
  border: 5px solid #fff;
  line-height: 80px;
  font-size: 28px;
  font-weight: 700;
}

.price span {
  position: absolute;
  font-size: 9px;
  bottom: -10px;
  left: 30px;
  font-weight: 400;
}

.entry-content {
  color: #323232;
}

.entry-content ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
}

.entry-content li {
  border-bottom: 1px solid #E5E5E5;
  padding: 10px 0;
}

.entry-content li:last-child {
  border: none;
}

.hot {
    position: absolute;
    top: -7px;
    background: #F80;
    color: #fff;
    text-transform: uppercase;
    z-index: 2;
    padding: 2px 5px;
    font-size: 9px;
    border-radius: 2px;
    right: 10px;
    font-weight: 700;
}
.basic .entry-title {
  background: #75DDD9;
}

.basic .entry-title > h3 {
  background: #44CBC6;
}

.basic .price {
  background: #44CBC6;
}

.standard .entry-title {
  background: #4484c1;
}

.standard .entry-title > h3 {
  background: #3772aa;
}

.standard .price {
  background: #3772aa;
}

.ultimite .entry-title > h3 {
  background: linear-gradient(to bottom, #5e6cec 0%, #2abddf 100%);
  color: white;
}

.ultimite .entry-title {
  background: linear-gradient(to bottom, #5e6cec 0%, #2abddf 100%);
}

.ultimite .price {
  background: linear-gradient(to bottom, #5e6cec 0%, #2abddf 100%);
}
.bg:hover {
  background: #5e6cec !important;
}
</style>
  	
<div class="row">

<?php 
$items = $mysql->query("SELECT * FROM items");
while ($data = $items->fetch_array(MYSQLI_ASSOC)) {
  echo '<div class="col-md-4">
    <div class="plan ultimite sdo">
    <div class="plan-inner">
      <div class="entry-title" style="background: url('.$data["image"].');background-size: cover;">
        <h3>'.$data["name"].'</h3>
        <div class="price">'.$data["price"].' NN<span>/1 ชิ้น</span>
        </div>
      </div>
      <div class="entry-content">
        <ul>
          '.$data["info"].'
          <li>เหลือสินค้า : '.stock($data["file"]).' ชิ้น</li>
        </ul>
      </div>
      <button style="background: #2abddf;border: none;color: white;cursor: pointer;border-radius: 0px;" class="btn btn-info btn-block bg" onclick="buyitems('.$data["id"].')">Order [ '.$data["price"].' NN ]</button>
    </div>
  </div>
  </div>';
}
?>
  
</div>
  </div>
</div>
<br>
<br>
<br>