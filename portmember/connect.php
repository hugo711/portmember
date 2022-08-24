<?php
try {
$engine = new PDO("mysql:host=127.0.0.1;dbname=nani_lucky;charset=utf8", "nani_lucky","");
$engine->exec("set names utf8");
}
catch (PDOException $e) {
	 echo '<b>เชื่อมต่อผิดพลาด -> </b>'.$e->getMessage();
	 exit;
}

$mysql = mysqli_connect("localhost","nani_lucky","","nani_lucky");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL : " . mysqli_connect_error();
  }

// Change character set to utf8
mysqli_set_charset($mysql,"utf8");



function query($sql,$array=array()){
    global $engine;
    $q = $engine->prepare($sql);
    $q->execute($array);
    return $q;
}


function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function rmtxt($FileName) {
	$text = array();
	$open = fopen($FileName, 'r+');
	if($open)
	{
		while(!feof($open))
		{
			$file = fgets($open, 4096);
			array_push($text, str_replace("\n", "", $file));
		}
		fclose($open);
		if(count($text) <= 1)
			return "Stock";
		else
		{
			$Buy = $text[rand(0, count($text)-1)];
			$text = null;
			$text = array();
			$open = fopen($FileName, 'r+');
			while(!feof($open))
			{
				$file = fgets($open, 1024);
				if(str_replace("\n", "", $file) != $Buy)
					array_push($text, str_replace("\n", "", $file));
			}
			fclose($open);
			$open = fopen($FileName, 'w');
			for($i = 0; $i <= count($text)-1; $i++)
			{
				if($i == count($text)-1)
					$t[$i] = $text[$i];
				else
					$t[$i] = $text[$i].'
';
				fwrite($open, $t[$i]); 
			}
			if($open) 
			{
				return $Buy;
			}
			else
			{
				return "Error";
			}
			fclose($open);
		}
	}
	else
	{
		return "Error";
	}
}
function stock($filename) {
	  $data = file_get_contents('stock/'.$filename);
	  if(!$data) {
		  file_put_contents('stock/'.$filename,'');
	  }
	  $count = explode("\n",$data);
	  if($data == NULL) {
	  $count = 0; 
	  }else {
		  $count = count($count);
	  }
	return $count;
}
function Read($file) {
	$i = file_get_contents($file);
	return $i;
}
function Write($file,$txt){
	$fp = fopen($file, "w+");
	$data = str_replace(array("\r\n","\r"),"\n",$txt);
	fwrite($fp, $data);
	fclose($fp);
}