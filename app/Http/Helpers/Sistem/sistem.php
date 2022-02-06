<?php

if (! function_exists('sistem_cekuserphoto')) {
    function sistem_cekuserphoto($photo=null){
        $avatar  = '/img/avatar.png';
        if (!is_null($photo)) {
            $avatar = '/img/user/'.$photo;
        } 
        return $avatar;
    }
}
if (! function_exists('cek_internet')) {
    function cek_internet(){
        $connected = @fsockopen("www.google.com", 80);
        if ($connected){
         $is_conn = true; //jika koneksi tersambung
         fclose($connected);
        }else{
         $is_conn = false; //jika koneksi gagal
        }
        return $is_conn;
       }
}

// disabled link
if (! function_exists('linkDisabled')) {
    function linkDisabled($data)
    {
        $link   = '';
        if (is_null($data)) {
            $link = 'disabled';
        }
        return $link;
    }
}

// get nama lengkap
if (! function_exists('deletefile')) {
    function deletefile($lokasi)
    {
        if (!is_dir($lokasi)) {
            if (file_exists($lokasi)) {
                unlink($lokasi);
            }
        }
    }
}
// get nama lengkap
if (! function_exists('sistem_notif_indo')) {
    function sistem_notif_indo($notif)
    {
        $notif = str_replace('The','Input',$notif);
        $notif = str_replace('field is required','Wajib diisi',$notif);
        return $notif;
    }
}

// HELPER GENERAL
// Mendapatkan IP pengunjung menggunakan getenv()
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edg'))
        $browser = 'Microsoft Edge';
    else
        $browser = 'Other';
    return $browser;
}

function kompres($file,$temp)
    {
        $name       = time().'_'.$file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        
        $tmp_name   = $file->getRealPath();
        $path = $temp .'/'. $name;
        
        list($width, $height) = getimagesize($tmp_name);
      
        if($ext == 'png'){
            $new_image = imagecreatefrompng($tmp_name);
        }
        
        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG')  {  
            $new_image = imagecreatefromjpeg($tmp_name);  
        }
        
        $new_width=600;
        $new_height = ($height/$width)*600;
        $tmp_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($tmp_image, $path, 100);
        imagedestroy($new_image);
        imagedestroy($tmp_image);
        return $name;
    }