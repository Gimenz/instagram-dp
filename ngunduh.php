<?PHP
 // Define the path to file
 function sebelum($string, $substring) {
  $pos = strpos($string, $substring);
  if ($pos === false)
   return $string;
  else  
   return(substr($string, 0, $pos));
}

 $url = $_GET['url'];
 $file = sebelum($url, "?ig_cache_key=");	
 $name = basename ($file);
 if(!file)
 {
 // File doesn't exist, output error
 die('file not found');
 }
 else
 {
 // Set headers
 header("Pragma: public"); // wtf?
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
// omg what have you been reading?
header("Cache-Control: private",false);  
// obviously not rfc 2616
header("Content-Type: image/jpg");
header("Content-Disposition: attachment; filename=\"".basename($name)."\";" );
header("Content-Transfer-Encoding: binary");
ob_clean();
flush();

 // Read the file from disk
 readfile($file);
 }
 ?>
