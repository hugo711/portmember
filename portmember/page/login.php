<?php 
if(isset($_POST["username"])){

$query = query("SELECT * FROM user WHERE username = ? AND password = ?",array($_POST["username"],$_POST["password"]));
if($data = $query->fetch()){
$_SESSION["username"] = $data["username"];
echo "<script>
Swal.fire(
  'สำเร็จ!',
  'เข้าสู่ระบบแล้ว!',
  'success'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=shop');
      }else {
      $(location).attr('href','?page=shop');
      }
      });
  </script>";
}else{
echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'ไม่สามารถเข้าสู่ระบบได้!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=login');
      }else {
      $(location).attr('href','?page=login');
      }
      });
  </script>";
}

}
?>

<div class="row align-items-center justify-content-center">


<div class="col-md-1">
</div>

<div class="col-md-5 relative align-self-center">
<form action="?page=login" class="bg-white rounded pb_form_v1" method="post">

<h2 class="mb-4 mt-0 text-center">เข้าสู่ระบบ</h2>

<div class="form-group">
<input type="text" class="form-control pb_height-50 reverse" name="username" placeholder="ชื่อผู้ใช้งาน">
</div>

<div class="form-group">
<input type="password" class="form-control pb_height-50 reverse" name="password" placeholder="รหัสผ่าน">
</div>


<div class="form-group">
<button type="submit" class="btn btn-success btn-lg btn-block pb_btn-pill  btn-shadow-blue"><i class="fa fa-sign-in-alt"></i>&nbsp;เข้าสู่ระบบ</button>
</div>

</form>
</div>
</div>



