<?php 
if(isset($_GET["buy"])){
$item["query"] = $mysql->query("SELECT * FROM items WHERE id = '".$_GET["buy"]."'");
$item["data"] = $item["query"]->fetch_array(MYSQLI_ASSOC);
if($acc["nn"]<$item["data"]["price"]){
  echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'NN Coin ของคุณไม่เพียงพอคับ!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=shop');
      }else {
      $(location).attr('href','?page=shop');
      }
      });
  </script>";
}else{

$filename =  'stock/'.$item["data"]["file"];
        $data = rmtxt($filename);
        if($data == "Stock" || $data == "Error") {
           echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'สินค้าหมดครับ!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=shop');
      }else {
      $(location).attr('href','?page=shop');
      }
      });
  </script>";
  exit();
        }
        $lib = explode(":",$data);
        $mysql->query("INSERT INTO `logs` (`image`, `name`, `info1`, `info2`, `owner`) VALUES ('".$item["data"]["image"]."', '".$item["data"]["name"]."', '".$lib[0]."', '".$lib[1]."', '".$_SESSION["username"]."'); ");
        $mysql->query("UPDATE user SET nn = nn-'".$item["data"]['price']."' WHERE username = '".$_SESSION["username"]."'");
  echo "<script>
Swal.fire(
  'สำเร็จ!',
  'ซื้อสินค้าแล้วค้าบบบ!',
  'success'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=shop');
      }else {
      $(location).attr('href','?page=shop');
      }
      });
  </script>";
}


}
?>
<div class="card" style="margin-top: 10%;margin-bottom: 20px;">
  <div class="card-header">
    รับแต้มฟรี
  </div>
  <div class="card-body">


  	
<div class="row">
	<div class="col-md-5">
<?php 
$months =array( 
      "0"=>"", "1"=>"มกราคม", "2"=>"กุมภาพันธ์", "3"=>"มีนาคม","4"=>"เมษายน","5"=>"พฤษภาคม","6"=>"มิถุนายน", "7"=>"กรกฎาคม","8"=>"สิงหาคม","9"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม"
          );
function th($time){
  global $months;
    $th.= date("H",$time);
    $th.= ":".date("i",$time);
    $th.= "  วันที่ ".date("j",$time);
    $th.= " ".$months[date("n",$time)];
    $th.= " พ.ศ.".(date("Y",$time));
  return $th;
}
$item["query"] = $mysql->query("SELECT * FROM ref");
while($data = $item["query"]->fetch_array(MYSQLI_ASSOC)){
$usertime = $acc["btn".$data["btn"]];
if($usertime-time()<-86400){
  echo '<a class="btn btn-success" style="width: 135.5px;border: solid 3px;" href="'.$data["url"].'">+5 NN</a>';
}else{
  $timenow = $usertime+86400;
  $unix_tmr = date("m d, Y H:i:s",$timenow);
  $unix_td = date("m d, Y H:i:s",time());
  echo '<a class="btn btn-danger" style="width: 130.5px;border-radius: 0px;color: white;" id="'.$timenow.'">&nbsp;</a>';
  ?>
<script type="text/javascript">

var countDownDate<?php echo  $timenow; ?> = new Date("<?php echo $unix_tmr ?>").getTime();
var now<?php echo  $timenow; ?> = new Date("<?php echo $unix_td ?>").getTime();


var x = setInterval(function() {

  
  now<?php echo  $timenow; ?>  =now<?php echo  $timenow; ?> + 1000;
  
  var distance = countDownDate<?php echo  $timenow; ?> - now<?php echo  $timenow; ?>;

 
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  
  document.getElementById("<?php echo  $timenow; ?>").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";

  
  if (distance <= 1000) {
    clearInterval(x);
    document.getElementById("<?php echo  $timenow; ?>").innerHTML = "+ 5 NN";
  }
}, 1000);
 </script>
  <?php
}

}
 ?>
 
 


  </div>

<div class="col-md-7">
<h4>ยอดเงินตอนนี้ : <button class="btn btn-danger"><?php echo $acc["nn"]; ?> Nani Coin</button></h4>

( 1 NN = 1 Nani Coin )
<hr>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Pass</th>
    </tr>
  </thead>
  <tbody>
    <?php 
$logs = $mysql->query("SELECT * FROM logs WHERE owner = '".$_SESSION["username"]."'");
while ($data = $logs->fetch_array(MYSQLI_ASSOC)) {
echo '<tr>
      <th scope="row" width="35%"><img src="'.$data["image"].'" style="height: 30px;">&nbsp;'.$data["name"].'</th>
      <td>'.$data["info1"].'</td>
      <td>'.$data["info2"].'</td>
    </tr>';
}

    ?>
  </tbody>
</table>

</div>
<?php 
if(isset($_SESSION["username"]) && isset($_GET["page"]) && $_GET["page"]=="shop"){
  echo '<section id="section-features" style="padding-top: 1px">
<div class="container">';
include("page/shops.php");
echo '</div></section>';
}

?>
  </div>
</div>
</div>
 </div>
</div>




<script type="text/javascript">
  
  function buyitems(id){
    Swal.fire({
  title: 'คุณแน่ใจมัยที่จะซื้อสินค้านี้?',
  text: "หากซื้อแล้วจะไม่สามารถขอ NN Coin คืนได้!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#8CC152',
  cancelButtonColor: '#DA4453',
  confirmButtonText: 'ตกลง',
  cancelButtonText: 'ยกเลิก'
}).then((result) => {
  if (result.value) {
    $(location).attr('href','?page=shop&buy='+id);
  }
})
  }

</script>

