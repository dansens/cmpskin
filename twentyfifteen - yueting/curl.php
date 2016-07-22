<?php
/*
*使用说明
*curl.php?m4a=41c2e4ab5660eae04021c5893e055f50
*curl.php?lrc=41c2e4ab5660eae04021c5893e055f50
*curl.php?krc=41c2e4ab5660eae04021c5893e055f50
*curl.php?jpg=%E9%82%93%E7%B4%AB%E6%A3%8B
*curl.php?so=%E9%82%93%E7%B4%AB%E6%A3%8B
*{woniu}自己在配置文件设置你懂的 改成你自己的
*/
error_reporting(0);
header("Content-type: text/html; charset=UTF-8");
/*
  $r = $_SERVER["HTTP_REFERER"];
  preg_match('/(.*):\/\/(.*)\/(.*)/imsU',$r,$rr);
  $bai='自己的域名';
  $bai2='';
  if($bai==$rr[2] || $bai2==$rr[2]){
  $Anti_theft = False; // 是否开启防盗链 True 为开启，False 为关闭。
  }else{
  $Anti_theft = True;
  }
  if($Anti_theft == True){
	  $refer = $_SERVER["HTTP_REFERER"];
	  preg_match('/(.*):\/\/(.*)\//imsU',$refer,$refer);
	  if ($_SERVER['SERVER_NAME'] != $refer[2]){
		  $xml.= '<list><m label="' . $refer[2]. '-请勿盗链。"/></list>';
		  echo $xml;
		  exit;
	  }
  }
*/
if(isset($_GET['m4a'])){
	$json = json_decode(C_A("http://m.kugou.com/app/i/getSongInfo.php?cmd=playInfo&hash=".$_GET['m4a']))->url;//json_decode解析json字符串
	header("location:".stripslashes($json));//跳转到链接
	exit();
}else if(isset($_GET['jpg'])){
	$b=json_decode(C_B("http://mobilecdn.kugou.com/new/app/i/yueku.php?type=softhead&cmd=104&size=480&singer=".URLdecode($_GET['jpg'])."&qq-pf-to=pcqq.c2c"))->url;
	header("Content-type: image/jpeg");
	header("Content-Disposition:attachment;filename='downloaded.jpg'");
	if(strstr($b,'http')){//strstr判断是否有字符http
		header("location: ".stripslashes($b));//stripslashes字符串格式化
	}else{
		header("location:http://www.hitow.net/template/cmsdj_002/static/images/fm/skin/skinA03.jpg");
	}
	exit();
}else if(isset($_GET['lrc'])){
	$json = json_decode(C_A("http://m.kugou.com/app/i/getSongInfo.php?cmd=playInfo&hash=".$_GET['lrc']));
	$keyword = $json->fileName;
	$hash = $json->hash;
	$timelength = $json->timeLength;
	$lrc = C_P("http://m.kugou.com/app/i/krc.php?cmd=100&keyword=".URLencode($keyword)."&hash=".$hash."&timelength=".$timelength."000&d=0.4395095428917557",'http://m.kugou.com/','musicwo17=kugou');
	if(strstr($lrc,'[')){
		echo $lrc;
	}else{
		echo '[00:01.00]暂无歌词-抱歉-CMP皮肤设计网';
	}
}else if(isset($_GET['krc'])){
	$json = json_decode(C_A("http://m.kugou.com/app/i/getSongInfo.php?cmd=playInfo&hash=".$_GET['lrc']));
	$keyword = $json->fileName;
	$hash = $bb->hash;
	$timelength = $bb->timeLength;
	echo C_A('http://mobilecdn.kugou.com/new/app/i/krc.php?keyword='.$keyword.'&timelength='.$timelength.'&type=1&cmd=200&hash='.$hash);
}else if(isset($_GET['so'])){
	$b = C_B('http://mobilecdn.kugou.com/api/v3/search/song?format=jsonp&page=1&pagesize=1000&showtype=1&callback=kgJSONP833810229&keyword='.$_GET['so']);
	preg_match_all('|"hash":"([^"]+)"|',$b,$c_1);
	preg_match_all('|"filename":"([^"]+)"|',$b,$c_2);
	foreach($c_1[1] as $k=>$v){
		$label=$c_2[1][$k];
		$u = explode(" - ",$label);//切割 - 前后内容
		$d.='<m src="{woniu}m4a='.$v.'" lrc="{woniu}lrc='.$v.'" image="{woniu}jpg='.URLencode($u[0]).'" label="'.TTHH($label).'"/>'."\n";//{woniu}自己在配置文件设置你懂的
	}
	echo "<list>\n".$d.'</list>';
}
//XML格式替换
function TTHH($str) {
	$strs = strtr($str,array('"'=>' ','\''=>' ','<'=>'《','>'=>'》','&amp;'=>'-','&lt;'=>' ','&gt;'=>' '));
	return $strs;
}
//
function C_B($url) {
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);//超时2秒
	  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	  curl_setopt ($ch, CURLOPT_REFERER, $url);
	  //curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
}
//伪装安卓访问抓取
function C_A($url) {
	$ch=curl_init();
  	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
  	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 2.3.7; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
	curl_setopt ($ch, CURLOPT_REFERER, $url);
  	$data=curl_exec($ch);
  	curl_close($ch);
  	return $data;
}
//伪装cookie访问抓取
function C_P($url, $referer, $cookie){
    $optionget = array('http' => array('method' => "GET",'timeout' => "2", 'header' => "User-Agent:Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5\r\nAccept:*/*\r\nReferer:" . $referer . "\r\nCookie:" . $cookie)); 
    $file = file_get_contents($url, false , stream_context_create($optionget));
    return $file;
}
?>