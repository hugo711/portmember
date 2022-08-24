<?php 
if(isset($_POST["username"])){

  if(empty($_POST["g-recaptcha-response"])){
    echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'กรุณายืนยัน Re-Captcha!',
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
  if(empty($_POST["password"]) || empty($_POST["email"])){
    echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'กรุณากรอกข้อมูลให้ครบจ้า!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=register');
      }else {
      $(location).attr('href','?page=register');
      }
      });
  </script>";
  exit();
  }
$checkid = query("SELECT * FROM user WHERE username = ?",array($_POST["username"]));
if($checkid->fetch()){
  echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'มีผู้ใช้นี้แล้ว!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=register');
      }else {
      $(location).attr('href','?page=register');
      }
      });
  </script>";
  exit();
}


$check = query("SELECT * FROM ip_logs WHERE ip = ?",array(getUserIP()));
if($check->fetch()){
  echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'สามารถสมัครได้ 1 IP ต่อ 1 User!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=register');
      }else {
      $(location).attr('href','?page=register');
      }
      });
  </script>";
  exit();
}

$query = query("INSERT INTO user (username,password,email) VALUES (?,?,?)",array($_POST["username"],$_POST["password"],$_POST["email"]));
$logs = query("INSERT INTO ip_logs (user,ip) VALUES (?,?)",array($_POST["username"],getUserIP()));
if($query){
echo "<script>
Swal.fire(
  'สำเร็จ!',
  'สมัครสมาชิกแล้ว!',
  'success'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=login');
      }else {
      $(location).attr('href','?page=login');
      }
      });
  </script>";
  exit();
}else{
echo "<script>
Swal.fire(
  'ผิดพลาด!',
  'ไม่สามารถสมัครสมาชิกได้!',
  'error'
).then(function(isConfirm) {
      if (isConfirm === true) {
      $(location).attr('href','?page=register');
      }else {
      $(location).attr('href','?page=register');
      }
      });
  </script>";
  exit();
}

}
?>
<br>
<br>

<div class="row align-items-center justify-content-center">


<div class="col-md-1">
</div>

<div class="col-md-5 relative align-self-center">
<form action="?page=login" class="bg-white rounded pb_form_v1" method="post">

<h2 class="mb-4 mt-0 text-center">สมัครสมาชิก</h2>

<div class="form-group">
<input type="text" class="form-control pb_height-50 reverse" name="email" placeholder="อีเมล์">
</div>

<div class="form-group">
<input type="text" class="form-control pb_height-50 reverse" name="username" placeholder="ชื่อผู้ใช้งาน">
</div>

<div class="form-group">
<input type="password" class="form-control pb_height-50 reverse" name="password" placeholder="รหัสผ่าน">
</div>


<div class="g-recaptcha" data-sitekey="6LcM3a4UAAAAAHyVcrdkncwtD17GSeiaNcQ5qDMj"></div><br>


<div class="form-group">
<button type="submit" class="btn btn-danger  btn-lg btn-block pb_btn-pill  btn-shadow-blue"><i class="fa fa-users"></i>&nbsp;สมัครสมาชิก</button>
</div>

</form>
</div>
</div>
