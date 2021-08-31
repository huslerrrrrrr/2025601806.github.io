<?php 
    function filter_dangerous_words($str){
        $str = str_replace("'", "‘", $str);
        $str = str_replace("\"", "“", $str);
        $str = str_replace("<", "《", $str);
        $str = str_replace(">", "》", $str);
        return $str;
    }
    function getIP() {
        if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');
 
        }
        elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
        }
        else {
        $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
 
    $ip = getIP();
    @$referer = $_SERVER['HTTP_REFERER']."\r\n";
    $ua = $_SERVER['HTTP_USER_AGENT']."\r\n\r\n";
    date_default_timezone_set("Asia/Shanghai");
    $date_ = date("Y.m.d,h:i:sa")."\r\n";
 
    $hack = 'date: '.$date_.'ip:'.$ip."\r\n".'referer: '.$referer.'ua: '.$ua;
    $hack = filter_dangerous_words($hack);
    $op = fopen('hack.txt','a+');
    fwrite($op,$hack);
    fclose($op);
    
    $im = imagecreatefromjpeg("1.jpg");
    header('Content-Type: image/jpeg');
    imagejpeg($im);
    imagedestroy($im);
 ?>
